<div class="col-xl-8 col-lg-7 mt-4">
    <div class="checkout-wrapper">
        @if(!Auth::guard('web')->check())
            @include(include_theme_path('shop.checkout.partials.sign_in'))
        @endif

        @php
            $readonly = $billing_info ? 'readonly' : '';
        @endphp
        <div class="checkout-inner mt-4 mt-lg-5">
            <h4 class="checkout-inner-title fw-500"> {{__('Billing Details')}} </h4>
            <div class="checkout-inner-contents">
                <div class="checkout-form-wrapper mt-2">
                    <form action="{{route('tenant.shop.checkout')}}" method="POST" class="checkout-form" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="payment_gateway" value="{{get_static_option('site_default_payment_gateway')}}"
                               class="payment_gateway_passing_clicking_name">
                        <input type="hidden" name="manual_trasaction_id" class="form-control" value="">
                        <input type="hidden" class="shift_another_address" name="shift_another_address">
                        <input type="hidden" class="used_coupon" name="used_coupon">
                        <input type="hidden" class="cash_on_delivery" name="cash_on_delivery">
                        <input type="hidden" class="shipping-method" name="shipping_method">

                        <div class="checkout-form-flex">
                            <div class="single-input mt-4">
                                <label class="label-title mb-3"> {{__('First Name')}} </label>
                                <input class="form--control" type="text" name="name" placeholder="{{__('Type First Name')}}" value="@auth('web'){{$billing_info ? $billing_info->full_name:auth('web')->user()?->name}}@else{{old('name')}}@endauth" {{$readonly}}>
                            </div>
                        </div>
                        <div class="checkout-form-flex">
                            <div class="single-input mt-4">
                                <label class="label-title mb-3"> {{__('Mobile Number')}} </label>
                                <input class="form--control" type="tel" placeholder="{{__('Type Mobile Number')}}" name="phone" value="@auth('web'){{$billing_info ? $billing_info->phone : (!empty(auth('web')->user()?->mobile) ? auth('web')->user()?->mobile : old('phone'))}}@else{{old('phone')}}@endauth" {{$readonly}}>
                            </div>
                            <div class="single-input mt-4">
                                <label class="label-title mb-3"> {{__('Email Address')}} </label>
                                <input class="form--control" type="text" placeholder="{{__('Type Email')}}" name="email" value="@auth('web'){{$billing_info ? $billing_info->email : auth('web')->user()?->email}}@else{{old('email')}}@endauth" {{$readonly}}>
                            </div>
                        </div>
                        <div class="checkout-form-flex">
                            <div class="single-input mt-4">
                                <label class="label-title mb-3"> {{__('Country')}} </label>
                                <select class="form--control billing_address_country" name="country" id="country">
                                    @if($billing_info == null)
                                        <option value="" selected disabled>{{__('Select a country')}}</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    @else
                                        <option {{$readonly}}>{{$billing_info?->country?->name}}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="single-input mt-4">
                                <label class="label-title mb-3"> {{__('State')}} </label>
                                <select class="form--control billing_address_state" name="state" id="state">
                                    @if($billing_info != null)
                                        <option {{$readonly}}>{{$billing_info?->state?->name}}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="single-input mt-4">
                                <label class="label-title mb-3"> {{__('City/Town')}} </label>
                                <input class="form--control" type="text" placeholder="{{__('Type City/Town')}}" name="city" value="@auth('web'){{$billing_info ? $billing_info->city : (!empty(auth('web')->user()?->city) ? auth('web')->user()?->city : old('city'))}}@else{{old('city')}}@endauth" {{$readonly}}>
                            </div>
                        </div>
                        <div class="checkout-form-flex">
                            <div class="single-input mt-4">
                                <label class="label-title mb-3"> {{__('Address')}} </label>
                                <textarea class="form--control form--message" name="address" placeholder="{{__('Type Address')}}" {{$readonly}}>@auth('web'){{$billing_info ? $billing_info->address : (!empty(auth('web')->user()?->address) ? auth('web')->user()?->address : old('address'))}}@else{{old('address')}}@endauth</textarea>
                            </div>
                        </div>

                        @if(!Auth::guard('web')->check())
                            <div class="create-account-wrapper mt-4 mt-lg-5">
                                <a href="javascript:void(0)" class="create-accounts click-open-form2 fw-500 color-heading"> {{__('Create An Accounts')}} </a>
                                <input type="hidden" class="create_accounts_input" name="create_accounts_input">

                                <div class="checkout-form-open">
                                    <div class="checkout-form-flex">
                                        <div class="single-input mt-4">
                                            <label class="label-title mb-3"> {{__('Username')}} </label>
                                            <input class="form--control" type="text" name="create_username" placeholder="{{__('Type a unique username')}}">
                                        </div>
                                    </div>

                                    <div class="checkout-form-flex">
                                        <div class="single-input mt-4">
                                            <label class="label-title mb-3"> {{__('Password')}} </label>
                                            <input class="form--control" type="password" name="create_password" placeholder="{{__('Type a strong password')}}">
                                        </div>

                                        <div class="single-input mt-4">
                                            <label class="label-title mb-3"> {{__('Confirm Password')}} </label>
                                            <input class="form--control" type="password" name="create_password_confirmation" placeholder="{{__('Confirm your password')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($billing_info != null)
                            @include(include_theme_path('shop.checkout.partials.shift_another_address'))
                        @endif

                        <div class="checkout-form-flex">
                            <div class="single-input mt-4">
                                <label class="label-title mb-3"> {{__('Order Notes')}} </label>
                                <textarea class="form--control form--message" name="message" placeholder="{{__('Type Messages')}}">{{old('message')}}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
