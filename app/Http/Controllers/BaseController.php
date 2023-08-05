<?php

namespace App\Http\Controllers;
use App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BaseController extends Controller
{

    protected string $folder;
    protected string $model;
    protected string  $request;
    protected string $service;
    protected string $message;
    protected bool $btn_ajax = true;

    public function __construct()
    {
        view()->share('btn_ajax', $this->btn_ajax);
    }
    


    public function index()
    {
        if (request()->ajax()) {
            $rows = $this->query();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view("dashboard.{$this->getModule()}.rows", ['rows' => $rows->paginate( request()->get('limit', 1) )])->render(),
            ]);
        }
        return view("dashboard.includes.pages.index");
    }

    // public function index()
    // {
    //     if (request()->ajax()) {
    //         $rows = $this->model::filter();
    //         return response()->json([
    //             'count' => $rows->count(),
    //             'view'  => view('dashboard.'.$this->folder.'.includes.rows', ['rows' => $rows->paginate( request()->get('limit', 1) )])->render(),
    //         ]);
    //     }
    //     return view('dashboard.'.$this->folder.'.index');
    // }

    // public function create(){
    //     return view('dashboard.'.$this->folder.'.create', $this->append());
    // }


    public function create()
    {
        if (! request()->ajax()) $this->btn_ajax = false;
        $folder = $this->btn_ajax ? "forms" : "pages";
        return view("dashboard.includes.$folder.create", $this->append());
       //return 'kkkkk';
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

    public function getModule(bool $singular = false): string
    {
        return $singular ? str($this->folder)->singular() : $this->folder;
    }



    public function multiDelete(Request $request)
    {
        $count = $this->query()->whereIn('id', $request->get('ids'))->delete();
        return response()->json([
            'message' => trans('flash.rows deleted', ['model' => trans('menu.'.$this->getModule(true) ), 'count' =>$count] )
        ], 200);
    }


    
    protected function query(?int $id = null): Builder
    {
        return $this->model::filter()->when($id, fn($query) => $query->where('id', $id));
    }


 protected function append(): array
    {
        return [
            //
        ];
    }
    

}
