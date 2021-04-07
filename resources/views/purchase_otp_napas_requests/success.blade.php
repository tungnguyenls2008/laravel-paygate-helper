@extends('layouts.app')

@section('content')

<form id="merchant-form"

      action="https://gateway02-sandbox.nganluong.vn/naba/restful/api/napasresult">

    <div id="napas-widget-container">
        <input type="hidden" name="_csrf" value="{{ csrf_token() }}" />

    </div>
    <script
            type="text/javascript"
            id="napas-widget-script"

            src="https://dps-staging.napas.com.vn/api/restjs/resources/js/napas.hostedform.min.js"
            merchantId="APITEST"
            clientIP="<?= $request['client_ip'] ?>"
            deviceId="<?= $request['device_id'] ?>"
            environment="<?= $request['environment'] ?>"
            cardScheme="<?= $request['card_scheme'] ?>"
            enable3DSecure="<?= $request['enable_3d_secure'] ?>"
            apiOperation="<?= $request['api_operation'] ?>"
            orderReference="<?= $request['order_reference'] ?>"
            orderId="<?= $request['order_id'] ?>"
            channel="<?= $request['channel'] ?>"
            sourceOfFundsType="<?= $request['fund_type'] ?>"
            dataKey="<?= $response['data']['dataKey'] ?>"
            napasKey="<?= $response['data']['napasKey'] ?>"
    >
    </script>
</form>
@endsection
