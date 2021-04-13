<!-- Merchant Site Code Field -->
<div class="col-sm-12">
    {!! Form::label('merchant_site_code', 'Merchant Site Code:') !!}
    <p>{{ $merchantOrder->merchant_site_code }}</p>
</div>

<!-- Merchant Key Field -->
<div class="col-sm-12">
    {!! Form::label('merchant_key', 'Merchant Key:') !!}
    <p>{{ $merchantOrder->merchant_key }}</p>
</div>

<!-- Order Code Field -->
<div class="col-sm-12">
    {!! Form::label('order_code', 'Order Code:') !!}
    <p>{{ $merchantOrder->order_code }}</p>
</div>

<!-- Method Code Field -->
<div class="col-sm-12">
    {!! Form::label('method_code', 'Method Code:') !!}
    <p>{{ $merchantOrder->method_code }}</p>
</div>

<!-- Bank Code Field -->
<div class="col-sm-12">
    {!! Form::label('bank_code', 'Bank Code:') !!}
    <p>{{ $merchantOrder->bank_code }}</p>
</div>

<!-- Order Description Field -->
<div class="col-sm-12">
    {!! Form::label('order_description', 'Order Description:') !!}
    <p>{{ $merchantOrder->order_description }}</p>
</div>

<!-- Amount Field -->
<div class="col-sm-12">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $merchantOrder->amount }}</p>
</div>

<!-- Currency Field -->
<div class="col-sm-12">
    {!! Form::label('currency', 'Currency:') !!}
    <p>{{ $merchantOrder->currency }}</p>
</div>

<!-- Language Field -->
<div class="col-sm-12">
    {!! Form::label('language', 'Language:') !!}
    <p>{{ $merchantOrder->language }}</p>
</div>

<!-- Buyer Fullname Field -->
<div class="col-sm-12">
    {!! Form::label('buyer_fullname', 'Buyer Fullname:') !!}
    <p>{{ $merchantOrder->buyer_fullname }}</p>
</div>

<!-- Buyer Email Field -->
<div class="col-sm-12">
    {!! Form::label('buyer_email', 'Buyer Email:') !!}
    <p>{{ $merchantOrder->buyer_email }}</p>
</div>

<!-- Buyer Mobile Field -->
<div class="col-sm-12">
    {!! Form::label('buyer_mobile', 'Buyer Mobile:') !!}
    <p>{{ $merchantOrder->buyer_mobile }}</p>
</div>

<!-- Buyer Address Field -->
<div class="col-sm-12">
    {!! Form::label('buyer_address', 'Buyer Address:') !!}
    <p>{{ $merchantOrder->buyer_address }}</p>
</div>

<!-- Time Limit Field -->
<div class="col-sm-12">
    {!! Form::label('time_limit', 'Time Limit:') !!}
    <p>{{ $merchantOrder->time_limit }}</p>
</div>

<!-- Return Url Field -->
<div class="col-sm-12">
    {!! Form::label('return_url', 'Return Url:') !!}
    <p>{{ $merchantOrder->return_url }}</p>
</div>

<!-- Cancel Url Field -->
<div class="col-sm-12">
    {!! Form::label('cancel_url', 'Cancel Url:') !!}
    <p>{{ $merchantOrder->cancel_url }}</p>
</div>

<!-- Notify Url Field -->
<div class="col-sm-12">
    {!! Form::label('notify_url', 'Notify Url:') !!}
    <p>{{ $merchantOrder->notify_url }}</p>
</div>

