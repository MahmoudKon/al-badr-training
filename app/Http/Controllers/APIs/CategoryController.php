<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService ;
use App\Http\Controllers\BaseAPIController;
class CategoryController extends BaseAPIController
{
    public function index()
    {
        $rows = Category::all();
        return $this->sendResponse(CategoryResource::collection($rows),
        'all categories retrive succcesfully');
    }

    public function store(CategoryRequest $request, CategoryService $service)
    {
       
        $row =$service->handel($request->validated());

        return $row instanceof Exception
                ? $this->sendError('please validate error',$validator->errors() )
                : $this->sendResponse(new CategoryResource($row), 'category added successfully');
   
        
    }

    public function updates( CategoryRequest $request, CategoryService $service, $category)
    {
        $row = $service->handel($request->validated(), $category);

        return $row instanceof Exception
        ? $this->sendError('please validate error',$validator->errors() )
        : $this->sendResponse(new CategoryResource($row), 'category updated successfully');


    
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return $this->sendResponse(new CategoryResource($category), 'category deleted successfully');
    }

}
