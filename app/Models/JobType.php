<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model {
    use HasFactory;
    const UPDATED_AT = "DateEdited";
    const CREATED_AT = "DateCreated";
    protected $table = "jobtype";
    protected $primaryKey = "Id";

    public function jobs()
    {
        return $this->hasMany(Job::class, 'JobTypeId', 'Id');
    }
}
