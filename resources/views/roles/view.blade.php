<?php /** @var Spatie\Permission\Models\Role $role */ ?>
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
                    <td>{{ $role['id'] }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $role['name'] }}</td>
                </tr>
                <tr>
                    <td>Guard</td>
                    <td>{{ $role['guard_name'] }}</td>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td>Created at</td>
                    <td>@include('partials.datediff', ['date' => $role['created_at']])</td>
                </tr>
                <tr>
                    <td>Updated at</td>
                    <td>@include('partials.datediff', ['date' => $role['updated_at']])</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            {{-- info about role's payments and expenses --}}
            @include('roles.partials.permissions', ['permissions' => $role->permissions])
        </div>
    </div>

    <div class="btn-group btn-group-sm">
        <a class="btn btn-secondary" href="{{route('users.index')}}">
            <i class="fa fa-chevron-left"></i>
            Back
        </a>
    </div>
@endsection
