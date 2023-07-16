<?php

namespace App\Http\Controllers;
use App\Models;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function indexs($model, string $view)
    {
        if (request()->ajax()) {
            $rows = $model::filter();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view('dashboard.'.$view.'.includes.rows', ['rows' => $rows->paginate( request()->get('limit', 1) )])->render(),
            ]);
        }
        return view('dashboard.'.$view.'.index');
    }

    public function stores($request, $service, string $message)
    {
        $row = $service->handel($request->validated());

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => $message], 200);
    }


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


    

}
