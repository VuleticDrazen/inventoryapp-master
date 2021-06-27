@extends('layouts.main')
@section('page_title', 'SuperAdminDashboard')

@section('additional_styles')
    <style>
        .clickable-row{ cursor: pointer; }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-laptop-code mr-1"></i>
                        Available equipment by category
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    @foreach($categories as $category)
                        <div class="card card-default collapsed-card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">{{ $category->name }}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Qty. available</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($category->equipment as $e)
                                        <tr class="clickable-row" data-href="/equipment/{{ $e->id }}" >
                                            <td>{{ $e->id }}</td>
                                            <td>{{ $e->name }}</td>
                                            <td>{{ $e->available_quantity }}</td>
                                            <td>{{ $e->short_description }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-paperclip mr-1"></i>
                        Tickets
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    @foreach($tickets as $t)

                        <div class="card card-default collapsed-card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Ticket: {{ $t->id }} / Created at: {{$t->created_at}} / Subject: {{$t->subject}}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ticket request type</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>User role</th>
                                        <th>Admin in charge</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="clickable-row" data-href="/tickets/{{ $t->id }}" >
                                            <td>{{ $t->id }}</td>
                                            <td>{{ $t->ticket_request_type }}</td>
                                            <td>{{ $t->subject }}</td>
                                            <td>{{ $t->status->name }}</td>
                                            <td>{{ $t->user->name }}</td>
                                            <td>{{ $t->officer->name }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


@endsection

@section('additional_scripts')

@endsection
