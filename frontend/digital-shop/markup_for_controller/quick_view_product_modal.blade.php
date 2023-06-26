@php
    $data = get_product_dynamic_price($product);
    $campaign_name = $data['campaign_name'];
    $data_regular_price = $data['regular_price'];
    $data_sale_price = $data['sale_price'];
    $discount = $data['discount'];

     $campaign_product = $product?->campaign_product;
     $sale_price = $data_sale_price;
     $deleted_price = $data_regular_price;
     $campaign_percentage = $discount;
     $campaignSoldCount = \Modules\Campaign\Entities\CampaignSoldProduct::where("product_id",$product->id)->first();

     // todo remove it if manage it from inventory from listener
     $stock_count = $campaign_product ? $product?->campaign_product?->units_for_sale - optional($campaignSoldCount)->sold_count ?? 0 : optional($product->inventory)->stock_count;
     $stock_count = $stock_count > 0 ? $stock_count : 0;
     if($campaign_product){
         $campaign_title = \Modules\Campaign\Entities\Campaign::select('id','title')->where("id",$campaign_product?->id)->first();
     }
@endphp

<div class="col-lg-6 col-xl-6">
    <div class="single-shop-details-wrapper">
        <h2 class="details-title"> {{$product->name}} </h2>
        {!! render_product_star_rating_markup_with_count($product) !!}
        <div class="status-details d-flex align-items-center mt-4">
            <span class="status-details-title fw-500 me-5"> {{__('Status')}} </span>
            <a id="stock" href="javascript:void(0)"
               class="status-details-title color-stock fw-600"> {!! $stock_count > 0 ? '<span class="text-success">'.__('In Stock').'</span>' : '<span class="text-danger">'.__('Out of Stock').'</span>' !!} </a>
        </div>

        <div class="price-update-through mt-4">
            <h3 class="ff-rubik flash-prices"
                data-main-price="{{ $sale_price }}"
                data-currency-symbol="{{ site_currency_symbol() }}"
                id="price"
            > {{amount_with_currency_symbol($sale_price)}} </h3>
            <span
                class="fs-22 flash-old-prices"> {{$deleted_price != null ? amount_with_currency_symbol($deleted_price) : ''}} </span>
        </div>

        <div class="value-input-area">
            @if($productSizes->count() > 0 && !empty(current(current($productSizes))))
                <div class="value-input-area single-input-list mt-4 size_list">
                    <span class="input-title fw-500 color-heading">
                        <strong class="color-light"> {{ __('Size:') }} </strong>
                        <input readonly class="form--input value-size" name="size" type="text" value="">
                        <input type="hidden" id="selected_size">
                    </span>
                    <ul class="size-lists select-list" data-type="Size">
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
                <div class="value-input-area single-input-list mt-4 color_list">
                    <span class="input-title fw-500 color-heading">
                        <strong class="color-light"> {{ __('Color:') }} </strong>
                        <input readonly class="form--input value-size" name="color" type="text" value="">
                        <input type="hidden" id="selected_color">
                    </span>
                    <ul class="size-lists color-list select-list" data-type="Color">
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
                <div class="value-input-area single-input-list mt-4 attribute_options_list">
                        <span class="input-title fw-500 color-heading input-list">
                            <strong class="color-light"> {{ $attribute }} </strong>
                            <input readonly class="form--input value-size" type="text" value="">
                            <input type="hidden" id="selected_attribute_option" name="selected_attribute_option">
                        </span>
                    <ul class="size-lists" data-type="{{ $attribute }}">
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
                    <span class="substract"><i class="las la-minus"></i></span>
                    <input class="quantity-input qty_" type="number" id="quantity" name="quantity" value="1">
                    <span class="plus"><i class="las la-plus"></i></span>
                </div>
                <a class="stock-available color-stock text-success" href="javascript:void(0)" id="item_left"> {{__('Only!').' '}} {{$product?->inventory?->stock_count}} {{__('Item left')}} </a>
            </div>
            <div class="quantity-btn mt-4">
                <div class="btn-wrapper">
                    <a href="javascript:void(0)" class="add_to_cart_single_page cmn-btn cmn-btn-bg-heading radius-0 w-100 cart-loading">{{__('Add to Cart')}} </a>
                </div>
                <div class="btn-wrapper">
                    <a href="javascript:void(0)" class="cmn-btn cmn-btn-bg-steam radius-0 w-100 cart-loading"> Buy
                        Now </a>
                </div>
            </div>
        </div>
        <div class="wishlist-compare mt-4">
            <div class="wishlist-compare-btn">
                <a href="javascript:void(0)" class="btn-wishlist btn-details fw-500"> <i class="lar la-heart"></i> Add
                    Wishlist </a>
                <a href="compare.html" class="btn-wishlist btn-details fw-500"> <i class="las la-retweet"></i> Add
                    Compare </a>
            </div>
            <div class="wishlist-share">
                <a href="javascript:void(0)" class="share-icon fw-500">
                    <span class="icon">
                        <i class="las la-share-alt"></i>
                    </span>
                </a>

                @php
                    $product_primary_image = get_attachment_image_by_id($product->image_id);
                    $product_primary_image = $product_primary_image ? $product_primary_image['img_url'] : '';
                @endphp

                {!! single_post_share($product->slug, $product->name, $product_primary_image) !!}
            </div>
        </div>
        <div class="shop-details-stock shop-border-top pt-4 mt-4">
            <ul class="stock-category">
                <li class="category-list">
                    <span> {{__('Category:')}} </span>
                    <a class="list-item fw-600" href="javascript:void(0)"> {{$product?->category?->name}} </a>
                </li>
                <li class="category-list">
                    <span> {{__('Sub Category:')}} </span>
                    <a class="list-item fw-600" href="javascript:void(0)"> {{$product?->subCategory?->name}} </a>
                </li>
                <li class="category-list">
                    <span> {{__('Child Category:')}} </span>
                    @foreach($product->childCategory ?? [] as $child_category)
                        <a class="list-item fw-600" href="javascript:void(0)"> {{$child_category->name}} </a>
                    @endforeach
                </li>
                <li class="category-list">
                    <span> {{__('SKU:')}} </span>
                    <a class="list-item fw-600" href="javascript:void(0)"> {{$product?->inventory?->sku}} </a>
                </li>
            </ul>

            <div class="details-checkout-shop shop-border-top pt-4 mt-4">
                <span class="guaranteed-checkout fw-500 color-heading"> {{__('Guaranteed Safe Checkout')}} </span>
                <ul class="payment-list mt-3">
                    <li class="single-list">
                        <a href="javascript:void(0)"> <img src="{{global_asset('assets/img/single-page/payment1.png')}}" alt=""> </a>
                    </li>
                    <li class="single-list">
                        <a href="javascript:void(0)"> <img src="{{global_asset('assets/img/single-page/payment2.png')}}" alt=""> </a>
                    </li>
                    <li class="single-list">
                        <a href="javascript:void(0)"> <img src="{{global_asset('assets/img/single-page/payment3.png')}}" alt=""> </a>
                    </li>
                    <li class="single-list">
                        <a href="javascript:void(0)"> <img src="{{global_asset('assets/img/single-page/payment4.png')}}" alt=""> </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
