<div class="table-responsive">
    <table class="table" id="tests-table">
        <thead>
            <tr>
                <th>String</th>
        <th>Number</th>
        <th>Boolean</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tests as $test)
            <tr>
                <td>{{ $test->string }}</td>
            <td>{{ $test->number }}</td>
            <td>{{ $test->boolean }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tests.destroy', $test->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tests.show', [$test->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tests.edit', [$test->id]) }}" class='btn btn-default btn-xs'>
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
