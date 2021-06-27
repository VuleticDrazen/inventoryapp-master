@extends('layouts.main')

@section('page_title', 'Add New Ticket')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus mr-1"></i>
                        Edit Ticket
                    </h3>

                </div><!-- /.card-header -->

                <div class="card-body table-responsive">

                    <form action="/tickets/{{$ticket->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row" style="margin: 5pt">
                            <div class="col-6" >
                                <label for="status_id_select">Ticket status</label>
                                <select name="status_id" id="status_id_select" class="form-control"></select>
                            </div>
                            <div class="col-6">
                                <label for="expected_delivery_date_input">Expect. delivery date</label>
                                <input type="date" value="{{ strftime('%Y-%m-%d',strtotime($ticket->expected_delivery_date)) }}" name="expected_delivery_date" class="form-control" id="expected_delivery_date_input" @error('expected_delivery_date') is-invalid @endif>
                                @error('position_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row" style="margin: 5pt">
                            <div class="col-6">
                                <label for="costs_input">Costs</label>
                                <input type="number" name="costs" class="form-control" id="costs_input" value="{{$ticket->costs}}" @error('costs') is-invalid @endif>
                                @error('costs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="admin_comment_input">Admin comment</label>
                                <input type="text" name="admin_comment" class="form-control" id="admin_comment_input" value="{{$ticket->admin_comment}}">
                            </div>
                        </div>
                        <div class="row" style="margin: 5pt">
                            @if(($role == 2 || $role == 3) && $ticket->status_id!=1)
                                <div class="col-6">
                                    <label for="deliveried_at">Equipment deliveried at</label>
                                    <input type="date" name="deliveried_at" class="form-control" id="deliveried_at">
                                </div>
                            @endif
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block mt-lg-4" id="edit_ticket_"{{ $ticket->id }} onclick="confirmTicketEdit({{ $ticket->id }}, event)">
                                    SAVE TICKET DETAILS
                                </button>
                            </div>
                        </div>
                    </form>

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection
@section('additional_scripts')
    <script src="{{ asset('js/tickets/edit.js') }}"></script>
    <script>
        $(document).ready(() => {
            fillStatuses({{ $ticket->status_id}});
        });
    </script>
@endsection
