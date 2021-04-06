<!-- String Field -->
<div class="form-group col-sm-6">
    {!! Form::label('string', 'String:') !!}
    {!! Form::text('string', null, ['class' => 'form-control','maxlength' => 64]) !!}
</div>

<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Number:') !!}
    {!! Form::number('number', null, ['class' => 'form-control']) !!}
</div>

<!-- Bool Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bool', 'Boolean:') !!}
    {!! Form::select('boolean', array('1' => 'True', '0' => 'False')) !!}
</div>
