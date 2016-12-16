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

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label("email","Email",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::text("email",null,["class"=>"form-control required"]) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label("password","Password",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::password("password",["class"=>"form-control required", "id"=>"password"]) !!}
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label("password-confirm","Password confirm",["class"=>"control-label col-md-3"]) !!}
    <div class="col-md-6">
        {!! Form::password("password_confirmation",["class"=>"form-control required", "id" => "password-confirm"]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        {!! Form::button("Save",["type" => "submit","class"=>"btn
                           btn-primary"])!!}
    </div>
</div>
