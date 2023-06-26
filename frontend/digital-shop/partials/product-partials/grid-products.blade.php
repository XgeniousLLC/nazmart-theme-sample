<div class="shop-grid-contents">
    <div class="row gy-4 gy-lg-5">
        @foreach($products as $product)
            @php
                $data_info = get_digital_product_dynamic_price($product);
                $regular_price = $data_info['regular_price'];
                $sale_price = $data_info['sale_price'];
                $discount = $data_info['discount'];

                $price = $sale_price > 0 ? $sale_price : $regular_price;
            @endphp

            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6">
            <div class="global-card hover-overlay center-text bg-white book-filter-padding">
                <div class="global-card-thumb">
                    <a href="{{route('tenant.digital.shop.product.details', $product->slug)}}">
                        {!! render_image_markup_by_attachment_id($product->image_id, 'product-image') !!}
                    </a>

                    @if($discount > 0)
                        <div class="global-badge left-side">
                            <span class="global-badge-box"> {{$discount}}% {{__('off')}} </span>
                        </div>
                    @endif

                    @if(!empty($product->additionalFields?->badge_id))
                        <div class="global-badge left-side">
                            <span class="global-badge-box bg-new"> {{$product->additionalFields?->badge?->name}} </span>
                        </div>
                    @endif
                </div>

                <!-- Product options start -->
                @include(include_theme_path('digital-shop.partials.product-options'))
                <!-- Product options end -->

                <div class="global-card-contents mt-3">
                    <h5 class="global-card-contents-title-two">
                        <a href="{{route('tenant.digital.shop.product.details', $product->slug)}}"> {{Str::words($product->name, 15)}} </a>
                    </h5>
                    <span class="global-card-contents-subtitle mt-2"> {{$product->additionalFields?->author?->name}} </span>
                    <div class="price-update-through mt-3">
                        <span class="flash-prices color-one"> {{float_amount_with_currency_symbol($price)}} </span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="pagination mt-60">
            <ul class="pagination-list">
                @if(count($links) > 1)
                    @foreach($links as $link)
                        <li>
                            <a data-page="{{ $loop->iteration }}" href="{{ $link }}" class="page-number {{ $loop->iteration === $current_page ? "current" : ""}}">{{ $loop->iteration }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
