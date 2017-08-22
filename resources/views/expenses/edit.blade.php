@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Expenses
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        {{-- TODO: make errors template --}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($expenses, ['route' => ['expenses.update', $expenses->id], 'method' => 'patch']) !!}

                    @include('expenses.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection