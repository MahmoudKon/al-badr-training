<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Contracts\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    protected string $view;
    protected string $model;

    public function index()
    {
        if (request()->ajax()) {
            $rows = $this->query();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view("dashboard.{$this->view}.includes.rows", ['rows' => $rows->paginate(request()->get('limit', 1))])->render(),
            ]);
        }
        return view("dashboard.{$this->view}.index");
    }

    public function create()
    {
        return view("dashboard.{$this->view}.create", $this->append());
    }

    public function edit($id)
    {
        $row = $this->query($id)->first();
        return view("dashboard.{$this->view}.update", compact('row'), $this->append());
    }

    public function destroy($id)
    {
        $this->query($id)->delete();
        return redirect()->route('dashboard.categories.index');
    }

    public function multiDelete(Request $request)
    {
        $count = $this->query()->whereIn('id', $request->get('ids'))->delete();
        return response()->json(['message' => "تم حذف $count من السجلات"], 200);
    }

    protected function query(?int $id = null): Builder
    {
        return $this->model::filter()->when($id, fn ($query) => $query->where('id', $id));
    }

    protected function append(): array
    {
        return [
            //
        ];
    }
}
