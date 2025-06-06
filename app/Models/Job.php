<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Job extends Model {
    use HasFactory;
    const UPDATED_AT = "DateEdited";
    const CREATED_AT = "DateCreated";
    protected $table = "jobs";
    protected $primaryKey = "Id";

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId', 'Id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryId', 'Id');
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'JobTypeId', 'Id');
    }

    public function application() : BelongsToMany
    {
        return $this->belongsToMany(Application::class, 'job_applications', 'JobId', 'ApplicationId')
            ->using(JobApplications::class)
            ->withPivot(['UserId','JobId','Status', 'Notes', 'DateCreated', 'DateEdited', 'IsActive']);
    }
}
