<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Controllers\DashboardController;


class RoleController extends DashboardController
{
    protected string $folder = 'roles';
    protected string $model ='App\\Models\\Role';

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        // dd($request->validated());
        // $role = new Role();
        $role = Role::create([
            'name'=> $request->name,
            'permission'=>json_encode($request->permissions),

        ]);
        if ($role) {
            // return response()->json($role, 500);
            return response()->json(['message' => 'تم انشاء الصلاحيه بنجاح'], 200);
        }else{return response()->json(['message' => 'تم انشاء الصلاحيه بنجاح'], 200);}
        // $role->name = $req->name;
        // $role->permissions = json_encode($req->permissions);
        // $role->save();
        // try{
        //     $row = $this->role_process(new Role, $request->validated());
        //     if($row){
        //         return response()->json($row, 500);
        //     }else{
        //         return response()->json(['message' => 'تم انشاء اليوزر بنجاح'], 200);
        //     }
        //     // return $row instanceof Exception
        //     //     ? response()->json($row, 500)
        //     //     : response()->json(['message' => 'تم انشاء اليوزر بنجاح'], 200);
        // }catch(\Exception $ex){return response()->json(['message' => ' شي ما خطا'], 400);}
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }
    /**
     * role_process function using for ...
     * helping encode data in the table
     */
    protected function role_process(Role $role, $req){
        $role->name = $req->name;
        $role->permissions = json_encode($req->permissions);
        $role->save();
        return $role;
    }
}
