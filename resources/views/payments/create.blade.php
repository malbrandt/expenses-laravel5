@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Adding payment
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        {{--// TODO: errors--}}
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => ['store-payment', $expense->id], 'method' => 'POST']) !!}

                    @include('payments.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
