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
                        <i class="fa fa-envelope-open mr-1"></i>
                        Tickets
                    </h3>
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 4)
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-sm btn-flat btn-primary" href="/tickets/create">Add new ticket</a>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">
                    <div style="float: left">
                    <form action="/exportTickets" method="GET" enctype="multipart/form-data">
                        @csrf
                        <button class="btn btn-success">Export All Tickets Data</button>
                    </form>
                    </div>
                    <div style="float: right">
                    <form action="/exportInProgressTickets" method="GET" enctype="multipart/form-data">
                        @csrf
                        <button class="btn btn-success">Export In progress Tickets Data</button>
                    </form>
                    </div>
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
                            @if(auth()->id() == $t->officer_id || auth()->id() == $t->user_id || \Illuminate\Support\Facades\Auth::user()->role_id == 5)
                            <tr class="clickable-row" data-href="/tickets/{{ $t->id }}" >
                                <td>{{ $t->id }}</td>
                                @if($t->ticket_request_type == 1)
                                <td>Equipment request</td>
                                @else
                                    <td>Service request</td>
                                @endif
                                <td>{{ $t->subject }}</td>
                                <td>{{ $t->status->name }}</td>
                                <td>{{ $t->user->name }}</td>
                                <td>{{ $t->officer->name }}</td>
                            </tr>
                            @endif
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
