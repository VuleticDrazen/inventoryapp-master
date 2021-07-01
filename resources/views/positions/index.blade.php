@extends('layouts.main')

@section('page_title', 'Positions list')

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
                        Positions
                    </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="btn btn-sm btn-flat btn-primary" href="/positions/create">Add new position</a>
                                </li>
                            </ul>
                        </div>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <form action="/exportPositions" method="GET" enctype="multipart/form-data">
                        @csrf
                        <button class="btn btn-success">Export All Positions Data</button>
                    </form>

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($positions as $position)
                            <tr class="clickable-row" data-href="/positions/{{ $position->id }}" >
                                <td>{{ $position->id }}</td>
                                <td>{{ $position->name }}</td>
                                <td>{{ $position->department->name}}</td>
                                <td>
                                    <a href="/positions/{{ $position->id }}/edit" class="btn btn-primary btn-sm btn-flat">
                                        <i class="fa fa-edit">EDIT</i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm btn-flat" onclick="confirmPositionDelete({{ $position->id }}, event)">
                                        <i class="fa fa-times"></i>
                                        DELETE
                                    </a>
                                    <form action="/positions/{{ $position->id }}" method="POST" id="delete_form_{{ $position->id }}">
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
    <script src="{{ asset('/js/positions/index.js') }}"></script>
@endsection
