@extends('layouts.main')

@section('page_title', 'Employees list')

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
                        Employees
                    </h3>
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-flat btn-primary" href="/users/create">Add new employee</a>
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
                            <th>E-mail</th>
                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                            <th>Edit</th>
                            <th>Delete</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="clickable-row" data-href="/users/{{ $user->id }}" >
                                <td>{{ $user->id }}</td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>{{ $user->email }}</td>
                                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                <td>
                                    <a href="/users/{{ $user->id }}/edit" class="btn btn-primary btn-sm btn-flat">
                                        <i class="fa fa-edit"></i>
                                        EDIT
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm btn-flat @if($user->id == auth()->id()) disabled @endif " onclick="confirmUserDelete({{ $user->id }}, event)">
                                        <i class="fa fa-times"></i>
                                        DELETE
                                    </a>
                                    <form action="/users/{{ $user->id }}" method="POST" id="delete_form_{{ $user->id }}">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


    <!-- /.modal for export filters -->



@endsection

@section('additional_scripts')
    <script src="{{ asset('/js/users/index.js') }}"></script>



@endsection
