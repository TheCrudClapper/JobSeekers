<?php
namespace  App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortOptions extends Model
{
    use HasFactory;
    const UPDATED_AT = "DateEdited";
    const CREATED_AT = "DateCreated";
    protected $table = "sort_options";
    protected $primaryKey = "Id";

}
