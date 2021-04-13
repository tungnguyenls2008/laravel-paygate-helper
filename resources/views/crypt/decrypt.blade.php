@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Decrypt files</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'crypt-decrypt','enctype'=>'multipart/form-data','method'=>'POST']) !!}

            <div class="card-body">

                <div class="row">
                    <!-- Input Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('input_file', 'Input File to decrypt:') !!}
                        {!! Form::file('input_file[]',['class' => 'form-control','multiple'=>true,'style'=>'height:auto']) !!}
                    </div>

                    <!-- Encrypt key Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('decrypt_key', 'Decrypt key (32 chars):') !!}
                        {!! Form::text('decrypt_key','aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa' , ['class' => 'form-control','maxlength' => 100,'style'=>'height:35px']) !!}
                    </div>

                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Decrypt!', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('crypt.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection
