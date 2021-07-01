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
                        <i class="fas fa-microchip mr-1"></i>
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

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>
                                    {{ $department->name }}
                                </td>
                                <td>
                                    {{$department->created_at}}
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
