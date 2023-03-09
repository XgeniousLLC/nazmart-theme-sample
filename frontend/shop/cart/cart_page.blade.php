@extends(route_prefix().'frontend.frontend-page-master')

@php
    $page_title = $wishlist ? "Wishlist" : "Cart";
    $theme_slug = \App\Facades\ThemeDataFacade::getSelectedThemeSlug();
@endphp

@section('title')
    {{__(sprintf('%s Page', $page_title))}}
@endsection

@section('page-title')
    {{__(sprintf('%s Page', $page_title))}}
@endsection

@section("style")
    <style>
        .table-list-content .custom--table tbody tr td:last-child {
            height: 150px;
            padding-right: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="cart-main-wrapper">
        @if($cart_data->count())
            <!-- Cart Area Starts -->
            <div class="cart-area padding-top-75 padding-bottom-100">
                <div class="container container-one">
                    <div class="row">
                        @include(include_theme_path('shop.cart.partials.cart_left_contents'))

                        @if(!$wishlist)
                            @include(include_theme_path('shop.cart.partials.cart_right_contents'))
                        @endif
                    </div>
                </div>
            </div>
            <!-- Cart Area end -->
        @else
            <!-- 404 Area Starts -->
            @include(include_theme_path('shop.cart.cart_empty'))
            <!-- 404 Area end -->
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        (function ($) {
            'use strict'

            $(document).on('change', '.quantity-input', function (e) {
                let el = $(this);
                let product_qty = el.val();
                let product_unique_id = el.closest('[data-product-id]').data('product-id');
                let product_variant_id = el.closest('[data-variant-id]').data('product-variant-id');

                getSubtotal(product_unique_id, product_qty, product_variant_id)
            });

            /* ========================================
                        Product Quantity JS
            ========================================*/

            $(document).on('click', '.plus', function () {
                let selectedInput = $(this).prev('.quantity-input');

                if (selectedInput.val()) {
                    selectedInput[0].stepUp(1);

                    let el = $(this);
                    let product_qty = el.parent().find('.quantity-input').val();
                    let product_unique_id = el.closest('[data-product-id]').data('product-id');
                    let product_variant_id = el.closest('[data-variant-id]').data('product-variant-id');

                    getSubtotal(product_unique_id, product_qty, product_variant_id)
                }
            });

            $(document).on('click', '.substract', function () {
                let selectedInput = $(this).next('.quantity-input');
                if (selectedInput.val() > 1) {
                    selectedInput[0].stepDown(1);

                    let el = $(this);
                    let product_qty = el.parent().find('.quantity-input').val();
                    let product_unique_id = el.closest('[data-product-id]').data('product-id');
                    let product_variant_id = el.closest('[data-variant-id]').data('product-variant-id');

                    getSubtotal(product_unique_id, product_qty, product_variant_id)
                }
            });

            $(document).on('click', '.clear-cart-btn', function (){
                $('.loader').show();

                setTimeout(() => {
                    $(location).attr('href', '{{route('tenant.shop.cart.clear.ajax')}}');
                }, 300)
            });

            $(document).on('click', '.ff-jost .close-table-cart', function (e){
                let el = $(this);
                let product_hash_id = el.parent().data('product_hash_id');

                $.ajax({
                    url: '{{route('tenant.shop.cart.remove.product.ajax')}}',
                    type: 'GET',
                    data: {
                        'product_hash_id': product_hash_id,
                    },
                    beforeSend: function (){
                        $('.loader').show();
                    },
                    success: function (data){
                        if (data.msg)
                        {
                            toastr.success(data.msg);
                            if (data.empty_cart !== '')
                            {
                                $('.cart-main-wrapper').html(data.empty_cart).hide();
                                $('.cart-main-wrapper').fadeIn();
                            }

                            $('.coupon-contents').parent().load(location.href + " .coupon-contents");

                            $('.track-icon-list').load(location.href + " .track-icon-list");
                            $('.custom--table.table-border.radius-10').parent().load(location.href + " .custom--table.table-border.radius-10");
                        }

                        $('.loader').hide();
                    },
                    error: function (data){

                    }
                })
            });

            $(document).on('click', '.ff-jost .close-table-wishlist', function (e){
                let el = $(this);
                let product_hash_id = el.parent().data('product_hash_id');

                $.ajax({
                    url: '{{route('tenant.shop.wishlist.remove.product.ajax')}}',
                    type: 'GET',
                    data: {
                        'product_hash_id': product_hash_id,
                    },
                    beforeSend: function (){
                        $('.loader').show();
                    },
                    success: function (data){
                        if (data.msg)
                        {
                            toastr.success(data.msg);
                            if (data.empty_cart !== '')
                            {
                                $('.cart-main-wrapper').html(data.empty_cart).hide();
                                $('.cart-main-wrapper').fadeIn();
                            }


                            $('.track-icon-list').load(location.href + " .track-icon-list");
                            $('.custom--table.table-border.radius-10').parent().load(location.href + " .custom--table.table-border.radius-10");
                        }

                        $('.loader').hide();
                    },
                    error: function (data){

                    }
                })
            });

            $(document).on('click', '.ff-jost .move-to-wishlist', function (e){
                let el = $(this);
                let product_hash_id = el.parent().data('product_hash_id');

                $.ajax({
                    url: '{{route('tenant.shop.wishlist.move.product.ajax')}}',
                    type: 'GET',
                    data: {
                        'product_hash_id': product_hash_id,
                    },
                    beforeSend: function (){
                        $('.loader').show();
                    },
                    success: function (data){
                        if (data.msg) {
                            toastr.success(data.msg);
                            if (data.empty_cart !== '') {
                                $('.cart-main-wrapper').html(data.empty_cart).hide();
                                $('.cart-main-wrapper').fadeIn();
                            }

                            $('.track-icon-list').load(location.href + " .track-icon-list");
                            $('.custom--table.table-border.radius-10').parent().load(location.href + " .custom--table.table-border.radius-10");
                        }

                        $('.loader').hide();
                    },
                    error: function (data){

                    }
                })
            });

            function getSubtotal(productId, qty, variantId)
            {
                let product_id = productId;
                let quantity = qty;
                let variant_id = variantId;
                let route = '{{route('tenant.shop.cart.update.ajax')}}';

                sendAjaxRequest(product_id, quantity, variant_id, route, 'GET');
            }

            function sendAjaxRequest(productId, qty , variant_id,url, type)
            {
                $.ajax({
                    url: url,
                    type: type,
                    data: {
                        'product_id': productId,
                        'quantity': qty,
                        'variant_id': variant_id
                    },
                    beforeSend: function (){
                        $('.loader').show();
                    },
                    success: function (data){
                        if (data.type === 'success')
                        {
                            toastr.success(data.msg);
                            $('#cart_tbody').html(data.markup);
                            $('.coupon-contents').html(data.cart_price_markup);
                        }
                        else if(data.quantity_msg)
                        {
                            toastr.warning(data.quantity_msg);
                        }

                        $('.loader').hide();
                    },
                    error: function (data){
                        $('.loader').hide();
                    }
                })
            }
        })(jQuery)
    </script>
@endsection
