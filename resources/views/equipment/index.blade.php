@extends('layouts.main')

@section('page_title', 'Equipment list')

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
                        <i class="fas fa-laptop-code mr-1"></i>
                        Equipment
                    </h3>
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-flat btn-primary" href="/equipment/create">Add new equipment</a>
                            </li>
                        </ul>
                    </div>
                        @endif
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">
                    <form action="/exportEquipment" method="GET" enctype="multipart/form-data">
                        @csrf
                        <button class="btn btn-success">Export All Equipment Data</button>
                    </form>

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Qty. available</th>
                            <th>Description</th>
                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                            <th>Edit</th>
                            <th>Delete</th>
                                @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($equipment as $e)
                            <tr class="clickable-row" data-href="/equipment/{{ $e->id }}" >
                                <td>{{ $e->id }}</td>
                                <td>
                                    {{ $e->category->name }}
                                </td>
                                <td>{{ $e->name }}</td>
                                <td>{{ $e->available_quantity }}</td>
                                <td>{{ $e->short_description }}</td>
                                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                <td>
                                    <a href="/equipment/{{ $e->id }}/edit" class="btn btn-primary btn-sm btn-flat">
                                        <i class="fa fa-edit"></i>
                                        EDIT
                                    </a>
                                </td>

                                <td>
                                    <a class="btn btn-danger btn-sm btn-flat" onclick="confirmEquipmentDelete({{ $e->id }}, event)">
                                        <i class="fa fa-times"></i>
                                        DELETE
                                    </a>
                                    <form action="/equipment/{{ $e->id }}" method="POST" id="delete_form_{{ $e->id }}">
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

@endsection

@section('additional_scripts')
    <script src="{{ asset('/js/equipment/index.js') }}"></script>
@endsection
