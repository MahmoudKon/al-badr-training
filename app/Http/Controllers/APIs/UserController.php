<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService ;
use App\Http\Controllers\BaseAPIController;
class UserController extends BaseAPIController
{
    public function index()
    {
        $rows = User::all();
        return $this->sendResponse(UserResource::collection($rows),
        'all users retrive succcesfully');
    }

    public function store(UserRequest $request, UserService $service)
    {
       
        $row =$service->handel($request->validated());

        return $row instanceof Exception
                ? $this->sendError('please validate error',$validator->errors() )
                : $this->sendResponse(new UserResource($row), 'User added successfully');
   
        
    }

    public function updates( UserRequest $request, UserService $service, $user)
    {
        $row = $service->handel($request->validated(), $user);

        return $row instanceof Exception
        ? $this->sendError('please validate error',$validator->errors() )
        : $this->sendResponse(new UserResource($row), 'User updated successfully');


    
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->sendResponse(new UserResource($user), 'User deleted successfully');
    }

}



















