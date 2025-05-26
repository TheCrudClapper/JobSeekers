<?php

namespace App\Services;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeService{

    public function getFeaturedJobs(){
        return Job::with([
            'jobtype' => function($query){
                $query->select('Id', 'Name')->where('IsActive', 1);
            }
            ])
            ->whereHas('jobtype', function($query){
                $query->where('IsActive', 1);
            })
            ->where('IsActive', 1)
            ->select('Id', 'Title', 'Location', 'CompanyName', 'JobTypeId', 'Salary')
            ->limit(6)
            ->get();
    }
    public function getLatestJobs(){
        return Job::with([
            'jobtype' => function($query){
                $query->select('Id', 'Name')->where('IsActive', 1);
            }
            ])
            ->whereHas('jobtype', function($query){
                $query->where('IsActive', 1);
            })
            ->where('IsActive', 1)
            ->select('Id', 'Title', 'Location', 'CompanyName', 'Salary' ,'JobTypeId')
            ->orderBy('DateCreated', 'desc')
            ->limit(6)
            ->get();
    }
}
