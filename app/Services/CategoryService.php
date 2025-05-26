<?php
namespace App\Services;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class  CategoryService
{
    public function getCategories()
    {
        return Category::select('Id', 'Name')
            ->where("IsActive", 1)
            ->get();
    }
    public function getCategoriesWithJobs()
    {
        return Category::select('Id', 'Name')
            ->withCount(['jobs' => function ($query) {
                $query->where('IsActive', 1);
            }])
            ->where('IsActive', 1)
            ->orderBy('jobs_count', 'desc')
            ->limit(4)
            ->get();
    }
}
