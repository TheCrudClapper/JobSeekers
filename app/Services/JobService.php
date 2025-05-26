<?php
namespace App\Services;
use App\Helpers\ServiceResult;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobService{

    public function create(Request $request) : ServiceResult {
        $this->validateJobFields($request);
        $userId = auth()->user()->Id;
        $model = new Job();
        $model->Title = $request->input('Title');
        $model->UserId = $userId;
        $model->JobTypeId = $request->input('JobTypeId');
        $model->Location = $request->input('Location');
        $model->Salary = $request->input('Salary');
        $model->Vacancy = $request->input('Vacancy');
        $model->Description = $request->input('Description');
        $model->CompanyName= $request->input('CompanyName');
        $model->CompanyLocation = $request->input('CompanyLocation');
        $model->CategoryId = $request->input('CategoryId');
        $model->IsActive = 1;
        $model->save();
        return new ServiceResult(true, "Job Listing Created Successfully!");
    }

    public function update(Request $request, int $id) {
        $this->validateJobFields($request);
        $userId = auth()->user()->Id;

        $model = Job::where('id', $id)
            ->where('UserId', $userId)
            ->first();

        if($model == null)
            return new ServiceResult(false, "Job not found or you are not the owner");

        $model->Title = $request->input('Title');
        $model->JobTypeId = $request->input('JobTypeId');
        $model->Location = $request->input('Location');
        $model->Salary = $request->input('Salary');
        $model->Vacancy = $request->input('Vacancy');
        $model->Description = $request->input('Description');
        $model->CompanyName= $request->input('CompanyName');
        $model->CompanyLocation = $request->input('CompanyLocation');
        $model->CategoryId = $request->input('CategoryId');
        $model->DateEdited = now();
        $model->save();

        return new ServiceResult(true, "Job updated successfully");
    }

    public function delete(int $id) {
        $job = Job::where('id', $id)
            ->where('IsActive', 1)
            ->where('UserId', auth()->user()->Id)
            ->first();

        if($job == null)
            return new ServiceResult(false, "Job not found or you are not the owner");


        $job->IsActive = 0;
        $job->DateDeleted = now();
        $job->save();

        return  new ServiceResult(true, "Job deleted successfully");
    }

    public function getJobForEdit(int $id){
        $job = Job::where('Id', $id)
            ->where('IsActive', 1)
            ->where('UserId', auth()->user()->Id)
            ->first();

        if($job == null)
            return new ServiceResult(false, "Job not found or you are not the owner");

        return $job;
    }

    public function getJob(int $id) : ServiceResult{
        $job = Job::where('Id', $id)
            ->where('IsActive', 1)
            ->with('jobType')
            ->first();

        if($job == null)
            return new ServiceResult(false, "Job not found");

        return new ServiceResult(true, "", $job);
    }

    public function getAllUserJobs(Request $request){
        $jobs = Job::select('Id', 'Title', 'DateCreated')
            ->where('IsActive', 1)
            ->where('UserId', auth()->user()->Id)
            ->get();
        return $jobs;
    }

    public function getFilteredOffers(Request $request){

        $jobs = Job::query()
            ->select('Id', 'Title', 'Salary', 'Location', 'CompanyName')
            ->when($request->Location, function ($query, $location) {
                return $query->where('Location', 'like' , "%{$location}%");
            })
            ->when($request->CompanyName ,function ($query, $companyName){
                return $query->where('CompanyName', 'like' , "%{$companyName}%");
            })
            ->when($request->Title, function ($query, $title){
                return $query->where('Title', 'like' , "%{$title}%");
            })
            ->when($request->CategoryId, function ($query, $categoryId){
                return $query->where('CategoryId', $categoryId);
            })
            ->when($request->JobTypeId, function ($query, $jobTypeIds){
                return $query->whereIn('JobTypeId', $jobTypeIds);
            })
            ->when($request->SalaryFrom, function ($query, $salary){
                return $query->where('Salary', '>=', $salary);
            })
            ->when($request->SalaryTo, function ($query, $salary){
                return $query->where('Salary', '<=', $salary);
            })
            ->when($request->DateFrom, function ($query, $dateFrom){
               return $query->where('DateCreated', '>=', $dateFrom);
            })
            ->when($request->DateTo, function ($query, $dateTo){
                return $query->where('DateCreated', '<=', $dateTo);
            })
            ->when($request->VacancyFrom, function ($query, $vacancyFrom){
                return $query->where('Vacancy', '>=', $vacancyFrom);
            })
            ->when($request->VacancyTo, function ($query, $vacancyTo){
                return $query->where('Vacancy', '<=', $vacancyTo);
            })
            ->when($request->SortOption, function ($query, $SortOption){
                switch ($SortOption) {
                    case "date_created_asc":
                        return $query->orderBy('DateCreated', 'asc');
                        break;
                    case "date_created_desc":
                        return $query->orderBy('DateCreated', 'desc');
                        break;
                    case "salary_desc":
                        return $query->orderBy('Salary', 'desc');
                        break;
                    case "salary_asc":
                        return $query->orderBy('Salary', 'asc');
                        break;
                    default:
                        return $query;
                }
            })
            ->where('IsActive', 1)
            ->get();
        return $jobs;
    }
    public function validateJobFields(Request $request) {
        $validator = Validator::make($request->all(), [
            'Title' => 'required|string|max:40',
            'Description' => 'required|string|max:300',
            'Salary' => 'required|numeric|min:1',
            'Location' => 'required|string|max:40',
            'CompanyLocation' => 'required|string|max:40',
            'CompanyName' => 'required|string|max:40',
            'Vacancy' => 'required|numeric|min:1',
            'CategoryId' => 'required|numeric|max:40',
            'JobTypeId' => 'required|int|max:40',
        ]);
        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }
    }

}
