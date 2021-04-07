@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="alert alert-warning">Order is canceled</div>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <a class="btn btn-primary" href="<?= env('APP_URL').'/merchantOrders/create'?>">Test again</a>
{{--        <a class="btn btn-primary" href="<?= env('APP_URL').'/merchantOrders/create?option=view_log&file_name=' . date('Ymd') . '.txt' ?>">View Log</a>--}}
    </div>
</div>
@endsection
