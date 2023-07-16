<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Database\Eloquent\Builder;

class UserController extends DashboardController
{
    protected string $folder = 'users';
    protected string $model  = 'App\\Models\\UserNormal';

    public function store(UserRequest $request, UserService $service)
    {
        $row = $service->handel($request->validated());

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => 'تم انشاء اليوزر بنجاح'], 200);
    }

    public function update(UserRequest $request, UserService $service, $user)
    {
        $row = $service->handel($request->validated(), $user);

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => 'تم تعديل اليوزر بنجاح'], 200);
    }

    protected function query(?int $id = null): Builder
    {
        return $this->model::filter()->when($id, fn($query) => $query->where('id', $id))->where('id', '<>', auth()->id());
    }
}
