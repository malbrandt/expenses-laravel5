<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i>
        Users
    </div>
    <div class="card-body">
        <div class="table-responsive table-hover table-striped">
            <table class="table table-bordered dataTable" width="100%" id="dtTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Roles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>
                            @include('partials.datediff', ['date'=>$user['created_at']])
                        </td>
                        <td>
                            @include('partials.datediff', ['date'=>$user['created_at']])
                        </td>
                        <td>
                            {{-- display user roles --}}
                            <ul class="list-inline">
                                @foreach ($user->roles->toArray() as $role)
                                    <li class="list-inline-item">{{ $role['name'] }}</li>                                
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                @include('users.actions', ['id' => $user['id']])
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">
        Users
    </div>
</div>
@section('scripts')
<script type="text/javascript">
$(document).ready(function () {
$('#dtTable').dataTable({
//                "ordering": true,
//                "order": [[2, "desc"]]
});
});
</script>
@endsection