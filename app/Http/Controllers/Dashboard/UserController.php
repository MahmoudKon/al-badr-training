<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Dashboard\UserStoreRequest;
use App\Http\Requests\Dashboard\UserUpdateRequest;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }
    public function store(UserStoreRequest $request)
    {
        // User::create($request->validated());
        $user = $request->except(['_token', 'hidden']);
        User::create($user);
        return redirect()->route('dashboard.users.index');
    }

    public function update(UserUpdateRequest $request, int $id)
    {
        $user = User::findorfail($id);
        $user->update($request->validated());
        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users.index');
    }
}
