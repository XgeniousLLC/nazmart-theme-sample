@extends(route_prefix().'frontend.frontend-page-master')

@section('title')
    {!!  $product->name !!}
@endsection

@section('page-title')
    {!! $product->name !!}
@endsection

@section('meta-data')
    {!! render_page_meta_data($product) !!}
@endsection

@section('style')
    <link rel="stylesheet" href="{{global_asset('assets/common/css/star-rating.min.css')}}">

    <style>
        :root {
            --gl-star-size: 35px;
            --gl-tooltip-border-radius: 4px;
            --gl-tooltip-font-size: 0.875rem;
            --gl-tooltip-font-weight: 400;
            --gl-tooltip-line-height: 1;
            --gl-tooltip-margin: 12px;

            --gl-tooltip-padding: .3em 1em;
            --gl-tooltip-size: 6px;
        }

        .gl-star-rating--stars span{
            margin-right: 5px !important;
        }

        .campaign_countdown_wrapper {
            text-align: center;
            z-index: 95;
        }
        .campaign_countdown_wrapper .global-timer .syotimer__body {
            gap: 10px 15px;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }
        .campaign_countdown_wrapper .global-timer .syotimer__body .syotimer-cell {
            background-color: rgba(var(--main-color-two-rgb), .1);
            padding: 10px 20px;
            min-width: 100px;
        }

        @media (min-width: 1400px) and (max-width: 1599.98px) {
            .campaign_countdown_wrapper .global-timer .syotimer__body {
                gap: 10px;
            }
        }
        @media (min-width: 1200px) and (max-width: 1399.98px) {
            .campaign_countdown_wrapper .global-timer .syotimer__body {
                gap: 10px;
            }
        }
        @media (min-width: 992px) and (max-width: 1199.98px) {
            .campaign_countdown_wrapper .global-timer .syotimer__body {
                gap: 10px;
            }
        }
        @media (min-width: 300px) and (max-width: 991.98px) {
            .campaign_countdown_wrapper .global-timer .syotimer__body {
                gap: 10px;
            }
        }
        .campaign_countdown_wrapper .global-timer .syotimer__body .syotimer-cell .syotimer-cell__value {
            font-size: 32px;
            line-height: 36px;
        }
        @media (min-width: 1400px) and (max-width: 1599.98px) {
            .campaign_countdown_wrapper .global-timer .syotimer__body .syotimer-cell .syotimer-cell__value {
                font-size: 28px;
            }
        }
        @media (min-width: 1200px) and (max-width: 1399.98px) {
            .campaign_countdown_wrapper .global-timer .syotimer__body .syotimer-cell .syotimer-cell__value {
                font-size: 28px;
            }
        }
        @media (min-width: 992px) and (max-width: 1199.98px) {
            .campaign_countdown_wrapper .global-timer .syotimer__body .syotimer-cell .syotimer-cell__value {
                font-size: 28px;
            }
        }
        @media (min-width: 300px) and (max-width: 991.98px) {
            .campaign_countdown_wrapper .global-timer .syotimer__body .syotimer-cell .syotimer-cell__value {
                font-size: 28px;
            }
        }
        .campaign_countdown_wrapper .global-timer .syotimer__body .syotimer-cell .syotimer-cell__unit {
            font-size: 18px;
            line-height: 28px;
        }
        @media (min-width: 1400px) and (max-width: 1599.98px) {
            .campaign_countdown_wrapper .global-timer .syotimer__body .syotimer-cell .syotimer-cell__unit {
                font-size: 16px;
            }
        }
        @media (min-width: 1200px) and (max-width: 1399.98px) {
            .campaign_countdown_wrapper .global-timer .syotimer__body .syotimer-cell .syotimer-cell__unit {
                font-size: 16px;
            }
        }
        @media (min-width: 992px) and (max-width: 1199.98px) {
            .campaign_countdown_wrapper .global-timer .syotimer__body .syotimer-cell .syotimer-cell__unit {
                font-size: 16px;
            }
        }
        @media (min-width: 300px) and (max-width: 991.98px) {
            .campaign_countdown_wrapper .global-timer .syotimer__body .syotimer-cell .syotimer-cell__unit {
                font-size: 16px;
            }
        }
    </style>
@endsection

{{--@section('content')--}}
{{--    @php--}}
{{--        $data = get_product_dynamic_price($product);--}}
{{--        $campaign_name = $data['campaign_name'];--}}
{{--        $data_regular_price = $data['regular_price'];--}}
{{--        $data_sale_price = $data['sale_price'];--}}
{{--        $discount = $data['discount'];--}}

{{--         $campaign_product = $product?->campaign_product;--}}
{{--         $sale_price = $data_sale_price;--}}
{{--         $deleted_price = $data_regular_price;--}}
{{--         $campaign_percentage = $discount;--}}
{{--         $campaignSoldCount = \Modules\Campaign\Entities\CampaignSoldProduct::where("product_id",$product->id)->first();--}}

{{--         // todo remove it if manage it from inventory from listener--}}
{{--         $stock_count = $campaign_product ? $product?->campaign_product?->units_for_sale - optional($campaignSoldCount)->sold_count ?? 0 : optional($product->inventory)->stock_count;--}}
{{--         $stock_count = $stock_count > 0 ? $stock_count : 0;--}}

{{--         if($campaign_product){--}}
{{--             $campaign_title = \Modules\Campaign\Entities\Campaign::select('id','title')->where("id",$campaign_product?->id)->first();--}}
{{--             $is_expired = $data['is_expired'];--}}
{{--         }--}}

{{--         $quickView = false;--}}
{{--    @endphp--}}

{{--        <!-- Shop Details area end -->--}}
{{--    <section class="shop-details-area padding-top-100 padding-bottom-50">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                @include(include_theme_path('shop.product_details.partials.product-images-slider'))--}}
{{--                <div class="col-lg-6">--}}
{{--                    @include(include_theme_path('shop.product_details.partials.product-options'))--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- Shop Details area end -->--}}

{{--    <!-- Shop Details tab area starts -->--}}
{{--    <section class="tab-details-tab-area padding-top-50 padding-bottom-50">--}}
{{--        <div class="container container-two">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="details-tab-wrapper">--}}
{{--                        <ul class="tabs details-tab details-tab-border">--}}
{{--                            <li class="active" data-tab="description"> {{__('Description')}} </li>--}}
{{--                            <li class="ff-jost" data-tab="reviews"> {{__('Reviews')}} </li>--}}
{{--                            <li class="ff-jost" data-tab="ship_return"> {{__('Ship & Return')}} </li>--}}
{{--                        </ul>--}}

{{--                        @include(include_theme_path('shop.product_details.partials.product-description'))--}}
{{--                        @include(include_theme_path('shop.product_details.partials.product-reviews'))--}}
{{--                        @include(include_theme_path('shop.product_details.partials.product-ship_return'))--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- Shop Details tab area end -->--}}

{{--    <!-- Featured area starts -->--}}
{{--    @include(include_theme_path('shop.product_details.partials.featured-product'))--}}
{{--    <!-- Featured area end -->--}}
{{--@endsection--}}

@section('content')
    <!-- Book Details Area Starts -->
    <section class="bookdetails-area section-bg-2 padding-top-100 padding-bottom-50">
        <div class="container custom-container-one">
            <div class="book-details-wrapper">
                <div class="book-details-wrapper-flex">
                    <!-- Book details Area start -->
                    @include(include_theme_path('digital-shop.product_details.partials.details'))
                    <!-- Book details Area start -->

                    <!-- Book sidebar details Area start -->
                    @include(include_theme_path('digital-shop.product_details.partials.details-sidebar'))
                    <!-- Book sidebar details Area start -->
                </div>
            </div>
        </div>
    </section>

    <!-- Book Review Area start -->
    @include(include_theme_path('digital-shop.product_details.partials.description-review'))
    <!-- Book Review Area end -->
@endsection

@section('scripts')
    <script>
        $(function (){
            let starRatingControl = new StarRating('.star-rating', {
                maxStars: 5,
                clearable: false,
                stars: function (el, item, index) {
                    el.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect class="gl-star-full" width="19" height="19" x="2.5" y="2.5"/><polygon fill="#FFF" points="12 5.375 13.646 10.417 19 10.417 14.665 13.556 16.313 18.625 11.995 15.476 7.688 18.583 9.333 13.542 5 10.417 10.354 10.417"/></svg>';
                },
                classNames: {
                    active: 'gl-active',
                    base: 'gl-star-rating',
                    selected: 'rating-selected',
                },
            });

            /*========================================
                        CountDown Timer
            ========================================*/
            @php
                if (!empty($campaign_product) && $is_expired != 0){
                    $end_date = \Carbon\Carbon::parse($campaign_product->end_date);
                }
            @endphp

            let year = '{{$end_date->year ?? 0}}';
            let month = '{{$end_date->month ?? 0}}';
            let day = '{{$end_date->day ?? 0}}';

            $('.global-timer').syotimer({
                year: year,
                month: month,
                day: day,
            });

            $(document).on('click', '.small-img', function (){
                let image = $(this).data('image-path');
                let long_img = $('.long-img img');

                long_img.hide();
                long_img.attr('src', image);
                long_img.fadeIn(100);
            });

            $(document).on('click', '#review-submit-btn', function (e){
                e.preventDefault();

                let product_id = '{{$product->id}}';
                let selected_rating = $('.rating-selected').data('value');
                let review_text = $('#review-text').val();
                let submit_btn_el = $(this);

                $.ajax({
                    url: '{{route('tenant.digital.shop.product.review')}}',
                    type: 'POST',
                    data: {
                        _token: '{{csrf_token()}}',
                        product_id: product_id,
                        review_text: review_text,
                        rating: selected_rating
                    },
                    beforeSend: function (){
                        toastr.warning('{{__('Submitting please wait.')}}', 5000)
                        submit_btn_el.text('{{__('Submitting..')}}');
                    },
                    success: function (data){
                        if (data.type === 'success')
                        {
                            toastr.success(data.msg, 5000)
                            setTimeout(() => {
                                location.reload();
                            }, 300);
                        } else {
                            toastr.error(data.msg, 5000)
                            submit_btn_el.closest('form')[0].reset();
                        }

                        submit_btn_el.text('{{__('Submit Review')}}');
                    },
                    error: function (data){
                        var response = data.responseJSON.errors;
                        $.each(response, function (value, index) {
                            toastr.error(index, 5000)
                        });

                        submit_btn_el.text('{{__('Submit Review')}}');
                    }
                });
            });

            $(document).on('click', '.see-more-review', function (){
                let el = $(this);
                let items = el.attr('data-items');

                $.ajax({
                    url: '{{route('tenant.shop.product.review.more.ajax')}}',
                    type: 'GET',
                    data: {
                        product_id: '{{$product->id}}',
                        items: items,
                    },
                    beforeSend: function (){
                        el.text('{{__('Loading..')}}');
                    },
                    success: function (data){
                        $('.all-reviews').html(data.markup).hide();
                        $('.all-reviews').fadeIn(800);
                        el.text('{{__('See More')}}');

                        el.attr('data-items', Number(items)+5);
                    },
                    error: function (data){
                        el.text('{{__('See More')}}');
                    }
                });
            })

            /* ========================================
                        Product Quantity JS
            ========================================*/

            $(document).on('click', '.plus', function () {
                var selectedInput = $(this).prev('.quantity-input');
                if (selectedInput.val()) {
                    selectedInput[0].stepUp(1);
                }
            });

            $(document).on('click', '.substract', function () {
                var selectedInput = $(this).next('.quantity-input');
                if (selectedInput.val() > 1) {
                    selectedInput[0].stepDown(1);
                }
            });
        });
    </script>

    <script>
        {{--let attribute_store = JSON.parse('{!! json_encode($product_inventory_set) !!}');--}}
        {{--let additional_info_store = JSON.parse('{!! json_encode($additional_info_store) !!}');--}}
        {{--let available_options = $('.value-input-area');--}}
        {{--let selected_variant = '';--}}

        {{--function getAttributesForCart() {--}}
        {{--    let selected_options = get_selected_options();--}}
        {{--    let cart_selected_options = selected_options;--}}
        {{--    let hashed_key = getSelectionHash(selected_options);--}}

        {{--    // if selected attribute set is available--}}
        {{--    if (additional_info_store[hashed_key]) {--}}
        {{--        return additional_info_store[hashed_key]['pid_id'];--}}
        {{--    }--}}

        {{--    // if selected attribute set is not available--}}
        {{--    if (Object.keys(selected_options).length) {--}}
        {{--        toastr.error('{{__('Attribute not available')}}', 5000)--}}
        {{--    }--}}

        {{--    return '';--}}
        {{--}--}}

        {{--function get_selected_options() {--}}
        {{--    let selected_options = {};--}}
        {{--    let available_options = $('.value-input-area');--}}
        {{--    // get all selected attributes in {key:value} format--}}
        {{--    available_options.map(function (k, option) {--}}
        {{--        let selected_option = $(option).find('li.active');--}}
        {{--        let type = selected_option.closest('.size-lists').data('type');--}}
        {{--        let value = selected_option.data('displayValue');--}}

        {{--        if (type && value) {--}}
        {{--            selected_options[type] = value;--}}
        {{--        }--}}
        {{--    });--}}

        {{--    let ordered_data = {};--}}
        {{--    let selected_options_keys = Object.keys(selected_options).sort();--}}
        {{--    selected_options_keys.map(function (e) {--}}
        {{--        ordered_data[e] = selected_options[e];--}}
        {{--    });--}}

        {{--    return ordered_data;--}}
        {{--}--}}

        {{--function getSelectionHash(selected_options) {--}}
        {{--    return MD5(JSON.stringify(selected_options));--}}
        {{--}--}}

        {{--function validateSelectedAttributes() {--}}
        {{--    let selected_options = get_selected_options();--}}
        {{--    let hashed_key = getSelectionHash(selected_options);--}}

        {{--    // validate if product has any attribute--}}
        {{--    if (quick_view_attribute_store.length) {--}}
        {{--        if (!Object.keys(selected_options).length) {--}}
        {{--            return false;--}}
        {{--        }--}}

        {{--        if (!additional_info_store[hashed_key]) {--}}
        {{--            return false;--}}
        {{--        }--}}

        {{--        return !!additional_info_store[hashed_key]['pid_id'];--}}
        {{--    }--}}

        {{--    return true;--}}
        {{--}--}}

        (function ($) {
            'use script'

            $(document).ready(function () {
                $(document).on('click', '#login_submit_btn', function (e) {
                    e.preventDefault();

                    let el = $(this);
                    let username = $('#login_form_order_page input[name=email]').val();
                    let password = $('#login_form_order_page input[name=password]').val();
                    let remember = $('#login_form_order_page input[name=remember]').val();

                    el.text('{{__("Please Wait")}}');

                    $.ajax({
                        type: 'post',
                        url: "{{route('tenant.user.ajax.login')}}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            username: username,
                            password: password,
                            remember: remember,
                        },
                        success: function (data) {
                            if (data.status === 'invalid') {
                                el.text('{{__("Login")}}')
                                toastr.warning(data.msg );
                            } else {
                                el.text('{{__("Login Success.. Redirecting ..")}}');
                                toastr.success(data.msg );

                                setTimeout(() => {
                                    location.reload();
                                }, 300)
                            }
                        },
                        error: function (data) {
                            var response = data.responseJSON.errors;
                            $.each(response, function (value, index) {
                                toastr.error(index);
                            });
                            el.text('{{__("Login")}}');
                        }
                    });
                });
            });
        })(jQuery)

        $(document).on('click', '.add_to_cart_single_page', function (e) {
            e.preventDefault();

            let product_id = '{{$product->id}}';

            $.ajax({
                    url: '{{ route("tenant.digital.shop.product.add.to.cart.ajax") }}',
                    type: 'POST',
                    data: {
                        product_id: product_id,
                        _token: '{{ csrf_token() }}'
                    },
                    beforeSend: function () {

                    },
                    success: function (data) {
                        if (data.quantity_msg)
                        {
                            toastr.warning(data.quantity_msg);
                        }
                        else if(data.error_msg)
                        {
                            toastr.error(data.error_msg);
                        }
                        else
                        {
                            toastr.success(data.msg, '{{__('Go to Cart')}}', '#', 60000);
                            $('.track-icon-list').hide();
                            $('.track-icon-list').load(location.href + " .track-icon-list");
                            $('.track-icon-list').fadeIn();
                        }
                    },
                    erorr: function (err) {
                        toastr.error('{{ __("An error occurred") }}')
                    }
                });
        });

        $(document).on('click', '.add_to_wishlist_single_page', function (e) {
            e.preventDefault();

            let has_campaign = '{{empty($campaign_product) ? 0 : 1}}';
            let campaign_expired = '{{isset($is_expired) ? $is_expired : 0}}';

            if(has_campaign == 1)
            {
                if (campaign_expired == 0)
                {
                    toastr.error('{{__('The campaign is over, Sorry! you can not cart this product')}}');
                    return false;
                }
            }

            let selected_size = $('#selected_size').val();
            let selected_color = $('#selected_color').val();

            let pid_id = getAttributesForCart();

            let product_id = '{{$product->id}}';
            let quantity = Number($('#quantity').val().trim());
            let price = $('#price').text().split(site_currency_symbol)[1];
            let attributes = {};
            let product_variant = pid_id;
            let productAttribute = selected_variant;

            attributes['price'] = price;

            // if selected attribute is a valid product item
            if (validateSelectedAttributes()) {
                $.ajax({
                    url: '{{ route("tenant.shop.product.add.to.wishlist.ajax") }}',
                    type: 'POST',
                    data: {
                        product_id: product_id,
                        quantity: quantity,
                        pid_id: pid_id,
                        product_variant: product_variant,
                        selected_size: selected_size,
                        selected_color: selected_color,
                        _token: '{{ csrf_token() }}'
                    },
                    beforeSend: function () {

                    },
                    success: function (data) {
                        if (data.quantity_msg)
                        {
                            toastr.warning(data.quantity_msg);
                        }
                        else if(data.error_msg)
                        {
                            toastr.error(data.error_msg);
                        }
                        else
                        {
                            toastr.success(data.msg, '{{__('Go to Cart')}}', '#', 60000);
                            $('.track-icon-list').load(location.href + " .track-icon-list");
                        }
                    },
                    erorr: function (err) {
                        toastr.error('{{ __("An error occurred") }}')
                    }
                });
            } else {
                toastr.error('{{ __("Select all attribute to proceed") }}')
            }
        });


        $(document).on('click', '.compare-btn', function (e) {
            e.preventDefault();

            let has_campaign = '{{empty($campaign_product) ? 0 : 1}}';
            let campaign_expired = '{{isset($is_expired) ? $is_expired : 0}}';

            if(has_campaign == 1)
            {
                if (campaign_expired == 0)
                {
                    toastr.error('{{__('The campaign is over, Sorry! you can not cart this product')}}');
                    return false;
                }
            }

            let selected_size = $('#selected_size').val();
            let selected_color = $('#selected_color').val();

            let pid_id = getAttributesForCart();

            let product_id = '{{$product->id}}';
            let quantity = Number($('#quantity').val().trim());
            let price = $('#price').text().split(site_currency_symbol)[1];
            let attributes = {};
            let product_variant = pid_id;
            let productAttribute = selected_variant;

            attributes['price'] = price;

            // if selected attribute is a valid product item
            if (validateSelectedAttributes()) {
                $.ajax({
                    url: '{{ route("tenant.shop.product.add.to.compare.ajax") }}',
                    type: 'POST',
                    data: {
                        product_id: product_id,
                        quantity: quantity,
                        pid_id: pid_id,
                        product_variant: product_variant,
                        selected_size: selected_size,
                        selected_color: selected_color,
                        _token: '{{ csrf_token() }}'
                    },
                    beforeSend: function () {

                    },
                    success: function (data) {
                        if (data.quantity_msg)
                        {
                            toastr.warning(data.quantity_msg);
                        }
                        else if(data.error_msg)
                        {
                            toastr.error(data.error_msg);
                        }
                        else
                        {
                            toastr.success(data.msg, '{{__('Go to Cart')}}', '#', 60000);
                            $('.track-icon-list').load(location.href + " .track-icon-list");
                        }
                    },
                    erorr: function (err) {
                        toastr.error('{{ __("An error occurred") }}')
                    }
                });
            } else {
                toastr.error('{{ __("Select all attribute to proceed") }}')
            }
        });

        $(document).on('click', '.but_now_single_page', function (e) {
            e.preventDefault();

            let has_campaign = '{{empty($campaign_product) ? 0 : 1}}';
            let campaign_expired = '{{isset($is_expired) ? $is_expired : 0}}';

            if(has_campaign == 1)
            {
                if (campaign_expired == 0)
                {
                    toastr.error('{{__('The campaign is over, Sorry! you can not cart this product')}}');
                    return false;
                }
            }

            let selected_size = $('#selected_size').val();
            let selected_color = $('#selected_color').val();

            let pid_id = getAttributesForCart();

            let product_id = '{{$product->id}}';
            let quantity = Number($('#quantity').val().trim());
            let price = $('#price').text().split(site_currency_symbol)[1];
            let attributes = {};
            let product_variant = pid_id;
            let productAttribute = selected_variant;

            attributes['price'] = price;

            // if selected attribute is a valid product item
            if (validateSelectedAttributes()) {
                $.ajax({
                    url: '{{ route("tenant.shop.product.buy.now.ajax") }}',
                    type: 'POST',
                    data: {
                        product_id: product_id,
                        quantity: quantity,
                        pid_id: pid_id,
                        product_variant: product_variant,
                        selected_size: selected_size,
                        selected_color: selected_color,
                        _token: '{{ csrf_token() }}'
                    },
                    beforeSend: function () {

                    },
                    success: function (data) {
                        if (data.quantity_msg)
                        {
                            toastr.warning(data.quantity_msg, 5000);
                        }
                        else if(data.error_msg)
                        {
                            toastr.error(data.error_msg, 5000);
                        }

                        if(data.type === 'success')
                        {
                            toastr.success(data.msg);
                            setTimeout(()=>{
                                location.href = data.redirect;
                            }, 2000)
                        }
                    },
                    erorr: function (err) {
                        toastr.error('{{ __("An error occurred") }}', 5000)
                    }
                });
            } else {
                toastr.error('{{ __("Select all attribute to proceed") }}', 5000)
            }
        });
    </script>
@endsection
