<?php

namespace App\Http\Controllers;
use App\Models;

use Illuminate\Http\Request;

class BaseController extends Controller
{

    protected string $folder;
    protected string $model;
    protected string  $request;
    protected string $service;
    protected string $message;

    public function index()
    {
        if (request()->ajax()) {
            $rows = $this->model::filter();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view('dashboard.'.$this->folder.'.includes.rows', ['rows' => $rows->paginate( request()->get('limit', 1) )])->render(),
            ]);
        }
        return view('dashboard.'.$this->folder.'.index');
    }

    public function create(){
        return view('dashboard.'.$this->folder.'.create', $this->append());
    }

    public function stores( $request, $service, string $message)
    {
        $row =$service->handel($request->validated());

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' =>'تم انشاء .'.$message .'.بنجاح' ], 200);
    }

    // public function edit($model){
    //     return view('dashboard.'.$this->folder.'.update', ['row' => $this->model], $this->append());
    // }


    public function updates( $request, $service, $object, string $message)
    {
        $row = $service->handel($request->validated(), $object);

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => $message], 200);
    }


    public function destroys( $object,string $message)
    {
        $object->delete();
        return response()->json(['message' => $message], 200);
    }

 protected function append(): array
    {
        return [
            //
        ];
    }
    

}
