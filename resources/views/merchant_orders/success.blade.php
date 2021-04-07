@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="alert alert-success">Payment success</div>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <a class="btn btn-primary" href="http://localhost:8080/merchant-order/create">Test again</a>
        <a class="btn btn-primary" href="<?= ROOT_URL_TEST . '?option=view_log&file_name=' . date('Ymd') . '.txt' ?>">View Log</a>
    </div>
</div>
@endsection
