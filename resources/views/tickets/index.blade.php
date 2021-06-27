@extends('layouts.main')

@section('page_title', 'Ticket list')

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
                        Tickets
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-flat btn-primary" href="/tickets/create">Add new ticket</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ticket request type</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>User</th>
                            <th>Officer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $t)
                            <tr class="clickable-row" data-href="/tickets/{{ $t->id }}" >
                                <td>{{ $t->id }}</td>
                                <td>{{ $t->ticket_request_type }}</td>
                                <td>{{ $t->subject }}</td>
                                <td>{{ $t->status->name }}</td>
                                <td>{{ $t->user_id }}</td>
                                <td>{{ $t->officer_id }}</td>

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

    <script src="{{ asset('/js/tickets/edit.js') }}"></script>
@endsection
