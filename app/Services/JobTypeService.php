<?php
namespace App\Services;
use App\Models\JobType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobTypeService
{
    public function getJobTypes()
    {
        return JobType::select('Id', 'Name')
            ->where("IsActive", 1)
            ->get();
    }
}
