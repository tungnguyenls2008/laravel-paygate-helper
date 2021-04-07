<div class="table-responsive">
    <table class="table" id="purchaseOtpNapasResponses-table">
        <thead>
            <tr>
                <th>Status</th>
        <th>Error Code</th>
        <th>Error Data</th>
        <th>Order Amount</th>
        <th>Order Currency</th>
        <th>Order Trans Time</th>
        <th>Order Trans Id</th>
        <th>Response Message</th>
        <th>Response Acquirer Code</th>
        <th>Response Trans Status</th>
        <th>Source Of Fund Type</th>
        <th>Source Of Fund Provided Card Brand</th>
        <th>Source Of Fund Provided Card Scheme</th>
        <th>Source Of Fund Provided Card Name On Card</th>
        <th>Source Of Fund Provided Card Issue Date</th>
        <th>Source Of Fund Provided Card Number</th>
        <th>Transaction Acquirer Id</th>
        <th>Transaction Acquirer Napas Trans Id</th>
        <th>Transaction Amount</th>
        <th>Transaction Currency</th>
        <th>Transaction Type</th>
        <th>Transaction Id</th>
        <th>Channel</th>
        <th>Version</th>
        <th>Data Key</th>
        <th>Napas Key</th>
        <th>Api Operation</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($purchaseOtpNapasResponses as $purchaseOtpNapasResponse)
            <tr>
                <td>{{ $purchaseOtpNapasResponse->status }}</td>
            <td>{{ $purchaseOtpNapasResponse->error_code }}</td>
            <td>{{ $purchaseOtpNapasResponse->error_data }}</td>
            <td>{{ $purchaseOtpNapasResponse->order_amount }}</td>
            <td>{{ $purchaseOtpNapasResponse->order_currency }}</td>
            <td>{{ $purchaseOtpNapasResponse->order_trans_time }}</td>
            <td>{{ $purchaseOtpNapasResponse->order_trans_id }}</td>
            <td>{{ $purchaseOtpNapasResponse->response_message }}</td>
            <td>{{ $purchaseOtpNapasResponse->response_acquirer_code }}</td>
            <td>{{ $purchaseOtpNapasResponse->response_trans_status }}</td>
            <td>{{ $purchaseOtpNapasResponse->source_of_fund_type }}</td>
            <td>{{ $purchaseOtpNapasResponse->source_of_fund_provided_card_brand }}</td>
            <td>{{ $purchaseOtpNapasResponse->source_of_fund_provided_card_scheme }}</td>
            <td>{{ $purchaseOtpNapasResponse->source_of_fund_provided_card_name_on_card }}</td>
            <td>{{ $purchaseOtpNapasResponse->source_of_fund_provided_card_issue_date }}</td>
            <td>{{ $purchaseOtpNapasResponse->source_of_fund_provided_card_number }}</td>
            <td>{{ $purchaseOtpNapasResponse->transaction_acquirer_id }}</td>
            <td>{{ $purchaseOtpNapasResponse->transaction_acquirer_napas_trans_id }}</td>
            <td>{{ $purchaseOtpNapasResponse->transaction_amount }}</td>
            <td>{{ $purchaseOtpNapasResponse->transaction_currency }}</td>
            <td>{{ $purchaseOtpNapasResponse->transaction_type }}</td>
            <td>{{ $purchaseOtpNapasResponse->transaction_id }}</td>
            <td>{{ $purchaseOtpNapasResponse->channel }}</td>
            <td>{{ $purchaseOtpNapasResponse->version }}</td>
            <td>{{ $purchaseOtpNapasResponse->data_key }}</td>
            <td>{{ $purchaseOtpNapasResponse->napas_key }}</td>
            <td>{{ $purchaseOtpNapasResponse->api_operation }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['purchaseOtpNapasResponses.destroy', $purchaseOtpNapasResponse->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('purchaseOtpNapasResponses.show', [$purchaseOtpNapasResponse->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('purchaseOtpNapasResponses.edit', [$purchaseOtpNapasResponse->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
