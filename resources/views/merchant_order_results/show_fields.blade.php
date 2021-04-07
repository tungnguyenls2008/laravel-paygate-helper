<!-- Input Field -->
<div class="col-sm-12">
    {!! Form::label('input', 'Input:') !!}
    <p>{{ $merchantOrderResult->input }}</p>
</div>

<!-- Result Code Field -->
<div class="col-sm-12">
    {!! Form::label('result_code', 'Result Code:') !!}
    <p>{{ $merchantOrderResult->result_code }}</p>
</div>

<!-- Checkout Url Field -->
<div class="col-sm-12">
    {!! Form::label('checkout_url', 'Checkout Url:') !!}
    <p>{{ $merchantOrderResult->checkout_url }}</p>
</div>

<!-- Token Code Field -->
<div class="col-sm-12">
    {!! Form::label('token_code', 'Token Code:') !!}
    <p>{{ $merchantOrderResult->token_code }}</p>
</div>

<!-- Result Message Field -->
<div class="col-sm-12">
    {!! Form::label('result_message', 'Result Message:') !!}
    <p>{{ $merchantOrderResult->result_message }}</p>
</div>

