<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Dashboard\UserStoreRequest;
use App\Http\Requests\Dashboard\UserUpdateRequest;
use App\Services\UserService;
use Exception;

class UserController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $rows = User::filter();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view('dashboard.users.includes.rows', ['rows' => $rows->paginate(request()->get('limit', 1))])->render(),
            ]);
        }
        return view('dashboard.users.index');
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(UserStoreRequest $request, UserService $service)
    {
        $shop = Shop::create([
            'name' => $request['companyname'],
            'address' => $request['address'],
            'phone' => $request['phone'],
        ]);
        $row = $service->handel($request->validated(), null, $shop['id']);
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم انشاء اليوزر بنجاح'], 200);
    }

    public function edit(User $user)
    {
        return view('dashboard.users.update', ['row' => $user]);
    }
    public function update(UserStoreRequest $request, UserService $service, $user)
    {
        $data = User::where('id', $user)->first();
        $shop = Shop::where('id', $data->shop_id)->first();
        $shop->update(['name' => $request->companyname, 'address' => $request->address, 'phone' => $request->phone]);
        $row = $service->handel($request->validated(), $user, $shop['id']);
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم تعديل اليوزر بنجاح'], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users.index');
    }
}
