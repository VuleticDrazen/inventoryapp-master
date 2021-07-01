@extends('layouts.main')

@section('page_title', 'Add New Ticket')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus mr-1"></i>
                        New Ticket
                    </h3>

                </div><!-- /.card-header -->

                <div class="card-body table-responsive">

                    <form action="/tickets" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="ticket_type_select">Ticket type:</label>
                                <select name="ticket_type" id="ticket_type_select" class="form-control @error('ticket_type') is-invalid @endif">
                                    <option value="" selected>- select a ticket type -</option>
                                    <option value="1">New equipment or office suplies</option>
                                    <option value="2">Repair equipment</option>
                                </select>
                                @error('ticket_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label for="ticket_request_type_select">Ticket request type:</label>
                                <select name="ticket_request_type" id="ticket_request_type_select" class="form-control @error('ticket_request_type') is-invalid @endif" onchange="fillOfficers()">
                                    <option value="" selected>- select a ticket type -</option>
                                    <option value="1">Equipment request</option>
                                    <option value="2">Office supplies request</option>
                                </select>
                                @error('ticket_request_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="officer_id_select">Officer:</label>
                            <select name="officer_id" id="officer_id_select" class="form-control @error('officer_id') is-invalid @endif">
                               {{-- AJAX --}}
                            </select>
                            @error('officer_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <label for="catogory_select">Equipment category:</label>
                                <select name="equipment_category_id" id="catogory_select" class="form-control @error('equipment_category_id') is-invalid @endif">
                                    <option value="">- select a category -</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error(' equipment_category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                            <div class="col-6">
                                <label for="subject_input">Subject:</label>
                                <input type="text" name="subject" class="form-control @error('subject') is-invalid @endif" placeholder="Enter ticket subject" id="subject_input">
                                @error('subject')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="quantity_input">Quantity:</label>
                                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @endif" placeholder="Enter quantity" id="quantity_input">
                                @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="description_input">Description:</label>
                                <input type="text" name="description" class="form-control @error('description') is-invalid @endif" placeholder="Description" id="description_input">
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit"  class="btn btn-primary btn-block btn-flat mt-4" onclick="confirmTicketAdd(event)" id="add_ticket">
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
    <script src="{{ asset('js/tickets/create.js') }}"></script>

@endsection
