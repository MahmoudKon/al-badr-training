<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use Exception;

class ShopController extends Controller
{
    public function index()
    {
        $row = Shop::first();
        return view('dashboard.shops.index', compact('row'));
    }

    public function store(ShopRequest $request)
    {
        try {
            $row = Shop::first();
            $row->update($request->validated());
            return response()->json(['message' => 'تم حفظ البيانات'], 200);
        } catch(Exception $e) {
            return response()->json($e, 500);
        }
    }

    public function destroy()
    {
        $row = Shop::first();
        $row->delete();
        session()->flash('success', 'تم حذف جميع بيانات المؤسسة بنجاح');
        auth()->logout();
        return redirect()->route('login');
    }
}
