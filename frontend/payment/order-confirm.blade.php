@extends('tenant.frontend.frontend-page-master')
@section('title')
    {{ __('Order Confirm') }}
@endsection
@section('content')

    <div class="error-page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="order-confirm-area">
                        <h4 class="title">{{ __('Order Details') }}</h4>
                        <x-flash-msg/>
                        <x-error-msg/>
                        <form action="{{ route('frontend.order.payment.form') }}" method="post"
                            enctype="multipart/form-data" class="contact-page-form style-01">
                            @csrf
                            @php
                                $custom_fields = unserialize($order_details->custom_fields);
                                $payment_gateway = !empty($custom_fields['selected_payment_gateway']) ? $custom_fields['selected_payment_gateway'] : '';
                                $name = auth()->guard('web')->check() ? auth()->guard('web')->user()->name : '';
                                $email = auth()->guard('web')->check() ? auth()->user()->guard('web')->email : '';
                            @endphp
                            <input type="hidden" name="order_id" value="{{ $order_details->id }}">
                            <input type="hidden" name="payment_gateway" value="{{ $payment_gateway }}">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>{{ __('Your Name') }}</td>
                                        <td>
                                            <div class="form-group">
                                                @if(auth()->check())
                                                <input type="text" name="name" value="{{ $name }}"
                                                    class="form-control" placeholder="{{ __('Enter Your Name') }}"
                                                    readonly>

                                                @else
                                                <input type="text" name="name" id="pkg_user_name" value="{{ $name }}"
                                                    class="form-control" placeholder="{{ __('Enter Your Name') }}"
                                                    >
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Your Email') }}</td>
                                        <td>
                                            <div class="form-group">
                                                @if(auth()->check())
                                                <input type="email" name="email" value="{{ $email }}"
                                                    class="form-control" placeholder="{{ __('Enter Your Email') }}"
                                                    readonly>
                                                @else
                                                <input type="email" name="email" id="pkg_user_email" value="{{ $email }}"
                                                    class="form-control" placeholder="{{ __('Enter Your Email') }}"
                                                    >
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Package Name') }}</td>
                                        <td>{{ $order_details->package_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Package Price') }}</td>
                                        <td>
                                            <strong>{{ amount_with_currency_symbol($final_price) }}</strong>
                                            @if (!check_currency_support_by_payment_gateway($payment_gateway))
                                                <br>
                                                <small>{{ __('You will charge in ' . get_charge_currency($payment_gateway) . ', you have to pay' . ' ') }}
                                                    <strong>{{ get_charge_amount($order_details->package_price, $payment_gateway) . get_charge_currency($payment_gateway) }}</strong></small>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Payment Gateway') }}</td>
                                        <td class="text-capitalize">
                                            @if ($payment_gateway == 'manual_payment')
                                                {{ get_static_option('site_manual_payment_name') }}
                                            @else
                                                {{ $payment_gateway }}
                                            @endif
                                        </td>
                                    </tr>
                                    @if ($payment_gateway == 'manual_payment')
                                        <tr>
                                            <td>{{ __('Transaction ID') }}</td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="trasaction_id" class="form-control">
                                                    <small>{!! get_manual_payment_description() !!}</small>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                            <div class="btn-wrapper">
                                <button class="boxed-btn btn-saas btn-block" id="pay_now" type="submit">{{ __('Pay Now') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        (function($){
        "use strict";
        $(document).ready(function(){
            var name = sessionStorage.pkg_user_name;
            var email = sessionStorage.pkg_user_email;
            $("#pkg_user_name").val(name)
            $("#pkg_user_email").val(email)

            $(document).on('click',"#pay_now",function(){
                sessionStorage.removeItem("pkg_user_name")
                sessionStorage.removeItem("pkg_user_email")
            })
        })
        })(jQuery);
    </script>
@endsection
