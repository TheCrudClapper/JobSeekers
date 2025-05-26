<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory;

    const UPDATED_AT = "DateEdited";
    const CREATED_AT = "DateCreated";
    protected $table = "categories";
    protected $primaryKey = "Id";

    public function jobs()
    {
        return $this->hasMany(Job::class, 'CategoryId', 'Id');
    }
}
