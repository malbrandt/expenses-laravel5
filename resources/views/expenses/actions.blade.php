<?php /** @var \App\Expense $expense */ ?>
{!! Form::open(['route' => ['expenses.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group '>
    <a href="{{ route('add-payment', $id) }}" class='btn btn-success btn-sm' role="button" tooltip="Add payment">
        <i class="fa fa-money"></i>
    </a>
    <a href="{{ route('expenses.show', $id) }}" class='btn btn-info btn-sm' role="button" tooltip="Show details and payments">
        <i class="fa fa-info-circle"></i>
    </a>
    <a href="{{ route('expenses.edit', $id) }}" class='btn btn-warning btn-sm' role="button" tooltip="Edit this expense details">
        <i class="fa fa-pencil-square-o"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'role' => 'button',
        'onclick' => "return confirm('Are you sure?')",
        'tooltip' => 'Remove this expense'
    ]) !!}
</div>
{!! Form::close() !!}

@include('partials.tooltips-js')