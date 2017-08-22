<div class="btn-group btn-group-sm">
	{{-- Approve --}}
	{!! Form::open(['route' => ['moderate-payment', $payment->id], 'method' => 'post'] ) !!}
	{!! Form::hidden('moderate', 'approve') !!}
    {!! Form::button('<i class="fa fa-thumbs-o-up"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-success btn-sm',
        'role' => 'button',
        'tooltip' => 'Confirm this payment'
    ]) !!}
    {!! Form::close() !!}

	{{-- Reject --}}
	{!! Form::open(['route' => ['moderate-payment', $payment->id], 'method' => 'post'] ) !!}
	{!! Form::hidden('moderate', 'reject') !!}
    {!! Form::button('<i class="fa fa-thumbs-o-down"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'role' => 'button',
        'tooltip' => 'Reject this payment'
    ]) !!}
    {!! Form::close() !!}
</div>