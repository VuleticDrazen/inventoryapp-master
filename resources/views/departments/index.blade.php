@extends('layouts.main')

@section('page_title', 'Departments list')

@section('additional_styles')
    <style>
        .clickable-row{ cursor: pointer; }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users mr-1"></i>
                        Departments
                    </h3>
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="btn btn-sm btn-flat btn-primary" href="/departments/create">Add new department</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <form action="/exportDepartments" method="GET" enctype="multipart/form-data">
                        @csrf
                        <button class="btn btn-success">Export All Departments Data</button>
                    </form>

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $department)
                            <tr class="clickable-row" data-href="/departments/{{ $department->id }}" >
                                <td>{{ $department->id }}</td>
                                <td>
                                    {{ $department->name }}
                                </td>
                                <td>{{ $department->created_at }}</td>
                                    <td>
                                        <a href="/departments/{{ $department->id }}/edit" class="btn btn-primary btn-sm btn-flat">
                                            <i class="fa fa-edit"></i>
                                            EDIT
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm btn-flat " onclick="confirmDepartmentDelete({{ $department->id }}, event)">
                                            <i class="fa fa-times"></i>
                                            DELETE
                                        </a>
                                        <form action="/departments/{{ $department->id }}" method="POST" id="delete_form_{{ $department->id }}">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection

@section('additional_scripts')
    <script src="{{ asset('/js/departments/index.js') }}"></script>
@endsection
