<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    //
    public function index(){
        $users = User::paginate(50);
        // return $data;
        // dd($data);
       return view('user.user', ['users' => $users]);
    //    $perPage = 10;     // Number of records per page
    //    $offset = ($page - 1) * $perPage;

    //    $users = User::offset($offset)->limit($perPage)->get();

    //    return response()->json($users );

    }
    public function createUser(){
        return view('user.create');
    }
public function create(Request $request){
    User::create([
        'email' => $request->input('email'),
        'name' => $request->input('name'),
        'password' => bcrypt($request->input('password'))
    ]);

    return redirect('all-users')->with(['message' => 'created successfully']);
}

    public function edit($id){
        // return view with data
        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);

    }

    public function destoy($id){
        $user = User::findOrFail($id);
        $user->delete();

        // return view('user.user');
        return redirect('all-users')->with(['message' => 'deleted successfully']);
    }
    public function updateUser(Request $request){
        Validator::make($request->all(), [
            'email' => 'required|string',
            'name' => 'required|string',
        ]);
        $user = User::findOrFail($request->id);
        $post->update([
            'email' =>  $request->email,
            'name' => $request->name,
        ]);
        return redirect('all-users')->with(['message' => 'edit successfully']);

    }
    public function showUsers()
    {
        $users = User::paginate(15);
        // dd($posts);
        return view( 'user.list-users' , ['users' => $users]);
    }
}
