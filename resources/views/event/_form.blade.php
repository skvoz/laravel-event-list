<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label("name","Name",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("name",null,["class"=>"form-control required"]) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label("description","Description",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("description",null,["class"=>"form-control required"]) !!}
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group">
    <div class="col-md-8 col-md-offset-4">

        {!! Form::button("Save",["type" => "submit","class"=>"btn
                       btn-primary"])!!}

    </div>
</div>
