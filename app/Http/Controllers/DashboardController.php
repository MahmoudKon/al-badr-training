<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    protected string $folder;
    protected string $model;
    protected string $main = "dashboard";
    public bool $button_ajax = false;

    public function index()
    {
        if (request()->ajax()) {
            $rows = $this->query();
            return response()->json([
                'count' => $rows->count(),
                'view'  => view("dashboard.{$this->folder}.includes.rows", 
                ['rows' => $rows->paginate( request()->get('limit', 1) )])->render(),
            ]);
        }
        return view("dashboard.{$this->folder}.index", [ 'button_ajax' => $this->button_ajax]);
    }

    public function create()
    {
        if (request()->ajax())
            return view("dashboard.{$this->folder}.create", $this->append());
        return view("dashboard.includes.create", $this->append());
    }

    public function edit($id)
    {
        $row = $this->query($id)->first();
        return view("dashboard.{$this->folder}.update", compact('row'), $this->append());
    }

    public function destroy($id)
    {
        $this->query($id)->delete();
        return response()->json(['message' => 'تم حذف '.Str::singular($this->folder).' بنجاح'], 200);
    }

    public function multiDelete(Request $request)
    {
        $count = $this->query()->whereIn('id', $request->get('ids'))->delete();
        return response()->json(['message' => "تم حذف $count من السجلات"], 200);
    }

    protected function query(?int $id = null): Builder
    {
        return $this->model::filter()->when($id, fn($query) => $query->where('id', $id));
    }

    protected function append(): array
    {
        return [
            //
        ];
    }
}
