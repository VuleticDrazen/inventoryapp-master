@extends('layouts.main')

@section('page_title', 'Add New Position')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus mr-1"></i>
                        New Position
                    </h3>

                </div><!-- /.card-header -->

                <div class="card-body table-responsive">

                    <form action="/positions" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <label for="name_input">Position name:</label>
                                <input type="text" name="name" class="form-control  @error('name') is-invalid @endif " placeholder="Enter position name" id="name_input">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="department_select">Department:</label>
                                <select name="department_id" id="department_select" class="form-control @error('department_id') is-invalid @endif">

                                </select>
                                @error('department_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-4 mt-2">
                                <button type="submit" id="add_position" class="btn btn-primary btn-block btn-flat mt-4" onclick="confirmPositionAdd(event)">
                                    SAVE POSITION
                                </button>
                            </div>
                        <div>
                    </form>

                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection
@section('additional_scripts')
    <script src="{{ asset('js/positions/create.js') }}"></script>
    <script>
        $(document).ready(() => {
            fillDepartments();
        });
    </script>
@endsection
