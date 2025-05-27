<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class JobApplications extends Pivot{
    use HasFactory;
    const UPDATED_AT = "DateEdited";
    const CREATED_AT = "DateCreated";
    protected $table = "job_applications";
    protected $primaryKey = "Id";
    public function job(){
        return $this->belongsTo(Job::class, 'JobId', 'Id');
    }
    public function application(){
        return $this->belongsTo(Application::class, 'ApplicationId', 'Id');
    }
}
