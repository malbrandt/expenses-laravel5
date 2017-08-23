<!-- Name Field -->
<div class="row">
    <div class="col-lg-6">
        <div class="form-group col-sm-12">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Email Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::textarea('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <!-- Password Field -->
        <div class="form-group col-lg-12">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::text('password', null, ['class' => 'form-control']) !!}
        </div>

        {{-- TODO: Roles checkboxes --}}
        <div class="form-group col-lg-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">User roles</h4>

                    <div class="form-group">
                        @foreach($roles as $role)
                            <div class="form-check">
                                <label class="form-check-label">
                                    {!! Form::checkbox('roles', $role['id'], $user->hasRole($role['name']),  ['id' => 'roles', 'class' => 'form-check-input']) !!}
                                    {{$role['name']}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
