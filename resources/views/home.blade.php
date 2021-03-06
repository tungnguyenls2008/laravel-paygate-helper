@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="jumbotron">
           <div style="background: #ffed4a"> <h1><i class="fas fa-radiation-alt"></i>   Nuclear test site!   <i class="fas fa-radiation-alt"></i></h1>
            <!--        <iframe src="https://alepay-v3-dev.nganluong.vn/microform/payment/web/v1/site/en/orqXHqcY0YYpY47ybZLH5GVIw4eHSAFm/web"></iframe>-->
            <p class="lead"><i class="fas fa-skull"></i>   Doom on you Mr. World Wide   <i class="fas fa-skull"></i></p>
           </div>
            <a href="{{route('merchantOrders.index')}}" class="btn btn-lg from-left"><div><i class="fas fa-bomb"></i></div>Merchant Order Index</a>
            <a href="{{route('merchantOrderResults.index')}}" class="btn btn-lg from-right"><div><i class="fas fa-smog"></i></div>Merchant Order Result</a>
            <a href="{{route('purchaseOtpNapasRequests.index')}}" class="btn btn-lg from-left"><div><i class="fas fa-smog"></i></div>Napas test site</a>
            <a href="{{route('purchaseOtpNapasResponses.index')}}" class="btn btn-lg from-center"><div><i class="fas fa-smog"></i></div>Napas Responses</a>
            <a href="{{route('crypt.index')}}" class="btn btn-lg from-right"><div><i class="fas fa-smog"></i></div>Cryptography</a>
         </div>

    </div>
</div>
@endsection
