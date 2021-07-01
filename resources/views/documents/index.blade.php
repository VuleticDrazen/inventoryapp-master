@extends('layouts.main')

@section('page_title', 'Documents list')

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
                        <i class="fas fa-paperclip mr-1"></i>
                        Documents
                    </h3>
                    @if(\Illuminate\Support\Facades\Auth::user()->id == 1)
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-flat btn-primary" href="/documents/create">Add new document</a>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">
                    <div class="" style="float: right">
                        <button class="btn btn-success" id="exportButton">Export data for specified user</button>
                    </div>
                    <div class="" style="float: left ">
                        <form action="/export-all-documents" method="GET" enctype="multipart/form-data">
                            @csrf
                            <button class="btn btn-success">Export all documents</button>
                        </form>
                    </div>
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee</th>
                            <th>Administrator</th>
                            <th>Date</th>
                            @if(\Illuminate\Support\Facades\Auth::user()->id == 1)
                            <th>Edit</th>
                            <th>Delete</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($documents as $doc)
                            <tr class="clickable-row" data-href="/documents/{{ $doc->id }}" >
                                <td>{{ $doc->id }}</td>
                                <td>{{ $doc->user->name }}</td>
                                <td>{{ $doc->admin->name }}</td>
                                <td>{{ $doc->date_formated }}</td>
                                @if(\Illuminate\Support\Facades\Auth::user()->id == 1)
                                <td>
                                    <a href="/documents/{{ $doc->id }}/edit" class="btn btn-primary btn-sm btn-flat">
                                        <i class="fa fa-edit"></i>
                                        EDIT
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm btn-flat" onclick="confirmDocumentDelete({{ $doc->id }}, event)">
                                        <i class="fa fa-times"></i>
                                        DELETE
                                    </a>
                                    <form action="/document/{{ $doc->id }}" method="POST" id="delete_form_{{ $doc->id }}">
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
    <form action="/exportDocuments" method="GET" enctype="multipart/form-data">
        @csrf
    <div class="modal fade" id="exportModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Export documents data by users</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="">User</label>
                        <select name="user_id" id="user_id_select" class="form-control">
                            {{-- AJAX --}}
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Export Data</button>
                </div>
            </div>
        </div>
    </div>
    </form>

@endsection

@section('additional_scripts')
    <script src="{{ asset('/js/documents/index.js') }}"></script>
    <script src="{{ asset('/js/documents/modal.js') }}"></script>
@endsection
