<?php /** @var array $permissions */ ?>
<table class="table table-responsive table-sm table-striped table-hover">
    <thead>
    <tr>
        <th>Name</th>
        <th>Guard name</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($permissions as $permission)
        <tr>
            <td>{{$permission['name']}}</td>
            <td>{{$permission['guard_name']}}</td>
        </tr>
    @endforeach
    </tbody>
</table>