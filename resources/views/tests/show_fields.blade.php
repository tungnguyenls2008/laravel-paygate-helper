<!-- String Field -->
<div class="col-sm-12">
    {!! Form::label('string', 'String:') !!}
    <p>{{ $test->string }}</p>
</div>

<!-- Number Field -->
<div class="col-sm-12">
    {!! Form::label('number', 'Number:') !!}
    <p>{{ $test->number }}</p>
</div>

<!-- Boolean Field -->
<div class="col-sm-12">
    {!! Form::label('boolean', 'Boolean:') !!}
    <p>{{ $test->boolean }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $test->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $test->updated_at }}</p>
</div>

