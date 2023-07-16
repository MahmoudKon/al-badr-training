<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            // $rows = $this->filter();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view('dashboard.users.includes.rows', ['rows' => $rows->paginate(request()->get('limit', 1))])->render(),
            ]);
        }
        return view('dashboard.users.index', ['title' => 'قائمة المستخدمين']);
    }
}
