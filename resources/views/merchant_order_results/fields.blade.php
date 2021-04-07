<!-- Input Field -->
<div class="form-group col-sm-6">
    {!! Form::label('input', 'Input:') !!}
    {!! Form::text('input', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500,'maxlength' => 500]) !!}
</div>

<!-- Result Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('result_code', 'Result Code:') !!}
    {!! Form::text('result_code', null, ['class' => 'form-control','maxlength' => 8,'maxlength' => 8,'maxlength' => 8]) !!}
</div>

<!-- Checkout Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('checkout_url', 'Checkout Url:') !!}
    {!! Form::text('checkout_url', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Token Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('token_code', 'Token Code:') !!}
    {!! Form::text('token_code', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Result Message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('result_message', 'Result Message:') !!}
    {!! Form::text('result_message', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50,'maxlength' => 50]) !!}
</div>