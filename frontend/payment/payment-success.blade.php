@if (isset($payment_details))
    @if (empty($payment_details))
        @php
            header("Location: " . url('/'), true, 302);
            exit();
        @endphp
    @endif
@endif

@extends('tenant.frontend.frontend-page-master')
@section('title')
    {{__('Payment Success From:')}} {{$payment_details->name}}
@endsection

@section('page-title')
    {{__('Payment Success For:')}} {{$payment_details->name}}
@endsection
@section('content')
    <style>
        .billing-details li{
            text-transform: capitalize;
        }
        .vat-tax{
            font-size: 10px;
        }
    </style>

    <div class="error-page-content" data-padding-bottom="100" data-padding-top="100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="order-success-area section-title margin-bottom-60 text-center">
                        <h1 class="title">{{get_static_option('site_order_success_page_title')}}</h1>
                        <p class="order-page-description section-para">{{get_static_option('site_order_success_page_description')}}</p>
                    </div>
                </div>
                <div class="row justify-content-center g-4">
                    <div class="col-xxl-3 col-lg-4">
                        <div class="billing-wrappers">
                            <div class="billing-items">
                                <h2 class="billing-title">{{__('Order Details')}}</h2>
                                <ul class="billing-details">
                                    <li><strong>{{__('Order ID:')}}</strong> #{{$payment_details->id}}</li>
                                    <li><strong>{{__('Payment Type:')}}</strong> {{$payment_details->checkout_type == 'cod' ? __('Cash On Delivery') : __('Digital Payment')}} </li>

                                    @if($payment_details->payment_gateway)
                                        <li><strong>{{__('Payment Gateway:')}}</strong> {{$payment_details->payment_gateway}}</li>
                                    @endif

                                    @if(!empty($payment_details->coupon))
                                        <li><strong>{{__('Paid Amount After Discount :')}}</strong> {{ amount_with_currency_symbol(optional($payment_details->package)->price) }}</li>
                                    @endif

                                    <li><strong>{{__('Payment Status:')}}</strong> {{$payment_details->payment_status}}</li>
                                    @if($payment_details->transaction_id)
                                        <li><strong>{{__('Transaction ID:')}}</strong> {{$payment_details->transaction_id}}</li>
                                    @endif
                                    <li><strong>{{__('Order Status:')}}</strong> {{$payment_details->status}}</li>
                                </ul>
                            </div>
                            <div class="billing-items">
                                <h2 class="billing-title">{{__('Billing Details')}}</h2>
                                <ul class="billing-details">
                                    <li><strong>{{__('Name:')}}</strong> {{$payment_details->name}}</li>
                                    <li><strong>{{__('Email:')}}</strong> <span class="text-lowercase">{{$payment_details->email}}</span></li>
                                </ul>
                                <div class="btn-wrapper margin-top-40">
                                    @if(auth()->guard('web')->check())
                                        <a href="{{route('tenant.user.home')}}" class="boxed-btn rounded-0 btn btn-primary">{{__('Go To Dashboard')}}</a>
                                    @else
                                        <a href="{{route('tenant.frontend.homepage')}}" class="boxed-btn rounded-0 btn btn-primary">{{__('Back To Home')}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-content-area">
                            <div class="single-price-plan-01">
                                <div class="right-content-area">
                                    <div class="price-header">
                                        <h4 class="billing-title">{{__('Order Details')}}</h4>
                                    </div>
                                    <div class="price-body price-table">
                                        <table class="table">
                                            <thead>
                                                <th>{{__('Item')}}</th>
                                                <th>{{__('Quantity')}}</th>
                                                <th>{{__('Price')}}</th>
                                            </thead>
                                            <tbody>
                                                @foreach(json_decode($payment_details->order_details) as $item)
                                                    <tr>
                                                        <td class="text-capitalize">
                                                            {{$item->name}}
                                                            <span class="name-subtitle d-block mt-2">
                                                                @if(!empty($item?->options?->color_name))
                                                                    {{__('Color:')}} {{$item?->options?->color_name}} ,
                                                                @endif

                                                                @if(!empty($item?->options?->size_name))
                                                                    {{__('Size:')}} {{$item?->options?->size_name}}
                                                                @endif

                                                                @if(!empty($item?->options?->attributes))
                                                                    <br>
                                                                    @foreach($item?->options?->attributes as $key => $attribute)
                                                                        {{$key.':'}} {{$attribute}}{{!$loop->last ? ',' : ''}}
                                                                    @endforeach
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td>x{{$item->qty}}</td>
                                                        <td>{{amount_with_currency_symbol($item->price)}}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td></td>
                                                    <td class="font-weight-bold">{{__('Tax:')}}</td>
                                                    <td>{{json_decode($payment_details->payment_meta)?->product_tax}}%</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="font-weight-bold">{{__('Shipping:')}}</td>
                                                    <td>{{amount_with_currency_symbol(json_decode($payment_details->payment_meta)?->shipping_cost)}}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="font-weight-bold">{{__('Subtotal:')}}</td>
                                                    <td>{{amount_with_currency_symbol(json_decode($payment_details->payment_meta)?->subtotal)}}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="font-weight-bold">{{__('Total:')}}</td>
                                                    <td>{{amount_with_currency_symbol($payment_details->total_amount)}} <small class="vat-tax">{{__('(Incl TAX & Shipping)')}}</small></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
