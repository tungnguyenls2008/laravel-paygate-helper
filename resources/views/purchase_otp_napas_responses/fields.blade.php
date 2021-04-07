<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Error Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('error_code', 'Error Code:') !!}
    {!! Form::text('error_code', null, ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Error Data Field -->
<div class="form-group col-sm-6">
    {!! Form::label('error_data', 'Error Data:') !!}
    {!! Form::text('error_data', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>

<!-- Order Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_amount', 'Order Amount:') !!}
    {!! Form::number('order_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_currency', 'Order Currency:') !!}
    {!! Form::text('order_currency', null, ['class' => 'form-control','maxlength' => 5,'maxlength' => 5]) !!}
</div>

<!-- Order Trans Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_trans_time', 'Order Trans Time:') !!}
    {!! Form::text('order_trans_time', null, ['class' => 'form-control','id'=>'order_trans_time']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#order_trans_time').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Order Trans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_trans_id', 'Order Trans Id:') !!}
    {!! Form::text('order_trans_id', null, ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Response Message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('response_message', 'Response Message:') !!}
    {!! Form::text('response_message', null, ['class' => 'form-control','maxlength' => 64,'maxlength' => 64]) !!}
</div>

<!-- Response Acquirer Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('response_acquirer_code', 'Response Acquirer Code:') !!}
    {!! Form::number('response_acquirer_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Response Trans Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('response_trans_status', 'Response Trans Status:') !!}
    {!! Form::text('response_trans_status', null, ['class' => 'form-control','maxlength' => 24,'maxlength' => 24]) !!}
</div>

<!-- Source Of Fund Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('source_of_fund_type', 'Source Of Fund Type:') !!}
    {!! Form::text('source_of_fund_type', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10]) !!}
</div>

<!-- Source Of Fund Provided Card Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('source_of_fund_provided_card_brand', 'Source Of Fund Provided Card Brand:') !!}
    {!! Form::text('source_of_fund_provided_card_brand', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10]) !!}
</div>

<!-- Source Of Fund Provided Card Scheme Field -->
<div class="form-group col-sm-6">
    {!! Form::label('source_of_fund_provided_card_scheme', 'Source Of Fund Provided Card Scheme:') !!}
    {!! Form::text('source_of_fund_provided_card_scheme', null, ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Source Of Fund Provided Card Name On Card Field -->
<div class="form-group col-sm-6">
    {!! Form::label('source_of_fund_provided_card_name_on_card', 'Source Of Fund Provided Card Name On Card:') !!}
    {!! Form::text('source_of_fund_provided_card_name_on_card', null, ['class' => 'form-control','maxlength' => 24,'maxlength' => 24]) !!}
</div>

<!-- Source Of Fund Provided Card Issue Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('source_of_fund_provided_card_issue_date', 'Source Of Fund Provided Card Issue Date:') !!}
    {!! Form::text('source_of_fund_provided_card_issue_date', null, ['class' => 'form-control','maxlength' => 5,'maxlength' => 5]) !!}
</div>

<!-- Source Of Fund Provided Card Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('source_of_fund_provided_card_number', 'Source Of Fund Provided Card Number:') !!}
    {!! Form::text('source_of_fund_provided_card_number', null, ['class' => 'form-control','maxlength' => 24,'maxlength' => 24]) !!}
</div>

<!-- Transaction Acquirer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_acquirer_id', 'Transaction Acquirer Id:') !!}
    {!! Form::text('transaction_acquirer_id', null, ['class' => 'form-control','maxlength' => 24,'maxlength' => 24]) !!}
</div>

<!-- Transaction Acquirer Napas Trans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_acquirer_napas_trans_id', 'Transaction Acquirer Napas Trans Id:') !!}
    {!! Form::text('transaction_acquirer_napas_trans_id', null, ['class' => 'form-control','maxlength' => 24,'maxlength' => 24]) !!}
</div>

<!-- Transaction Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_amount', 'Transaction Amount:') !!}
    {!! Form::number('transaction_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Transaction Currency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_currency', 'Transaction Currency:') !!}
    {!! Form::text('transaction_currency', null, ['class' => 'form-control','maxlength' => 5,'maxlength' => 5]) !!}
</div>

<!-- Transaction Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_type', 'Transaction Type:') !!}
    {!! Form::text('transaction_type', null, ['class' => 'form-control','maxlength' => 16,'maxlength' => 16]) !!}
</div>

<!-- Transaction Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaction_id', 'Transaction Id:') !!}
    {!! Form::text('transaction_id', null, ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Channel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('channel', 'Channel:') !!}
    {!! Form::text('channel', null, ['class' => 'form-control','maxlength' => 8,'maxlength' => 8]) !!}
</div>

<!-- Version Field -->
<div class="form-group col-sm-6">
    {!! Form::label('version', 'Version:') !!}
    {!! Form::text('version', null, ['class' => 'form-control','maxlength' => 4,'maxlength' => 4]) !!}
</div>

<!-- Data Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_key', 'Data Key:') !!}
    {!! Form::text('data_key', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>

<!-- Napas Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('napas_key', 'Napas Key:') !!}
    {!! Form::text('napas_key', null, ['class' => 'form-control','maxlength' => 1500,'maxlength' => 1500]) !!}
</div>

<!-- Api Operation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('api_operation', 'Api Operation:') !!}
    {!! Form::number('api_operation', null, ['class' => 'form-control']) !!}
</div>