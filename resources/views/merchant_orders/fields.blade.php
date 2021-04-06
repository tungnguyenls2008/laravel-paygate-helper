<?php
$faker = Faker\Factory::create();

?>

<!-- Merchant Site Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merchant_site_code', 'Merchant Site Code:') !!}
    {!! Form::text('merchant_site_code', 26, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10,'maxlength' => 10]) !!}
</div>

<!-- Merchant Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merchant_key', 'Merchant Key:') !!}
    {!! Form::text('merchant_key', 123456, ['class' => 'form-control','maxlength' => 32,'maxlength' => 32,'maxlength' => 32]) !!}
</div>

<!-- Order Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_code', 'Order Code:') !!}
    {!! Form::text('order_code', uniqid(), ['class' => 'form-control','maxlength' => 32,'maxlength' => 32,'maxlength' => 32]) !!}
</div>

<!-- Method Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('method_code', 'Method Code:') !!}
    {!! Form::text('method_code', '', ['class' => 'form-control','maxlength' => 10,'maxlength' => 10,'maxlength' => 10,'placeholder'=>'usually 1-9, leave blank if checkout fails.']) !!}
</div>

<!-- Bank Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank_code', 'Bank Code:') !!}
    {!! Form::text('bank_code', '', ['class' => 'form-control','maxlength' => 10,'maxlength' => 10,'maxlength' => 10,'placeholder'=>'usually 4 digits, leave blank if checkout fails.']) !!}
</div>

<!-- Order Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_description', 'Order Description:') !!}
    {!! Form::text('order_description', $faker->realText(48), ['class' => 'form-control','maxlength' => 240,'maxlength' => 240,'maxlength' => 240]) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', rand(1,999)*100000, ['class' => 'form-control']) !!}
</div>

<!-- Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency', 'Currency:') !!}
    {!! Form::text('currency', 'VND', ['class' => 'form-control','maxlength' => 8,'maxlength' => 8,'maxlength' => 8]) !!}
</div>

<!-- Language Field -->
<div class="form-group col-sm-6">
    {!! Form::label('language', 'Language:') !!}
    {!! Form::text('language', 'Vietnamese', ['class' => 'form-control','maxlength' => 24,'maxlength' => 24,'maxlength' => 24]) !!}
</div>

<!-- Buyer Fullname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('buyer_fullname', 'Buyer Fullname:') !!}
    {!! Form::text('buyer_fullname', $faker->name, ['class' => 'form-control','maxlength' => 64,'maxlength' => 64,'maxlength' => 64]) !!}
</div>

<!-- Buyer Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('buyer_email', 'Buyer Email:') !!}
    {!! Form::text('buyer_email', $faker->safeEmail, ['class' => 'form-control','maxlength' => 64,'maxlength' => 64,'maxlength' => 64]) !!}
</div>

<!-- Buyer Mobile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('buyer_mobile', 'Buyer Mobile:') !!}
    {!! Form::text('buyer_mobile', '0987654321', ['class' => 'form-control','maxlength' => 16,'maxlength' => 16,'maxlength' => 16]) !!}
</div>

<!-- Buyer Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('buyer_address', 'Buyer Address:') !!}
    {!! Form::text('buyer_address', $faker->address, ['class' => 'form-control','maxlength' => 240,'maxlength' => 240,'maxlength' => 240]) !!}
</div>

<!-- Time Limit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_limit', 'Time Limit:') !!}
    <input type="text" name="time_limit" id="time_limit" class="form-control" value="0">
</div>

<!-- Return Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('return_url', 'Return Url:') !!}
    {!! Form::text('return_url', 'http://localhost:8000/merchant-order/success', ['class' => 'form-control','maxlength' => 512,'maxlength' => 512,'maxlength' => 512]) !!}
</div>

<!-- Cancel Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cancel_url', 'Cancel Url:') !!}
    {!! Form::text('cancel_url', 'http://localhost:8000/merchant-order/cancel', ['class' => 'form-control','maxlength' => 512,'maxlength' => 512,'maxlength' => 512]) !!}
</div>

<!-- Notify Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notify_url', 'Notify Url:') !!}
    {!! Form::text('notify_url', 'http://localhost:8000/merchant-order/notify', ['class' => 'form-control','maxlength' => 512,'maxlength' => 512,'maxlength' => 512]) !!}
</div>
