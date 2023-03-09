<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <title>{{__('Order Invoice')}}</title>
    <style>

        body * {
            font-family: 'Open Sans', sans-serif;
        }
        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 15px;
        }

        /* cart page */
        .cart-wrapper table .thumbnail {
            max-width: 50px;
        }

        .cart-wrapper table .product-title {
            font-size: 16px;
            line-height: 26px;
            font-weight: 600;
            transition: 300ms all;
        }

        .cart-wrapper table .quantity {
            max-width: 80px;
            border: 1px solid #e2e2e2;
            height: 40px;
            padding-left: 10px;
        }

        .cart-wrapper table {
            color: #656565;
        }

        .cart-wrapper table th {
            color: #333;
        }

        .cart-total-wrap .title {
            font-size: 30px;
            line-height: 40px;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .cart-total-table table td {
            color: #333;
        }

        .billing-details-wrapper .login-form {
            max-width: 450px;
        }

        .billing-details-wrapper {
            margin-bottom: 80px;
        }

        .billing-details-fields-wrapper .title {
            font-size: 30px;
            line-height: 40px;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .product-orders-summery-warp .title {
            font-size: 24px;
            text-align: left;
            margin-bottom: 7px;
        }

        #pdf_content_wrapper {
            max-width: 1000px;
        }

        .cart-wrapper table .thumbnail img {
            width: 80px;
        }

        .cart-total-table-wrap .title {
            font-size: 25px;
            line-height: 34px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .billing-and-shipping-details div:first-child {
            margin-bottom: 30px;
        }

        .billing-and-shipping-details div ul {
            margin: 0;
            padding: 0;
        }

        .billing-and-shipping-details div ul li {
            font-size: 16px;
            line-height: 30px;
        }

        .billing-and-shipping-details div .title {
            font-size: 22px;
            line-height: 26px;
            font-weight: 600;
        }

        .billing-and-shipping-details {
            margin-top: 40px;
        }

        .billing-wrap ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>
<body>
<div id="pdf_content_wrapper">


    <div class="cart-table-wrapper cart-wrapper">
        <div class="logo-wrapper" style="max-width: 200px">
            {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
        </div>
        <div class="package-info-wrap">
            @if(!empty($payment_details))
                <h2 class="main_title">{{__('Package Information')}}</h2>
                <ul>
                    <li><strong>{{__('Order ID')}}</strong> #{{$payment_details->id}}</li>
                    <li><strong>{{__('Order Date')}}</strong> {{date_format($payment_details->created_at,'d M Y')}}</li>
                    <li><strong>{{__('Total Price')}}</strong> {{amount_with_currency_symbol($payment_details->total_amount)}}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="cart-total-table-wrap">
        <h4 class="title">{{__('Billing Summery')}}</h4>
        <div class="cart-total-table table-responsive">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th>{{__('Billing Name')}}</th>
                    <td>{{$payment_details->name}}</td>
                </tr>
                <tr>
                    <th>{{__('Billing Email')}}</th>
                    <td>{{$payment_details->email}}</td>
                </tr>
                <tr>
                    <th>{{__('Billing Address')}}</th>
                    <td>
                        <p>Country: {{$payment_details->getCountry?->name}}</p>
                        <p>State: {{$payment_details->getState?->name}}</p>
                        <p>City: {{$payment_details->city}}</p>
                        <p>Address: {{$payment_details->address}}</p>
                    </td>
                </tr>
                <tr>
                    <th>{{__('Order Details')}}</th>
                    <td>
                        <ul class="internal-order-summery-list">
                            @foreach(json_decode($payment_details->order_details) ?? [] as $product)
                                <li class="internal-single-order-summery">
                                            <span class="internal-subject">{!! render_image_markup_by_attachment_id($product->options?->image) !!} {{ $product?->name }}
                                                @if(!empty($product->options?->color_name))
                                                    : {{ __("Size") }} : {{ $product->options?->color_name }} ,
                                                @endif

                                                @if(!empty($product->options?->size_name))
                                                    {{ __("Color") }} : {{ $product->options?->size_name }}
                                                @endif

                                                @if(!empty($product->options->attributes))
                                                    ,
                                                    @foreach($product->options?->attributes ?? [] as $key => $value)
                                                        {{ $key }} : {{ $value }} @if($loop->last) , @endif
                                                    @endforeach
                                                @endif

                                                <i class="las la-times icon"></i>
                                                <span class="times text-deep">{{ $product->qty }}</span>
                                            </span>
                                    <span class="internal-object">
                                                {{ amount_with_currency_symbol(($product->price * $product->qty) ?? 0) }}
                                            </span>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>{{__('Total')}}</th>
                    <td>{{amount_with_currency_symbol($payment_details->total_amount)}}</td>
                </tr>
                <tr>
                    <th>{{__('Payment Gateway')}}</th>
                    <td>{{$payment_details->payment_gateway != null ? $payment_details->payment_gateway : 'Cash on Delivery'}}</td>
                </tr>
                <tr>
                    <th>{{__('Payment Status')}}</th>
                    <td>{{$payment_details->payment_status}}</td>
                </tr>
                <tr>
                    <th>{{__('Transaction ID')}}</th>
                    <td>{{$payment_details->transaction_id}}</td>
                </tr>
                <tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
