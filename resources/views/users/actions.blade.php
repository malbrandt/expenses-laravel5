<?php /** @var \App\User $user */ ?>
{!! Form::open(['route' => ['users.destroy', $id], 'method' => 'delete']) !!}
<div class="btn-group btn-group-sm">
    {{-- Show user details --}}
    <a href="{{ route('users.show', $id) }}" class='btn btn-info btn-sm' role="button" tooltip="Show user details">
        <i class="fa fa-info-circle"></i>
    </a>

    {{-- Show user's expenses --}}
    <a href="{{ url('expenses/user/' . $id) }}" class='btn btn-info btn-sm' role="button" tooltip="Show expenses">
        <i class="fa fa-list"></i>
    </a>

    {{-- Manage details and roles --}}
    <a href="{{ route('users.edit', $id) }}" class='btn btn-info btn-sm' role="button"
       tooltip="Manage details and roles">
        <i class="fa fa-pencil-square-o"></i>
    </a>

    {{-- Show user's payments --}}
    <div class="btn-group">
        <a href="{{ url('payments/user/' . $id) }}" class='btn btn-info btn-sm' role="button" tooltip="Show all payments">
            <i class="fa fa-money"></i>
        </a>
        <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu">
            <a href="{{route('payments.user.status', [$user['id'], 'pending'])}}" class="dropdown-item">
                <i class="fa fa-clock-o"></i> Pending payments
            </a>
            <a href="{{route('payments.user.status', [$user['id'], 'accepted'])}}" class="dropdown-item">
                <i class="fa fa-thumbs-up"></i> Accepted payments
            </a>
            <a href="{{route('payments.user.status', [$user['id'], 'rejected'])}}" class="dropdown-item">
                <i class="fa fa-thumbs-down"></i> Rejected payments
            </a>
        </div>
    </div>

    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'role' => 'button',
        'onclick' => "return confirm('Are you sure?')",
        'tooltip' => 'Remove this user'
    ]) !!}
    {!! Form::close() !!}</div>

@include('partials.tooltips-js')