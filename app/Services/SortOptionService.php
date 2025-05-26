<?php
namespace App\Services;

use App\Models\SortOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SortOptionService
{
    public function getSortOptions(){
        return SortOptions::select('Name' ,'Value')
            ->where('IsActive', true)
            ->get();
    }
}
