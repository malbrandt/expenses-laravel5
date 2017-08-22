<?php /** @var \App\Expense $expense */ ?>
@extends('layouts.app')

@section('content')
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Amount</td>
            <td>{{ $expense['amount'] }}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{ $expense['name'] }}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>{{ $expense['description'] }}</td>
        </tr>
        <tr>
            <td>Created at</td>
            <td>
                {{ $expense['created_at'] }}
                <span class="text-muted">({{ $expense['created_at']->diffForHumans() }})</span>
            </td>
        </tr>
        <tr>
            <td>Updated at</td>
            <td>
                {{ $expense['updated_at'] }}
                <span class="text-muted">({{ $expense['updated_at']->diffForHumans() }})</span>
            </td>
        </tr>
        </tbody>
    </table>

    @if(!empty($payments))
        @include('payments.table', ['payments' => $expense->payments])
    @endif

    <a class="btn btn-secondary" href="{{route('expenses.index')}}">
        <i class="fa fa-chevron-left"></i>
        Back
    </a>
    <a class="btn btn-success" href="{{route('add-payment', $expense->id)}}">
        <i class="fa fa-money"></i>
        Add Payment
    </a>
@endsection
