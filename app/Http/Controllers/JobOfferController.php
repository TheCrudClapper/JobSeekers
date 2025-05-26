<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\JobService;
use App\Services\JobTypeService;
use App\Services\SortOptionService;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    private JobService $service;
    private JobTypeService $typeService;
    private CategoryService $categoryService;

    private SortOptionService $sortOptionService;

    function __construct()
    {
        $this->service = new JobService();
        $this->typeService = new JobTypeService();
        $this->categoryService = new CategoryService();
    }

    //Get
    public function create()
    {
        $categories = $this->categoryService->getCategories();
        $jobTypes = $this->typeService->getJobTypes();

        return view('jobOffer.create', [
            'categories' => $categories,
            'jobTypes' => $jobTypes
        ]);
    }

    //Post
    public function createJob(Request $request)
    {
        $result = $this->service->create($request);
        if (!$result->success)
            return redirect('/job/user-jobs')->with('error', $result->message);

        return redirect("/job/user-jobs")->with('success', $result->message);
    }

    //Get
    public function edit($id)
    {
        $categories = $this->categoryService->getCategories();
        $jobTypes = $this->typeService->getJobTypes();
        $job = $this->service->getJobForEdit($id);

        return view('jobOffer.edit', [
            'categories' => $categories,
            'jobTypes' => $jobTypes,
            'job' => $job
        ]);
    }

    //Post
    public function editJob(Request $request, $id)
    {
        $result = $this->service->update($request, $id);
        if (!$result->success)
            return redirect('/job/user-jobs')->with('error', $result->message);

        return redirect('/job/user-jobs')->with('success', $result->message);
    }

    //Post
    public function deleteJob(int $id)
    {
        $result = $this->service->delete($id);
        if (!$result->success) {
            return redirect('/job/user-jobs')->with('error', $result->message);
        }
        return response(200);
    }

    //Get
    public function userJobs(Request $request)
    {
        $jobs = $this->service->getAllUserJobs($request);
        return view('jobOffer.index', compact('jobs'));
    }

    //Get
    public function showJob(int $id)
    {
        $result = $this->service->getJob($id);
        if(!$result->success)
            return redirect('/job/job-browser')->with('error', $result->message);

        return view("jobOffer.show",[
            'job' => $result->data
        ]);
    }

    public function jobBrowser(Request $request)
    {

        $sortOptionService = new SortOptionService();
        $sortOptions = $sortOptionService->getSortOptions();

        $categories = $this->categoryService->getCategories();
        $jobTypes = $this->typeService->getJobTypes();
        $jobs = $this->service->getFilteredOffers($request);

        return view('browser.job_browser', [
            'categories' => $categories,
            'jobTypes' => $jobTypes,
            'jobs' => $jobs,
            'sortOptions' => $sortOptions,
        ]);
    }
    public function getSortingOptions(){

    }
}
