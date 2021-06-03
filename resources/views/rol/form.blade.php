<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('role') }}
            {{ Form::text('role', $rol->role, ['class' => 'form-control' . ($errors->has('role') ? ' is-invalid' : ''), 'placeholder' => 'Role']) }}
            {!! $errors->first('role', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descriptionRole') }}
            {{ Form::text('descriptionRole', $rol->descriptionRole, ['class' => 'form-control' . ($errors->has('descriptionRole') ? ' is-invalid' : ''), 'placeholder' => 'Descriptionrole']) }}
            {!! $errors->first('descriptionRole', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>