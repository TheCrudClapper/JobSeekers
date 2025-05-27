<?php

namespace App\Http\Controllers;
use App\Services\ApplicationService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    private ApplicationService $service;

    function __construct()
    {
        $this->service = new ApplicationService();
    }

    public function create(Request $request){
        if(!$request->has('JobId')){
            return redirect('/jobs')->with('error', 'Job ID is missing.');
        }
        return view('application.create');
    }

    public function createApplication(Request $request, int $id){
        $result = $this->service->create($request, $id);
        if(!$result->success){
            return redirect('/job/job-browser/')->with('error', 'Something went wrong.');
        }
        return redirect('/job/job-browser/')->with('success', $result->message);
    }

    public function showUserApplications(){
        $jobApplications = $this->service->getUserJobApplications();
        return view('application.user_applications', [
            'jobApplications' => $jobApplications
        ]);

    }
    public function deleteApplication(int $id){
        $result = $this->service->delete($id);
        if (!$result->success) {
            return redirect('application/show-applications')->with('error', $result->message);
        }
        return response(200);
    }
}
