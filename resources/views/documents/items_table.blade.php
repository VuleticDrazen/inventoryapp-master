<div class="row mt-4">
    <div class="col-12 table-responsive">
        <h6 class="my-3">
            Document Items
            <button type="button"
                    class="btn btn-sm btn-flat btn-primary float-right"
                    data-toggle="modal"
                    data-target="#new_item_modal"
            >
                Add items
            </button>
        </h6>

        <table class="table table-sm table-hover table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Equipment</th>
                <th>Serial number</th>
                <th>Returned</th>
                <th>Returned date</th>
                <th>Return</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->equipment->full_name }}</td>
                    <td>{{ $item->serial_number }}</td>
                    <td>
                        @if($item->returned)
                            <i class="fa fa-check-circle"></i>
                        @else
                            <i class="fa fa-times-circle"></i>
                        @endif
                    </td>
                    <td>{{ $item->returned_date_formated }}</td>
                    <td>
                        @if(!$item->returned)
                            <form action="/document-item/return/{{ $item->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning btn-flat btn-sm">
                                    Return equipment
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
