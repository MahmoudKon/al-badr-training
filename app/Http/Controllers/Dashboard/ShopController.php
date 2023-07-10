<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        return view('dashboard.shops.index');
    }


    public function edit(string $id)
    {
    }


    public function update(Request $request, string $id)
    {
    }


    public function destroy(string $id)
    {
    }
}
