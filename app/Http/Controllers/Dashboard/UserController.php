<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\UserNormal;
use App\Services\UserService;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $rows = UserNormal::filter();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view('dashboard.users.includes.rows', ['rows' => $rows->paginate( request()->get('limit', 1) )])->render(),
            ]);
        }
        return view('dashboard.users.index');
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

    public function edit(UserNormal $user)
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

    public function destroy(UserNormal $user)
    {
        $user->delete();
        return response()->json(['message' => 'تم حذف اليوزر بنجاح'], 200);
    }
}
