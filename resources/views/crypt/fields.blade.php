<?php
$faker = Faker\Factory::create();
?>

<!-- Input Field -->
<div class="form-group col-sm-6">
    {!! Form::label('input_file', 'Input File to encrypt:') !!}
    {!! Form::file('input_file[]',['class' => 'form-control','multiple'=>true,'style'=>'height:auto']) !!}
</div>

<!-- Encrypt key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('encrypt_key', 'Encrypt key (32 chars):') !!}
    {!! Form::text('encrypt_key','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa' , ['class' => 'form-control','maxlength' => 100,'style'=>'height:35px']) !!}
</div>
