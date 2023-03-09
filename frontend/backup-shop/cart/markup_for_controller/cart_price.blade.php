@php
    $subtotal = \Gloudemans\Shoppingcart\Facades\Cart::subtotal(2, '.', ',');
    $total = \Gloudemans\Shoppingcart\Facades\Cart::priceTotal(2, '.', ',');
@endphp

<h4 class="coupon-contents-title"> {{__('Cart Total:')}} </h4>
<div class="coupon-contents-details mt-4">
    <ul class="coupon-contents-details-list coupon-border">
        <li class="coupon-contents-details-list-item">
            <h6 class="coupon-contents-details-list-item-title"> {{__('Sub Total')}} </h6> <span class="coupon-contents-details-list-item-price fw-500"> {{site_currency_symbol().$subtotal}} </span>
        </li>
    </ul>
    <ul class="coupon-contents-details-list coupon-border">
        <li class="coupon-contents-details-list-item"> <span> {{__('Tax')}} ({{__('Incl')}}. --%) </span> <span> -- </span> </li>
    </ul>
    <ul class="coupon-contents-details-list coupon-border">
        <li class="coupon-contents-details-list-item">
            <h6 class="coupon-title"> {{__('Total Amount')}} </h6> <span class="coupon-price fw-500 color-heading"> {{site_currency_symbol().$total}} </span>
        </li>
    </ul>
    <div class="btn-wrapper mt-3">
        <a href="{{route('tenant.shop.checkout')}}" class="cmn-btn cmn-btn-bg-2 w-100 radius-0"> {{__('Proceed to Checkout')}} </a>
    </div>
</div>
