<?php /** @var \App\Expense $expense */ ?>
{!! Form::open(['route' => ['expenses.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group '>
    <a href="{{ route('expenses.show', $id) }}" class='btn btn-success btn-sm' role="button">
        <i class="fa fa-money"></i>
    </a>
    <a href="{{ route('expenses.edit', $id) }}" class='btn btn-warning btn-sm' role="button">
        <i class="fa fa-pencil-square-o"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'role' => 'button',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
