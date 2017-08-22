@extends('layouts.app')

@section('content')
    <div class="content">
        <section class="content-header">
            <h1 class="pull-left">Payments</h1>
            <h1 class="pull-right">
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('payments.create') !!}">Add New</a>
            </h1>
        </section>
        <div class="clearfix"></div>

        {{--@include('flash::message')--}}
        {{--TODO: Flash message--}}

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('payments.table')
            </div>
        </div>
    </div>
@endsection