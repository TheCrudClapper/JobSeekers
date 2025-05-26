<?php

namespace App\Http\Controllers;
use App\Services\CategoryService;
use App\Services\HomeService;
use App\Services\JobService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private readonly HomeService $homeService;
    private readonly JobService $jobService;
    private readonly CategoryService $categoryService;

    function __construct()
    {
        $this->homeService = new HomeService();
    }
    public function home()
    {
        $this->categoryService = new CategoryService();
        $featuredJobs = $this->homeService->getFeaturedJobs();
        $latestJobs = $this->homeService->getLatestJobs();
        $topCategories = $this->categoryService->getCategoriesWithJobs();
        $categories = $this->categoryService->getCategories();
        return view("home.home", [
            'categories' => $categories,
            'topCategories' => $topCategories,
            'featuredJobs' => $featuredJobs,
            'latestJobs' => $latestJobs,
        ]);
    }
}
