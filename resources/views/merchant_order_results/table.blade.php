<div class="table-responsive">
    <table class="table table-responsive" id="merchantOrderResults-table">
        <thead>
        <tr>
            <th>Input</th>
            <th>Result Code</th>
            <th>Checkout Url</th>
            <th>Token Code</th>
            <th>Result Message</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($merchantOrderResults as $merchantOrderResult)
            <tr>
                <td width="200"><a href='https://codebeautify.org/json-decode-online?input={{ $merchantOrderResult->input }}&process=true' class='btn btn-sm btn-info' target='_blank'>Display</a></td>
                <td>{{ $merchantOrderResult->result_code }}</td>
                <td><a class='btn btn-sm btn-info' target='_blank' href="{{ $merchantOrderResult->checkout_url }}">Open</a></td>
                <td>{{ $merchantOrderResult->token_code }}</td>
                <td>{{ $merchantOrderResult->result_message }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['merchantOrderResults.destroy', $merchantOrderResult->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('merchantOrderResults.show', [$merchantOrderResult->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('merchantOrderResults.edit', [$merchantOrderResult->id]) }}"
                           class='btn btn-default btn-xs'>
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
