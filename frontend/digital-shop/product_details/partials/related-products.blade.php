<div class="col-xxl-4 col-lg-5">
    <div class="related-books-wrapper">
        <h3 class="related-books-title"> {{__('Related Books')}} </h3>
        <div class="single-related-books-inner mt-5">
            @foreach($related_products as $product)
                @php
                    $dynamic_discount = get_digital_product_dynamic_price($product);

                    $regular_price = $product->regular_price;
                    $sale_price = $product->sale_price;

                    if (!is_null($product->promotional_date) && !is_null($product->promotional_price))
                    {
                        $sale_price = $product->promotional_price;
                    }
                @endphp

                <div class="single-related-books mt-4">
                    <div class="single-upcoming upcoming-padding-top">
                        <div class="single-upcoming-wrapper bg-white">
                            <div class="single-upcoming-contents">

                                @if($dynamic_discount['discount'] > 0)
                                    <div class="global-badge">
                                        <span class="global-badge-box"> {{$dynamic_discount['discount']}}% {{__('off')}} </span>
                                    </div>
                                @endif

                                @if(!empty($product->additionalFields?->badge_id))
                                    <div class="global-badge">
                                        <span class="global-badge-box bg-new"> {{$product->additionalFields?->badge?->name}} </span>
                                    </div>
                                @endif

                                <div class="single-upcoming-thumb">
                                    <a href="{{route('tenant.digital.shop.product.details', $product->slug)}}">
                                        {!! render_image_markup_by_attachment_id($product->image_id, 'product-image') !!}
                                    </a>
                                </div>
                                <h3 class="single-upcoming-contents-title">
                                    <a href="javascript:void(0)"> {{Str::words($product->name, 4)}} </a>
                                </h3>

                                    @if(!empty($product->additionalFields?->author))
                                        <span class="single-upcoming-contents-subtitle mt-2"> {{__('by')}} <span class="fw-500 color-light">{{$product->additionalFields?->author?->name}}</span></span>
                                    @endif

                                <div class="rating-wrap mt-2">
                                    {!! render_product_star_rating_markup_with_count($product) !!}
                                </div>
                            </div>
                            <div class="single-upcoming-bottom bottom-border-top">
                                <div class="single-upcoming-bottom-flex d-flex align-items-center">
                                    <div class="price-update-through">
                                        @if($product->accessibility != 'free')
                                            @if(!empty($sale_price) && $sale_price > 0)
                                                <span class="flash-prices color-one"> {{float_amount_with_currency_symbol($sale_price)}} </span>
                                                <span class="flash-old-prices"> {{float_amount_with_currency_symbol($regular_price)}} </span>
                                            @else
                                                <span class="flash-prices color-one"> {{float_amount_with_currency_symbol($regular_price)}} </span
                                           @endif
                                        @else
                                            <span class="flash-prices color-one"> {{__('Free')}} </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
