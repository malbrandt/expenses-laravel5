<ul class="list-inline">
    @foreach($permissions as $permission)
        @if(isset($role))
            {{ $checked = $role->hasPermissionTo($permission->name) }}
        @else
            {{ $checked = null }}
        @endif
        <li class="list-inline-item">
            <label class="form-check-label">
                {!! Form::checkbox('permissions[]', $permission->id, $checked,  ['id' => 'roles', 'class' => 'form-check-input']) !!}
                {{$permission->name}}
            </label>
        </li>
    @endforeach
</ul>
