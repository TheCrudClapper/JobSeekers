<?php
namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AccountService {
    public function create(Request $request) {
        $this->validateRegister($request);
        $model = new User();
        $model->Id = null;
        $model->Name = $request->input('Name');
        $model->Email = $request->input('Email');
        $model->PasswordHash = Hash::make($request->input('Password'));
        $model->Bio = null;
        $model->Picture = null;
        $model->IsActive = true;
        $model->save();
    }
    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string',
            'Email' => 'required|email',
            'PhoneNumber' => 'nullable|phone:PL', ['PhoneNumber.phone' => 'SEx'],
            'Bio' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        //getting the currently logged user
        $user = auth()->user();

        //updating the fields
        $user->Name = $request->input('Name');
        $user->Bio = $request->input('Bio');
        $user->Email = $request->input('Email');
        $user->PhoneNumber = $request->input('PhoneNumber');
        $user->DateEdited = strtotime('now');
        $user->save();
    }
    public function login(Request $request){
        $this->validateLogin($request);
        $user = User::where('Email', $request->input('Email'))
            ->where('IsActive', true)
            ->first();

        if(!$user || !Hash::check($request->input('Password'), $user->PasswordHash)) {
            throw ValidationException::withMessages([
                'GeneralError' => ['Invalid credentials or inactive account.'],
            ]);
        }

        //logging user
        auth()->guard()->login($user);

        //regenerating the session
        $request->session()->regenerate();
    }
    public function resetPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'CurrentPassword' => 'required|string|min:8',
            'NewPassword' => 'required|string|min:8',
            'ConfirmPassword' => 'required|string|min:8|same:NewPassword',
        ]);
        if($validator->fails()){
            throw new \Illuminate\Validation\ValidationException($validator);
        }
        $user = auth()->user();
        $user->PasswordHash = Hash::make($request->input('NewPassword'));
        $user->save();
    }

    public function logout(Request $request)
    {
        //invalidating the session
        $request->session()->invalidate();
    }

    public function delete(Request $request){
        $user = auth()->user();
        $user->IsActive = false;
        $user->DateDeleted = Date::now();
        $this->logout($request);
        $user->save();
    }
    public function getProfileDetails()
    {
        $authUser = auth()->user();
        return $authUser;
    }

    public function validateRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'Name' => 'required|string|max:255',
            'Email' => 'required|email|unique:users,Email',
            'Password' => 'required|min:8|',
            'ConfirmPassword' => 'required|same:Password',
        ]);

        if($validator->fails()){
            throw new \Illuminate\Validation\ValidationException($validator);
        }
    }

    public function validateLogin(Request $request){

        $validator = Validator::make($request->all(), [
            'Email' => 'required|email',
            'Password' => 'required|',
        ]);

        if($validator->fails()){
            throw new \Illuminate\Validation\ValidationException($validator);
        }
    }
}
