<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ItemTransaction;

class ReportController extends Controller
{
    public function index()
    {
        $rows = ItemTransaction::with('item', 'store', 'user')->where('store_id', 2)->orderBy('id', 'ASC')->get();
        return view('dashboard.reports.index', compact('rows'));
    }
}
