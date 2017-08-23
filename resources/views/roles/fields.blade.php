<!-- Name Field -->
<div class="row"><div class="col-md-3">
        <div class="form-group col-sm-12">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Guard name Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('guard_name', 'Guard name:') !!}
            {!! Form::text('guard_name', 'web', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group col-md-9">

        {{-- Permissions --}}

        <div class="form-group col-lg-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Role's Permissions</h4>
                    <div class="form-group">
                        @include('roles.partials.permission-checkboxes')
                    </div>
                </div>
            </div>
        </div>
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
