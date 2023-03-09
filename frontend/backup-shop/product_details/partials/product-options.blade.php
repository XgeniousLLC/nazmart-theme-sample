<div class="single-shop-details-wrapper">
    @if($campaign_product !== null && $campaign_product->status !== 'draft')
        <div class="campaign_countdown_wrapper mb-5">
            <h3 class="text-capitalize text-start mb-3">{{$campaign_name}}</h3>

            @if($is_expired)
                <div class="global-timer"></div>
            @else
                <div class="text-capitalize alert alert-warning">
                    <h5>{{__('The Campaign is over or not yet started')}}</h5>
                </div>
            @endif
        </div>
    @endif

    <div class="name_badge">
        <h2 class="details-title"> {{$product->name}}
            @if(!empty($product->badge))
                <span class="global-card-thumb-badge-box global-card-thumb-badge-box-product-details  bg-color-new "> {{$product?->badge?->name}} </span>
            @endif
        </h2>
    </div>

    {!! render_product_star_rating_markup_with_count($product) !!}
    <div class="status-details d-flex align-items-center mt-4">
        <span class="status-details-title fw-500 me-5"> {{__('Status')}} </span>
        <a id="{{ $quickView ? "quick_view_" : "" }}stock" href="javascript:void(0)"
           data-stock-text='{!! $stock_count > 0 ? '<span class="text-success">'.__('In Stock').'</span>' : '<span class="text-danger">'.__('Out of Stock').'</span>' !!}'
           class="status-details-title color-stock fw-600"> {!! $stock_count > 0 ? '<span class="text-success">'.__('In Stock').'</span>' : '<span class="text-danger">'.__('Out of Stock').'</span>' !!} </a>
    </div>

    <div class="price-update-through mt-4">
        <h3 class="ff-rubik flash-prices"
            data-main-price="{{ $sale_price }}"
            data-currency-symbol="{{ site_currency_symbol() }}"
            id="{{ $quickView ? "quick-view-price" : "price" }}"
        > {{amount_with_currency_symbol($sale_price)}} </h3>
        <span
            class="fs-22 flash-old-prices"> {{$deleted_price != null ? amount_with_currency_symbol($deleted_price) : ''}} </span>
    </div>

    <div class="value-input-area">
        @if($productSizes->count() > 0 && !empty(current(current($productSizes))))
            <div
                class="value-input-area single-input-list mt-4 size_list  {{ $quickView ? "quick-view-value-input-area" : "" }}">
                    <span class="input-title fw-500 color-heading">
                        <strong class="color-light"> {{ __('Size:') }} </strong>
                        <input readonly class="form--input value-size" name="size" type="text" value="">
                        <input type="hidden" id="selected_size">
                    </span>
                <ul class="size-lists select-list {{ $quickView ? "quick-view-size-lists" : "" }}" data-type="Size">
                    @foreach($productSizes as $product_size)
                        @if(!empty($product_size))
                            <li class="list"
                                data-value="{{ optional($product_size)->id }}"
                                data-display-value="{{ optional($product_size)->name }}"
                            > {{ optional($product_size)->size_code }} </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif

        @if($productColors->count() > 0 && current(current($productColors)))
            <div
                class="value-input-area single-input-list mt-4 color_list  {{ $quickView ? "quick-view-value-input-area" : "" }}">
                    <span class="input-title fw-500 color-heading">
                        <strong class="color-light"> {{ __('Color:') }} </strong>
                        <input readonly class="form--input value-size" name="color" type="text" value="">
                        <input type="hidden" id="selected_color">
                    </span>
                <ul class="size-lists color-list {{ $quickView ? "quick-view-size-lists" : "" }}" data-type="Color">
                    @foreach($productColors as $product_color)
                        @if(!empty($product_color))
                            <li style="background-color: {{$product_color->color_code}}"
                                data-value="{{ optional($product_color)->id }}"
                                data-display-value="{{ optional($product_color)->name }}"
                            ></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif


        @foreach($available_attributes as $attribute => $options)
            <div
                class="value-input-area single-input-list mt-4 attribute_options_list  {{ $quickView ? "quick-view-value-input-area" : "" }}">
                        <span class="input-title fw-500 color-heading input-list">
                            <strong class="color-light"> {{ $attribute }} </strong>
                            <input readonly class="form--input value-size" type="text" value="">
                            <input type="hidden" id="selected_attribute_option" name="selected_attribute_option">
                        </span>
                <ul class="size-lists {{ $quickView ? "quick-view-size-lists" : "" }}" data-type="{{ $attribute }}">
                    @foreach($options as $option)
                        <li class="list"
                            data-value="{{ $option }}"
                            data-display-value="{{ $option }}"
                        > {{ $option }} </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

    <div class="quantity-area mt-4">
        <div class="quantity-flex">
            <span class="quantity-title color-heading fw-500"> {{__('Quantity:')}} </span>
            <div class="product-quantity">
                <span class="{{ $quickView ? "quick-view-" : "" }}substract  substract"><i
                        class="las la-minus"></i></span>
                <input class="{{ $quickView ? "quick-view-" : "" }}quantity-input quantity-input qty_" type="number"
                       id="{{ $quickView ? "quick-view-" : "" }}quantity" name="quantity" value="1">
                <span class="{{ $quickView ? "quick-view-" : "" }}plus plus"><i class="las la-plus"></i></span>
            </div>

            @php
                if ($product?->inventory?->stock_count > 0)
                    {
                        $text_color = 'text-success';
                        $text = __('Only!').' '.$product?->inventory?->stock_count.' '.__('Item Left');
                    } else {
                        $text_color = 'text-danger';
                        $text = __('No Item Left!');
                    }
            @endphp
            <a class="stock-available color-stock {{$text_color}}" href="javascript:void(0)"
               id="{{ $quickView ? "quick_view_" : "" }}item_left" data-stock-text="{{$text}}"> {{$text}} </a>
        </div>
        <div class="quantity-btn mt-4">
            <div class="btn-wrapper">
                <a href="javascript:void(0)"
                   class="{{ $quickView ? "quick_view_add_to_cart" : "add_to_cart_single_page" }} cmn-btn cmn-btn-bg-heading radius-0 w-100 cart-loading">{{__('Add to Cart')}} </a>
            </div>
            <div class="btn-wrapper">
                <a href="javascript:void(0)"
                   class="{{ $quickView ? "quick_view_but_now" : "but_now_single_page" }}  cmn-btn cmn-btn-bg-steam radius-0 w-100 cart-loading"> {{__('Buy Now')}} </a>
            </div>
        </div>
    </div>
    <div class="wishlist-compare mt-4">
        <div class="wishlist-compare-btn">
            <a href="javascript:void(0)"
               class="{{ $quickView ? "quick_view_add_to_wishlist" : "add_to_wishlist_single_page" }} btn-wishlist share-icon fw-500">
                <span class="icon">
                    <i class="lar la-heart"></i>
                </span>
            </a>
            <a href="javascript:void(0)"
               class="btn-wishlist share-icon fw-500 {{ $quickView ? "quick-view-" : "" }}compare-btn"
               data-product_id="{{$product->id}}"
               data-bs-toggle="tooltip"
               data-bs-placement="top"
               title="{{__('Add to Compare')}}">
                    <span class="icon">
                        <i class="las la-retweet"></i>
                    </span>
            </a>
        </div>
        <div class="wishlist-share social_share_parent">
            <a href="javascript:void(0)" class="share-icon fw-500">
                    <span class="icon">
                        <i class="las la-share-alt"></i>
                    </span>
            </a>

            @php
                $product_primary_image = get_attachment_image_by_id($product->image_id);
                $product_primary_image = $product_primary_image ? $product_primary_image['img_url'] : '';
            @endphp
            <ul class="social_share_wrapper_item">
                {!! single_post_share($product->slug, $product->name, $product_primary_image) !!}
            </ul>
        </div>
    </div>
    <div class="shop-details-stock shop-border-top pt-4 mt-4">
        <ul class="stock-category">
            <li class="category-list">
                <span class="list-item fw-600">
                    <a href="{{route('tenant.shop.category.products', ['category' ,$product?->category?->slug])}}">{{$product?->category?->name}}</a>
                    |
                    <a href="{{route('tenant.shop.category.products', ['subcategory' ,$product?->subCategory?->slug])}}">{{$product?->subCategory?->name}}</a>
                    |
                    @foreach($product->childCategory ?? [] as $child_category)
                        <a href="{{route('tenant.shop.category.products', ['child-category' ,$child_category?->slug])}}"> {{$child_category->name}} </a>

                        @if(!$loop->last)
                            ,
                        @endif
                    @endforeach
                </span>
            </li>
            @if($product->uom != null)
                <li class="category-list">
                    <span> {{__('Unit:')}} </span>
                    <a class="list-item fw-600" href="javascript:void(0)">
                        <span>{{$product?->uom?->quantity}}</span>
                        <span>{{$product?->uom?->uom_details?->name}}</span>
                    </a>
                </li>
            @endif
            <li class="category-list">
                <span> {{__('SKU:')}} </span>
                <a class="list-item fw-600" href="javascript:void(0)"> {{$product?->inventory?->sku}} </a>
            </li>
        </ul>
        <div class="delivery-options delivery-parent mt-4">
            @if($product->product_delivery_option != null)
                @foreach($product->product_delivery_option as $option)
                    <div class="delivery-item d-flex">
                        <div class="icon">
                            <i class="{{ $option->icon }}"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">{{ $option->title }}</h6>
                            <p>{{ $option->sub_title }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="details-checkout-shop shop-border-top pt-4 mt-4">
            <span class="guaranteed-checkout fw-500 color-heading"> {{__('Guaranteed Safe Checkout')}} </span>
            <ul class="payment-list mt-3">
                <li class="single-list">
                    <a href="javascript:void(0)"> <img src="{{global_asset('assets/img/single-page/payment1.png')}}"
                                                       alt=""> </a>
                </li>
                <li class="single-list">
                    <a href="javascript:void(0)"> <img src="{{global_asset('assets/img/single-page/payment2.png')}}"
                                                       alt=""> </a>
                </li>
                <li class="single-list">
                    <a href="javascript:void(0)"> <img src="{{global_asset('assets/img/single-page/payment3.png')}}"
                                                       alt=""> </a>
                </li>
                <li class="single-list">
                    <a href="javascript:void(0)"> <img src="{{global_asset('assets/img/single-page/payment4.png')}}"
                                                       alt=""> </a>
                </li>
            </ul>
        </div>
    </div>
</div>
