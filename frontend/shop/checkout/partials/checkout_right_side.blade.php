<div class="col-xl-4 col-lg-5 mt-4">
    <div class="checkout-order-summery border-1">
        <div class="order-summery-contents">
            <h2 class="summery-title fw-500"> {{__('Order Summery')}} </h2>
            <form action="#" class="coupon-contents-form coupon-border pt-4 mt-4">
                <div class="single-input">
                    <input type="hidden" class="coupon-country" name="coupon_country"
                           value="{{$billing_info ? $billing_info->country_id: ''}}">
                    <input type="hidden" class="coupon-state" name="coupon_state"
                           value="{{$billing_info ? $billing_info->state_id: ''}}">
                    <input type="hidden" class="coupon-shipping-method" name="coupon_shipping_method"
                           value="">
                    <input class="form--control coupon-code" type="text" placeholder="{{__('Coupon Code')}}"
                           name="used_coupon">
                </div>
                <button type="button" class="btn-submit coupon-btn"> {{__('Apply Coupon')}}</button>
            </form>
            <div class="checkout-cart-wrapper coupon-border mt-4 mb-4">
                @foreach($cart_data as $data)
                    <div class="single-checkout-cart-items mt-3">
                        <div class="single-check-carts">
                            <div class="check-cart-flex-contents">
                                <div class="checkout-cart-thumb">
                                    <a href="javascript:void(0)">
                                        {!! render_image_markup_by_attachment_id($data?->options?->image) !!}
                                    </a>
                                </div>
                                <div class="checkout-cart-img-contents">
                                    <h6 class="checkout-cart-title"><a href="javascript:void(0)"> {{$data->name}} </a>
                                    </h6>

                                    <span class="name-subtitle d-block mt-2">
                                        @if($data?->options?->color_name)
                                            {{__('Color:')}} {{$data?->options?->color_name}} ,
                                        @endif

                                        @if($data?->options?->size_name)
                                            {{__('Size:')}} {{$data?->options?->size_name}}
                                        @endif

                                        @if($data?->options?->attributes)
                                            <br>
                                            @foreach($data?->options?->attributes as $key => $attribute)
                                                {{$key.':'}} {{$attribute}}{{!$loop->last ? ',' : ''}}
                                            @endforeach
                                        @endif
                                    </span>
                                    <span class="product-items mt-0"> {{__('Quantity:')}} {{$data->qty}} </span>
                                </div>
                            </div>
                            <span
                                class="checkout-cart-price color-heading fw-500"> {{amount_with_currency_symbol($data->price * $data->qty)}} </span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="coupon-contents-details mt-4">
                <ul class="coupon-contents-details-list coupon-border">
                    <li class="coupon-contents-details-list-item">
                        <h6 class="coupon-contents-details-list-item-title"> {{__('Sub Total')}} </h6> <span
                            class="coupon-contents-details-list-item-price fw-500"> {{site_currency_symbol().Cart::subtotal()}} </span>
                    </li>
                </ul>
                <div class="shipping_method_wrapper">
                    @php
                        $has_delivery_address = false;
                        $user = Auth::guard('web')->user();
                        if ($user != null)
                        {
                            if ($user?->delivery_address != null)
                            {
                                $has_delivery_address = true;
                                $country = (string)($user?->delivery_address?->country_id);
                                $state = (string)($user?->delivery_address?->state_id);

                                $shipping_zones = \Modules\ShippingModule\Entities\ZoneRegion::whereJsonContains('country', $country)->whereJsonContains('state', $state)
                                ->pluck('zone_id')
                                ->toArray();

                                if (empty($shipping_zones))
                                    {
                                        $shipping_zones = \Modules\ShippingModule\Entities\ZoneRegion::whereJsonContains('country', $country)
                                        ->pluck('zone_id')
                                        ->toArray();
                                    }

                                $shipping_methods = \Modules\ShippingModule\Entities\ShippingMethod::with('options')->whereIn('zone_id', $shipping_zones)->get();
                            }
                        }
                    @endphp

                    @if($user != null)
                        <ul class="coupon-contents-details-list coupon-border">
                            <h6>{{__('Shipping')}}</h6>
                            @foreach($shipping_methods ?? [] as $key => $method)
                                @php
                                    $is_default = false;
                                    if ($key == 0)
                                    {
                                        $is_default = true;
                                        $default_shipping = $method;
                                    }
                                @endphp

                                <li class="coupon-contents-details-list-item" data-country="{{isset($country) ?? 0}}"
                                    data-state="{{isset($state) ?? 0}}">
                                    <span class="coupon-radio-item">
                                        <input type="radio" class="shipping_methods"
                                               id="shipping-option-{{$method['id']}}"
                                               name="shipping_method" value="{{$method['id']}}">
                                        <label for="shipping-option-{{$method['id']}}">{{$method['name']}}</label>
                                    </span>
                                    <span>{{amount_with_currency_symbol($method['options']['cost'])}}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="shipping_tax_total">
                        <ul class="coupon-contents-details-list coupon-border">
                            <li class="coupon-contents-details-list-item"><span> {{__('Tax (Incl)')}} </span>
                                <span> {{$product_tax.'%'}} </span></li>
                            <li class="coupon-contents-details-list-item coupon-price"><span> {{__('Coupon Discount (-)')}} </span>
                                <span> {{amount_with_currency_symbol(0.00)}} </span></li>
                            <li class="coupon-contents-details-list-item price-shipping">
                                <span> {{__('Shipping Cost (+)')}} </span>
                                <span> {{isset($is_default) && $is_default ? amount_with_currency_symbol($default_shipping['options']['cost']) : '--'}} </span>
                            </li>
                        </ul>
                        <ul class="coupon-contents-details-list coupon-border">
                            @php
                                $subtotal = (double) Cart::subtotal(0, '', '');
                                $taxed_price = ($subtotal * $product_tax) / 100;

                                $shipping_tax = 0;
                                if (Auth::guard('web')->check())
                                {
                                    if ($has_delivery_address)
                                    {
                                        if(isset($default_shipping) && $default_shipping?->options?->tax_status)
                                        {
                                            $shipping_tax = ($default_shipping['options']['cost'] * $product_tax) / 100;
                                        }
                                        $shipping = isset($is_default) && $is_default ? $default_shipping['options']['cost'] ?? 0 : 0;
                                    } else {
                                        $shipping = 0;
                                    }
                                } else {
                                    $shipping = 0;
                                }

                                $total = $subtotal + ($taxed_price + $shipping_tax) + $shipping;
                            @endphp
                            <li class="coupon-contents-details-list-item price-total"
                                data-total="{{$subtotal+$taxed_price}}" {{!isset($is_default) ? 'data-total='.$total.'' : ''}}
                            ">
                            <h6 class="coupon-title"> {{__('Total Amount')}} </h6> <span
                                class="coupon-price fw-500 color-heading"> {{site_currency_symbol().$total}} </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @if(!empty(get_static_option('cash_on_delivery')))
                <div class="checkbox-inlines cash-on-delivery mt-2">
                    <input class="check-input" type="checkbox" id="cash">
                    <label class="checkbox-label" for="cash"> {{__('Cash On Delivery')}} </label>
                </div>
            @endif

            <div class="payment-inlines mt-4">
                <h6 class="payment-label fw-500"> {{__('Select Payment Method')}} </h6>
                <div class="payment-card mt-4">

                    {!! (new \App\Helpers\PaymentGatewayRenderHelper())->renderPaymentGatewayForForm() !!}

                    <div class="form-group d-none w-100 mt-3 manual_transaction_id">
                        <p class="alert alert-info manual_description"></p>
                        <input type="text" name="trasaction_id" class="form-control "
                               placeholder="{{__('Transaction ID')}}">
                    </div>

                    <input type="hidden" id="site_global_payment_gateway"
                           value="{{get_static_option('site_default_payment_gateway')}}">
                </div>
            </div>

            <div class="checkbox-inlines mt-3">
                <input class="check-input" type="checkbox" id="agree">
                <label class="checkbox-label" for="agree"> {{__('I have read and agree to the website')}} <a
                        class="terms-condition" href="javascript:void(0)"> {{__('terms and conditions*')}} </a> </label>
            </div>

            <div class="btn-wrapper mt-3">
                <a href="javascript:void(0)"
                   class="cmn-btn cmn-btn-bg-1 w-100 radius-0 checkout_disable proceed_checkout_btn"> {{__('Proceed to Checkout')}} </a>
            </div>

            <div class="btn-wrapper mt-3">
                <a href="{{route('tenant.shop.cart')}}" class="cmn-btn cmn-btn-outline-one w-100 radius-0"> {{__('Return to Cart')}} </a>
            </div>
        </div>
    </div>
</div>
