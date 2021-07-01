@extends('layouts.main')

@section('page_title', 'Add New Department')

@section('content')

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus mr-1"></i>
                        New Department
                    </h3>

                </div><!-- /.card-header -->

                <div class="card-body table-responsive">

                    <form action="/departments" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="name_input">Department name:</label>
                                <input type="text" name="name" class="form-control  @error('name') is-invalid @endif " placeholder="Enter department name" id="name_input">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6 mt-2" >
                                <button type="submit" id="add_department" class="btn btn-primary btn-block btn-flat mt-4" onclick="confirmDepartmentAdd(event)">
                                    SAVE DEPARTMENT
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
    <script src="{{ asset('js/departments/create.js') }}"></script>
@endsection
