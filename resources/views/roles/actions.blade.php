<?php /** @var \Spatie\Permission\Models\Role $role */ ?>
{{--{!! Form::open(['route' => ['roles.destroy', $id], 'method' => 'delete']) !!}--}}
<div class="btn-group btn-group-sm">

    {{-- Show role details --}}
    <a href="{{ route('roles.show', $role->id) }}" class='btn btn-info btn-sm' role="button" tooltip="Show role details (permissions)">
        <i class="fa fa-info-circle"></i>
    </a>

    {{-- Edit role {{ route('roles.edit' . $id) }} --}}
    <a href="#" class='btn btn-info btn-sm disabled' role="button" tooltip="Edit role">
        <i class="fa fa-pencil-square-o"></i>
    </a>

    {{-- Manage details and roles --}}
    {{--<a href="{{ route('users.edit', $id) }}" class='btn btn-info btn-sm' role="button"--}}
       {{--tooltip="Manage details and roles">--}}
        {{--<i class="fa fa-pencil-square-o"></i>--}}
    {{--</a>--}}

    {{-- Show user's with role --}}


    {{--{!! Form::button('<i class="fa fa-trash"></i>', [--}}
        {{--'type' => 'submit',--}}
        {{--'class' => 'btn btn-danger btn-sm',--}}
        {{--'role' => 'button',--}}
        {{--'onclick' => "return confirm('Are you sure?')",--}}
        {{--'tooltip' => 'Remove this user'--}}
    {{--]) !!}--}}
    {{--{!! Form::close() !!}</div>--}}

@include('partials.tooltips-js')