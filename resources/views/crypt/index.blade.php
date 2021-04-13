@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Crypt</h1>
                </div>
                <div class="col-sm-12">
                    <a class="btn from-center"
                       href="{{ route('crypt.create') }}">
                        Encrypt files
                    </a>
                    <a class="btn from-center"
                       href="{{ route('crypt-decrypt-view') }}">
                        Decrypt files
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

