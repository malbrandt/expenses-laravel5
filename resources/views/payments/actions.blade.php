<?php
/** @var \App\Payment $payment */
$id = $payment['id'];
$isAdmin = Auth::user()->hasRole('admin');
?>
@if(!$moderated || $isAdmin)
{!! Form::open(['route' => ['payments.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group btn-group-sm'>
@endif
    {{-- Show details --}}
    <a href="{{ route('payments.show', $id) }}" class='btn btn-info btn-sm' role="button" tooltip="Show payment details">
        <i class="fa fa-info-circle"></i>
    </a>

    {{-- Edit button --}}
    @if(!$moderated || $isAdmin)
        <a href="{{ route('payments.edit', $id) }}" class='btn btn-primary btn-sm' role="button" tooltip="Edit payment details">
            <i class="fa fa-pencil-square-o"></i>
        </a>
    @endif

    {{-- Remove button --}}
    @if(!$moderated || $isAdmin)
        {!! Form::button('<i class="fa fa-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-sm',
            'role' => 'button',
            'tooltip' => 'Remove this payment',
            'onclick' => "return confirm('Are you sure?')"
        ]) !!}
    @endif

</div>

@if(!$moderated || $isAdmin)
{!! Form::close() !!}
@endif

@include('partials.tooltips-js')