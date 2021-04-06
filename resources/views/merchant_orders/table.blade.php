<div class="table-responsive">
    <table class="table" id="merchantOrders-table">
        <thead>
            <tr>
                <th>Merchant Site Code</th>
        <th>Merchant Key</th>
        <th>Order Code</th>
        <th>Method Code</th>
        <th>Bank Code</th>
        <th>Order Description</th>
        <th>Amount</th>
        <th>Currency</th>
        <th>Language</th>
        <th>Buyer Fullname</th>
        <th>Buyer Email</th>
        <th>Buyer Mobile</th>
        <th>Buyer Address</th>
        <th>Time Limit</th>
        <th>Return Url</th>
        <th>Cancel Url</th>
        <th>Notify Url</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($merchantOrders as $merchantOrder)
            <tr>
                <td>{{ $merchantOrder->merchant_site_code }}</td>
            <td>{{ $merchantOrder->merchant_key }}</td>
            <td>{{ $merchantOrder->order_code }}</td>
            <td>{{ $merchantOrder->method_code }}</td>
            <td>{{ $merchantOrder->bank_code }}</td>
            <td>{{ $merchantOrder->order_description }}</td>
            <td>{{ $merchantOrder->amount }}</td>
            <td>{{ $merchantOrder->currency }}</td>
            <td>{{ $merchantOrder->language }}</td>
            <td>{{ $merchantOrder->buyer_fullname }}</td>
            <td>{{ $merchantOrder->buyer_email }}</td>
            <td>{{ $merchantOrder->buyer_mobile }}</td>
            <td>{{ $merchantOrder->buyer_address }}</td>
            <td>{{ $merchantOrder->time_limit }}</td>
            <td>{{ $merchantOrder->return_url }}</td>
            <td>{{ $merchantOrder->cancel_url }}</td>
            <td>{{ $merchantOrder->notify_url }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['merchantOrders.destroy', $merchantOrder->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('merchantOrders.show', [$merchantOrder->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('merchantOrders.edit', [$merchantOrder->id]) }}" class='btn btn-default btn-xs'>
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
