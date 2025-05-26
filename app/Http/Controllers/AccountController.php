<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AccountService;
use function Laravel\Prompts\alert;

class AccountController extends Controller
{
    private AccountService $service;
    public function __construct() {
       $this->service = new AccountService();
    }
    public function login(){
        return view("account.login");
    }
    public function register(){
        return view("account.register");
    }
    public function registerUser(Request $request) {
        $this->service->create($request);
        return redirect("/account/login");
    }
    public function loginUser(Request $request){
        $this->service->login($request);
        return redirect("/");
    }
    public function deleteAccount(Request $request){
        $this->service->delete($request);
        return redirect("/");
    }
    public function update(Request $request)
    {
        $this->service->update($request);
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    public function changePassword (Request $request)
    {
        $this->service->resetPassword($request);
        return redirect()->back()->with('success', 'Password updated successfully');
    }
    public function logout(Request $request){
        $this->service->logout($request);
        return redirect("/");
    }
    public function profile(){
        $model = $this->service->getProfileDetails();
        return view("account.profile", ['model' => $model]);
    }
}
