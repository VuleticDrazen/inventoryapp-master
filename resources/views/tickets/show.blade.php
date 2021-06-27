@extends('layouts.main')

@section('page_title', 'Ticket details')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-laptop-code mr-1"></i>
                       Ticket details
                    </h3>


                </div><!-- /.card-header -->

                <div class="card-body table-responsive">

                    <div class="row">
                        <div class="col-5 table-responsive">
                            <table class="table table-striped table-sm">
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $ticket->id }}</td>
                                </tr>
                                <tr>
                                    <td>Subject:</td>
                                    <td>{{ $ticket->subject }}</td>
                                </tr>
                                <tr>
                                    <td>Ticket type:</td>
                                    @if($ticket->ticket_type == '1')
                                        <td>New equipment</td>
                                    @else
                                        <td>Repair equipment</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Ticket request type:</td>
                                    @if($ticket->ticket_request_type == '1')
                                        <td>Equipment request</td>
                                    @else
                                        <td>Office supplies request</td>
                                    @endif
                                </tr>

                                <tr>
                                    <td>Ticket description:</td>
                                    <td>{{ $ticket->description }}</td>
                                </tr>
                                <tr>
                                    <td>Quantity:</td>
                                    <td>{{ $ticket->quantity }}</td>
                                </tr>
                                <tr>
                                    <td>User id:</td>
                                    <td>{{ $ticket->user_id }}</td>
                                </tr>
                                <tr>
                                    <td>Created at:</td>
                                    <td>{{ $ticket->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Ticket status:</td>
                                    <td>{{ $ticket->status->name}}</td>
                                </tr>
                            </table>
                        </div>

                    </div>

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>


@endsection
@section('additional_scripts')

@endsection()
