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
                                <tr>
                                    <td>Costs:</td>
                                    <td>{{ $ticket->costs}}</td>
                                </tr>
                                <tr>
                                    <td>Expected delivery date:</td>
                                    <td>{{ $ticket->expected_delivery_date}}</td>
                                </tr>
                                <tr>
                                    <td>Admin comment:</td>
                                    <td>{{ $ticket->admin_comment}}</td>
                                </tr>
                                <tr>
                                    <td>Delivered at:</td>
                                    <td>{{ $ticket->delivered_at}}</td>
                                </tr>
                            </table>
                        </div>

                        @if(\Illuminate\Support\Facades\Auth::user()->id == $ticket->officer_id && $ticket->status_id == 1)
                        <div class="col-7">
                            <form action="/tickets/{{$ticket->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <label for="expected_delivery_date"> Expected delivery date</label>
                                        <input class="form-control" type="date" id="expected_delivery_date" name="expected_delivery_date">
                                    </div>
                                    <div class="col-6">
                                        <label for="costs"> Costs</label>
                                        <input class="form-control" type="double" id="costs" name="costs">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="Admin comment">Admin comment</label>
                                        <input class="form-control" type="text" id="admin_comment" name="admin_comment">
                                    </div>
                                    <div class="col-6">
                                        <label for="status_id">Odobri/Odbij</label>
                                        <select class="form-control"   name="status_id" id="status_id">
                                            <option value="1">Odbij tiket</option>
                                            <option value="2">Odobri tiket</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button id="approve_button" style="width: 160px; margin-left: 260px" class="btn btn-sm btn-flat btn-primary mt-4" @if($ticket->status_id == 2 || $ticket->status_id == 3) disabled @endif>Odobri</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->id == $ticket->officer_id && $ticket->status_id == 3 && $ticket->delivered_at == null)
                            <div class="col-7">
                                <form action="/tickets/{{$ticket->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-6">
                                        <label for="delivery_date"> Delivered at</label>
                                        <input class="form-control" type="date" id="delivered_at" name="delivered_at">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button id="approve_button" style="width: 160px; margin-left: 80px" class="btn btn-sm btn-flat btn-primary mt-4" >Zatvori tiket</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 5 && $ticket->status_id == 2)
                            <div class="col-6">
                                <form action="/tickets/{{$ticket->id}}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="col-6">
                                        <label for="status_id">Odobri/Odbij</label>
                                        <select class="form-control"   name="status_id" id="status_id">
                                            <option value="1">Odbij tiket</option>
                                            <option value="3">Odobri tiket</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button id="approve_button" style="width: 160px; margin-left: 80px" class="btn btn-sm btn-flat btn-primary mt-4" >Zatvori tiket</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        @endif
                    </div>

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>


@endsection
@section('additional_scripts')

@endsection()
