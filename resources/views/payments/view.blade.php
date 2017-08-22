<?php /** @var \App\Payment $payment */
$expense = $payment->expense()->first();
?>
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
            <td>{{ $payment['amount'] }}</td>
        </tr>
        <tr>
            <td>Related expense</td>
            <td>
                <a href="{{route('expenses.show', $expense->id)}}">{{$expense->name}}</a>
                {{--@include('expenses.view', ['expense' => $payment->expense()->first()])--}}
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>@include('payments.partials.badge')</td>
        </tr>
        @if($payment['assent_modified_at'])
            <tr>
                <td>Moderated at</td>
                <td>@include('payments.partials.moderated_at')</td>
            </tr>
        @endif
        <tr>
            <td>Created at</td>
            <td>@include('partials.datediff', ['date' => $payment['created_at']])</td>
        </tr>
        <tr>
            <td>Updated at</td>
            <td>@include('partials.datediff', ['date' => $payment['updated_at']])</td>
        </tr>
        </tbody>
    </table>

@endsection
