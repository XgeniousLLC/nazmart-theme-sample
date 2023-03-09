@extends('tenant.frontend.frontend-page-master')

@section('title')
    {{__('Order Cancelled for:'.' '.$order_details->name ?? '')}}
@endsection

@section('page-title')
    {{__('Order Cancelled for:'.' '.$order_details->name ?? '')}}
@endsection

@section('content')
    <div class="error-page-content padding-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="order-cancel-area">
                        <h1 class="title">{{get_static_option('site_order_cancel_page_' . $user_select_lang_slug . '_title') ?? __('Your Order Has Been Canceled')}}</h1>
                        <h3 class="sub-title">
                            @php
                                $subtitle = get_static_option('site_order_cancel_page_' . $user_select_lang_slug . '_subtitle');
                                $subtitle = str_replace('{pkname}',$order_details->package_name,$subtitle);
                            @endphp
                            {{$subtitle}}
                        </h3>
                        <p>
                            {{get_static_option('site_order_cancel_page_' . $user_select_lang_slug . '_description')}}
                        </p>
                        <div class="btn-wrapper text-center my-4">
                            <a href="{{url('/')}}" class="boxed-btn btn btn-primary rounded-0">{{__('Back To Home')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
