<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserDashboard;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
     {
        if (request()->ajax()) {
            $rows = UserDashboard::filter();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view('dashboard.users.includes.rows', ['rows' => $rows->paginate(request()->get('limit', 1))])->render(),
            ]);
        }
        return view('dashboard.users.index', ['title' => 'قائمة المستخدمين']);
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(UserRequest $request, UserService $service)
    {

        $row = $service->handel($request->validated());
        return $row instanceof Exception
            ? response()->json($row, 500)
            : response()->json(['message' => 'تم انشاء اليوزر بنجاح'], 200);
    }

    public function edit(User $user)
    {
        return view('dashboard.users.update', ['row' => $user]);
    }
    public function update(UserRequest $request, UserService $service, $user)
    {
        $row = $service->handel($request->validated(), $user);
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
