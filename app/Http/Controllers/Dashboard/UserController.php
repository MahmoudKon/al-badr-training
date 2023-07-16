<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\UserNormal;
use App\Services\UserService;
use App\Http\Controllers\BaseController;

use Exception;

class UserController extends BaseController
{
    
    public function index(UserNormal $user){
       return  $this->indexs($user, 'users');
    }


    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store (UserRequest $request, UserService $service)
    {
        return  $this->stores( $request,  $service, "تم انشاء اليوزر بنجاح") ;
    }


    public function edit(UserNormal $user)
    {
        return view('dashboard.users.update', ['row' => $user]);
    }

    public function update(UserRequest $request, UserService $service, $user){

        return  $this->updates( $request,  $service, $user, "تم تعديل اليوزر بنجاح") ;

    }

    public function destroy(UserNormal $user){
        return $this->destroys($user,  "تم حذف اليوزر بنجاح");
    }
}
