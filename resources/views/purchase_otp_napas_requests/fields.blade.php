<?php
$faker = Faker\Factory::create();

?>

<!-- Transaction Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_id', 'Transaction Id:') !!}
    {!! Form::text('transaction_id', 'TXN_' . rand(10000, 99999), ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::text('order_id', 'ORD_' . rand(10000, 99999), ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Api Operation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('api_operation', 'Api Operation:') !!}
    {!! Form::text('api_operation', 'PURCHASE_OTP', ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Order Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_amount', 'Order Amount:') !!}
    {!! Form::number('order_amount', rand(1, 100) * 100000, ['class' => 'form-control']) !!}
</div>

<!-- Order Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_currency', 'Order Currency:') !!}
    {!! Form::text('order_currency', 'VND', ['class' => 'form-control','maxlength' => 5,'maxlength' => 5]) !!}
</div>

<!-- Order Reference Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_reference', 'Order Reference:') !!}
    {!! Form::text('order_reference', "CASHIN_ABCX", ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Fund Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fund_type', 'Fund Type:') !!}
    {!! Form::text('fund_type', 'CARD', ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Card Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('card_number', 'Card Number:') !!}
    {!! Form::text('card_number', "9704000000000018", ['class' => 'form-control','maxlength' => 24,'maxlength' => 24]) !!}
</div>

<!-- Issue Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('issue_date', 'Issue Date:') !!}
    {!! Form::text('issue_date', '0307', ['class' => 'form-control','maxlength' => 5,'maxlength' => 5]) !!}
</div>

<!-- Name On Card Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_on_card', 'Name On Card:') !!}
    {!! Form::text('name_on_card', 'NGUYEN VAN A', ['class' => 'form-control','maxlength' => 24,'maxlength' => 24]) !!}
</div>

<!-- Channel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('channel', 'Channel:') !!}
    {!! Form::text('channel', '6014', ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Client Ip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_ip', 'Client Ip:') !!}
    {!! Form::text('client_ip', $faker->ipv4, ['class' => 'form-control','maxlength' => 16,'maxlength' => 16]) !!}
</div>

<!-- Device Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('device_id', 'Device Id:') !!}
    {!! Form::text('device_id', '0123456789', ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Environment Field -->
<div class="form-group col-sm-6">
    {!! Form::label('environment', 'Environment:') !!}
    {!! Form::text('environment', 'WebApp', ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Card Scheme Field -->
<div class="form-group col-sm-6">
    {!! Form::label('card_scheme', 'Card Scheme:') !!}
    {!! Form::text('card_scheme', 'AtmCard', ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Enable 3D Secure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enable_3d_secure', 'Enable 3D Secure:') !!}
    {!! Form::text('enable_3d_secure', 'false', ['class' => 'form-control','maxlength' => 5,'maxlength' => 5]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('api_entry', 'API ENTRY:') !!}
    {!! Form::text('api_entry', 'https://gateway02-sandbox.nganluong.vn/naba/restful/api/request', ['class' => 'form-control']) !!}
</div>
