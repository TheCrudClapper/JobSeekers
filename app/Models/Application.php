<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Application extends Model
{
    use HasFactory;

    const UPDATED_AT = "DateEdited";
    const CREATED_AT = "DateCreated";
    protected $table = "application";
    protected $primaryKey = "Id";

    public function user(){
        return $this->belongsTo(User::class, 'UserId', 'Id');
    }
    public function jobs() : BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'job_applications', 'Id', 'JobId')
            ->using(JobApplications::class)
            ->withPivot(['UserId','JobId','Status', 'Notes', 'DateCreated', 'DateEdited', 'IsActive']);
    }
}
