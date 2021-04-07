@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Purchase Otp Napas Request</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($purchaseOtpNapasRequest, ['route' => ['purchaseOtpNapasRequests.update', $purchaseOtpNapasRequest->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('purchase_otp_napas_requests.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('purchaseOtpNapasRequests.index') }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
