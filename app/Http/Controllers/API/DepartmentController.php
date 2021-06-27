<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request){
        return Department::query()->when($request->search, function($query) use ($request){
            $query->whereRaw('lower(name) LIKE ?', ['%'.strtolower($request->search).'%']);
        })
        ->paginate(Department::PER_PAGE);
    }

    public function store(DepartmentRequest $request){
        return response([
            'new_department' => Department::query()->create($request->all())
        ], 201);
    }

    public function show(Department $department){
        return response(['department' => $department], 202);
    }

    public function update(DepartmentRequest $request, Department $department){
        $department->update($request->all());
        return response([
            'department' => $department
        ], 203);
    }

    public function destroy(Department $department){
        return response([
            'deleted' => $department->delete()
        ]);
    }

    public function addPosition(Request $request, Department $department){
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2'],
        ]);

        return response([
            'new_position' => $department->addPosition($validated),
        ], 201);
    }
}
