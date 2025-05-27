<?php
namespace App\Services;
use App\Helpers\DocumentHandler;
use App\Helpers\ServiceResult;
use App\Models\Application;
use App\Models\JobApplications;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ApplicationService
{
    private DocumentHandler $documentHandler;

    function __construct(){
        $this->documentHandler = new DocumentHandler();
    }
    public function create(Request $request, int $id) : ServiceResult{
        $this->validateCreateRequest($request);

        $cvPath = $this->documentHandler->saveCv($request->file('Cv'));

        $letterPath = null;
        if($request->input('Letter') != null){
            $letterPath = $this->documentHandler->saveLetter($request->file('Letter'));
        }

        $application = new Application();
        $application->DateCreated = now();
        $application->IsActive = true;
        $application->UserId = auth()->user()->Id;
        $application->CvPath = $cvPath;
        $application->CoverLetterPath = $letterPath;
        $application->save();

        $application->jobs()->attach($id, [
            'ApplicationId' => $application->Id,
            'Status' => 'Sent',
            'Notes' => null,
            'IsActive' => true,
            'DateCreated' => now(),
        ]);
        return new ServiceResult(true, 'Successfully created application.');
    }
    public function getUserJobApplications(){
        $userId = auth()->user()->id;

        return JobApplications::with([
            'job', 'application'])
            ->whereHas('application', function($query){
                $query->where('UserId', auth()->user()->Id);
            })
            ->where('IsActive', true)
            ->get();
    }
    public function delete(int $id) : ServiceResult{
        $application = Application::where('Id', $id)
            ->where('IsActive', 1)
            ->where('UserId', auth()->user()->Id)
            ->first();

        if($application == null){
            return new ServiceResult(false, "Application not found");
        }

        $application->DateDeleted = now();
        $application->IsActive = false;
        $application->save();

        $jobApplication = JobApplications::where('ApplicationId', $application->Id)
            ->where('IsActive', true)
            ->first();

        if($jobApplication == null){
            return new ServiceResult(false, "Job Application not found");
        }

        $jobApplication->IsActive = false;
        $jobApplication->DateDeleted = now();
        $jobApplication->save();

        return new ServiceResult(true, "Successfully deleted application.");
    }
    public function validateCreateRequest(Request $request){
        $validator = Validator::make($request->all(), [
            'Cv' => 'required|file|mimes:pdf,docx,doc',
            'Letter' => 'nullable|file|mimes:pdf,docx,doc',
        ]);
        if($validator->fails()){
            throw new ValidationException($validator);
        }
    }
}
