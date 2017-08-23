@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Users
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        {{-- TODO: make errors template --}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

                    @include('users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @include('users.actions', ['id' => $user['id']])
@endsection