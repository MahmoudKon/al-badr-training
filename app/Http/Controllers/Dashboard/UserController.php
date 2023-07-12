<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'email', 'name')->paginate(5);
        return view('dashboard.users.index', compact('users'));
    }

    // index of trashed 

    public function trasheduser()
    {
        $user=User::onlyTrashed()->get();
        return view('Dashboard.trashed')->with('user', $user);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request, UserService $service)
    {
        $service->handel($request->validated());
        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        $user = User::where('id', $user)->first(); 
        return view('Dashboard.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {   
        return view('dashboard.users.create', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, UserService $service, $user)
    {
        $service->handel($request->validated(), $user);
        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */

    // soft delete function 
     public function soft_delete($id)
     {
         $user=User::find($id);
         $user->delete();
         return redirect()->back();
     }
     

     
    public function destroy(User $user)
    {
        $user->delete();  
        session()->flash('success', 'Deleted'); 
        return response()->json(['message' => 'success'], 200);
    }

    public function restore($id)
    {
        $user=User::withTrashed('id', $id)->first();
        $user->restore();
        return redirect()->back();
    }
}
