<?php /** @var \App\User $user */ ?>
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            {{-- table with basic details --}}
            <table class="table">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Id</td>
                    <td>{{ $user['id'] }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $user['name'] }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user['email'] }}</td>
                </tr>
                <tr>
                    <td>Roles</td>
                    <td>
                        {{-- display user roles --}}
                        <ul class="list-inline">
                            @foreach ($user->roles->toArray() as $role)
                                <li class="list-inline-item">{{ $role['name'] }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>Created at</td>
                    <td>@include('partials.datediff', ['date' => $user['created_at']])</td>
                </tr>
                <tr>
                    <td>Updated at</td>
                    <td>@include('partials.datediff', ['date' => $user['updated_at']])</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            {{-- info about user's payments and expenses --}}
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Expenses</td>
                    <td>
                        <a href="{{url('expenses/user', $user['id'])}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-list"></i> Show
                            <span class="badge badge-default">{{ $user['counts']['expenses'] }}</span>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Payments</td>
                    <td>
                        @include('users.partials.badges-buttons')
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="btn-group btn-group-sm">
        <a class="btn btn-secondary" href="{{route('users.index')}}">
            <i class="fa fa-chevron-left"></i>
            Back
        </a>
        @include('users.actions', ['id' => $user['id']])
    </div>
@endsection
