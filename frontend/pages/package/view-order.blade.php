@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Order Details For:')}} {{$order_details->package_name}}
@endsection
@section('content')
    <div class="error-page-content padding-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 class="billing-title">{{__('Order Details')}}</h2>
                    <ul class="billing-details">
                        <li><strong>{{__('Order Status:')}}</strong> {{$order_details->status}}</li>
                        <li><strong>{{__('Payment Method:')}}</strong> {{str_replace('_',' ',$payment_details->package_gateway)}}</li>
                        @if(!empty($payment_details->coupon))
                            <li><strong>{{__('Paid Amount After Coupon Discount :')}}</strong> {{ amount_with_currency_symbol($payment_details->package_price) }}</li>
                        @endif
                        <li><strong>{{__('Payment Status:')}}</strong> {{$payment_details->status}}</li>
                        <li><strong>{{__('Transaction ID:')}}</strong> {{$payment_details->transaction_id}}</li>
                        <li><strong>{{__('Date:')}}</strong> {{date_format($payment_details->created_at,'d M, Y')}}</li>
                    </ul>
                    <h2 class="billing-title">{{__('Billing Details')}}</h2>
                    <ul class="billing-details">
                        <li><strong>{{__('Name:')}}</strong> {{$payment_details->name}}</li>
                        <li><strong>{{__('Email:')}}</strong> {{$payment_details->email}}</li>
                    </ul>
                    <div class="btn-wrapper margin-top-40">
                        @if(auth()->guard('web')->check())
                            <a href="{{route('user.home')}}" class="boxed-btn btn-saas">{{__('Go To Dashboard')}}</a>
                        @else
                            <a href="{{url('/')}}" class="boxed-btn btn-saas">{{__('Back To Home')}}</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 mt-3">
                    <div class="right-content-area">
                        <div class="single-price-plan-01">
                            <div class="right-content-area">
                                <div class="price-header">
                                    <h4 class="title">{{ $package_details->title }}</h4>
                                    <div class="img-icon">
                                        {!! render_image_markup_by_attachment_id($package_details->image) !!}
                                    </div>
                                </div>
                                <div class="price-wrap">
                                    <span class="price">{{amount_with_currency_symbol($package_details->price)}}</span><span class="month">{{ $package_details->type }}</span>
                                </div>
                                <div class="price-body">
                                    <ul>
                                        @foreach(explode(',',$package_details->features) as $item)
                                        <li><i class="fa fa-check success"></i> {{$item}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
