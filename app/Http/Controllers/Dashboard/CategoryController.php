<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService ;
use App\Http\Controllers\BaseController;

use Exception;


class CategoryController extends BaseController
{
    protected string $folder = 'categories';
    protected string $model  = 'App\\Models\\Category';
    protected string $message = 'الصنف';
   
    // public function index(Category $category){
    //     return  $this->indexs($category, 'categories');
    //  }

    // public function create(){
    //     return view('dashboard.categories.create');
    // }


    public function store (CategoryRequest $request, CategoryService $service)
    {
        return  $this->stores( $request,  $service, "تم انشاء الصنف بنجاح") ;
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.update', ['row' => $category]);
    }

    public function update(CategoryRequest $request, CategoryService $service, $category){

        return  $this->updates( $request,  $service, $category, "تم تعديل الصنف بنجاح") ;

    }

   

    public function destroy(Category $category){
        return $this->destroys($category,  "تم حذف الصنف بنجاح");
    }
     
    
}
