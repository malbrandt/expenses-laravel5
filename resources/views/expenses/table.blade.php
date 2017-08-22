<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Expenses
    </div>
    <div class="card-body">
        <div class="table-responsive table-hover table-striped">
            <table class="table table-bordered" width="100%" id="dtTable" cellspacing="0">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Updated at</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Updated at</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($expenses as $expense)
                    <tr>
                        <td>{{ $expense['name'] }}</td>
                        <td>{{ $expense['amount'] }}</td>
                        <td>
                            <span class="table-span-text">{{ $expense['updated_at'] }}</span>
                            <span class="table-span-date">{{ $expense['updated_at']->diffForHumans(Carbon\Carbon::now()) }}</span>
                        </td>
                        <td>{{ $expense['description'] }}</td>
                        <td>
                            <span class="table-span-text">{{ $expense['created_at'] }}</span>
                            <span class="table-span-date">{{ $expense['created_at']->diffForHumans(Carbon\Carbon::now()) }}</span>
                        </td>
                        <td>
                            {{-- Actions --}}
                            @include('expenses.actions', ['id' => $expense['id']])
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">
        Expenses
    </div>
</div>

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dtTable').dataTable({
                "ordering": true,
                "order": [[2, "desc"]]
            });
        });
    </script>
@endsection
