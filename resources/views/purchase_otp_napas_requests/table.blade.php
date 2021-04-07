<div class="table-responsive">
    <table class="table" id="purchaseOtpNapasRequests-table">
        <thead>
            <tr>
                <th>Transaction Id</th>
        <th>Order Id</th>
        <th>Api Operation</th>
        <th>Order Amount</th>
        <th>Order Currency</th>
        <th>Order Reference</th>
        <th>Fund Type</th>
        <th>Card Number</th>
        <th>Issue Date</th>
        <th>Name On Card</th>
        <th>Channel</th>
        <th>Client Ip</th>
        <th>Device Id</th>
        <th>Environment</th>
        <th>Card Scheme</th>
        <th>Enable 3D Secure</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($purchaseOtpNapasRequests as $purchaseOtpNapasRequest)
            <tr>
                <td>{{ $purchaseOtpNapasRequest->transaction_id }}</td>
            <td>{{ $purchaseOtpNapasRequest->order_id }}</td>
            <td>{{ $purchaseOtpNapasRequest->api_operation }}</td>
            <td>{{ $purchaseOtpNapasRequest->order_amount }}</td>
            <td>{{ $purchaseOtpNapasRequest->order_currency }}</td>
            <td>{{ $purchaseOtpNapasRequest->order_reference }}</td>
            <td>{{ $purchaseOtpNapasRequest->fund_type }}</td>
            <td>{{ $purchaseOtpNapasRequest->card_number }}</td>
            <td>{{ $purchaseOtpNapasRequest->issue_date }}</td>
            <td>{{ $purchaseOtpNapasRequest->name_on_card }}</td>
            <td>{{ $purchaseOtpNapasRequest->channel }}</td>
            <td>{{ $purchaseOtpNapasRequest->client_ip }}</td>
            <td>{{ $purchaseOtpNapasRequest->device_id }}</td>
            <td>{{ $purchaseOtpNapasRequest->environment }}</td>
            <td>{{ $purchaseOtpNapasRequest->card_scheme }}</td>
            <td>{{ $purchaseOtpNapasRequest->enable_3d_secure }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['purchaseOtpNapasRequests.destroy', $purchaseOtpNapasRequest->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('purchaseOtpNapasRequests.show', [$purchaseOtpNapasRequest->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('purchaseOtpNapasRequests.edit', [$purchaseOtpNapasRequest->id]) }}" class='btn btn-default btn-xs'>
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
