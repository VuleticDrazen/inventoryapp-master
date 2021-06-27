@extends('layouts.main')
@section('page_title', 'UserDashboard')

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
                        Users equipment by documents
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">

                    @foreach($documents as $document)
                        <div class="card card-default collapsed-card mt-3">
                            <div class="card-header">
                                <h3 class="card-title"> Dokument {{$document->id}} : {{ $document->created_at }}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Department</th>
                                        <th>Name</th>
                                        <th>Description</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($document->items as $e)
                                        @if($e->return_date == null)
                                        <tr>

                                            <td>{{ $e->equipment_id }}</td>
                                            <td>{{ $e->equipment->equipment_category_id }}</td>
                                            <td>{{ $e->equipment->name }}</td>
                                            <td>{{ $e->equipment->description }}</td>

                                        </tr>
                                        @endif
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

@endsection

@section('additional_scripts')

@endsection

