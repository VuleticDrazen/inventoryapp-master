@extends('layouts.main')

@section('page_title', 'Equipment details')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-laptop-code mr-1"></i>
                        Equipment details
                    </h3>

                    <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#create_serial_number_modal">
                        Add Serial Number
                    </button>

                </div><!-- /.card-header -->

                <div class="card-body table-responsive">

                    <div class="row">
                        <div class="col-5 table-responsive">
                            <table class="table table-striped table-sm">
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $equipment->id }}</td>
                                </tr>
                                <tr>
                                    <td>Category:</td>
                                    <td>{{ $equipment->category->name }}</td>
                                </tr>
                                <tr>
                                    <td>Name:</td>
                                    <td>{{ $equipment->name }}</td>
                                </tr>
                                <tr>
                                    <td>Available quantity:</td>
                                    <td>{{ $equipment->available_quantity }}</td>
                                </tr>
                                <tr>
                                    <td>Description:</td>
                                    <td>{{ $equipment->description }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-7">
                            <table class="table table-hover table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Serial No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($serial_numbers as $key => $sn)
                                        <tr style="@if($sn->is_used) text-decoration: line-through; @endif" >
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $sn->serial_number }}</td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td class="w-25 align-middle">{{ count($serial_numbers) + 1 }}</td>
                                            <form action="{{ route('serial_numbers.store', $equipment->id) }}" method="POST">
                                                @csrf
                                                <td>
                                                    <div class="d-flex">
                                                        <input type="text" id="serial_number" name="serial_number" class="form-control form-control-sm w-50 rounded-0  @error('serial_number') is-invalid @enderror" oninput="handleChange()" placeholder="Serial Number">
                                                    </div>

                                                   @error('serial_number')
                                                   <span class="text-danger text-sm d-inline">
                                                          {{ $message }}
                                                      </span>
                                                  @enderror
                                              </td>
                                              <td><button id="serial_number_button" class="btn btn-sm btn-flat btn-primary ml-2" disabled>Add</button></td>
                                        </form>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>


    @include('equipment.create_serial_num')
@endsection
@section('additional_scripts')
    <script>
        const serialNumber = $('#serial_number');
        const serialNumberButton = $('#serial_number_button');

        function handleChange() {
            if ( ! serialNumber.val()) {
                serialNumberButton.attr('disabled', true);
            } else {
            serialNumberButton.attr('disabled', false);
            }
        }


        $('#create_serial_num').on('show.bs.modal', function(e) {
            let modal = $(this),
            equipmentId = {{ $equipment->id }};
            modal.find("#create_serial_number_form").attr("action", `/equipment/${equipmentId}/serial-numbers`);
        });
    </script>
@endsection()
