<div id="tab-grid2" class="tab-content-item active">
    <div class="row mt-4 gy-5">
        @foreach($products as $product)
            @php
                $data = get_product_dynamic_price($product);
                $campaign_name = $data['campaign_name'];
                $regular_price = $data['regular_price'];
                $sale_price = $data['sale_price'];
                $discount = $data['discount'];
            @endphp

            <div class="col-xxl-3 col-lg-6 col-sm-6">
                <div class="global-card no-shadow radius-0 pb-0">
                    <div class="global-card-thumb">
                        <a href="{{route('tenant.shop.product.details', $product->slug)}}">
                            {!! render_image_markup_by_attachment_id($product->image_id, '', 'grid') !!}
                        </a>
                        <div class="global-card-thumb-badge right-side">
                            @if($discount != null)
                                <span
                                    class="global-card-thumb-badge-box bg-color-two"> {{$discount}}% {{__('off')}} </span>
                            @endif

                            @if(!empty($product->badge))
                                <span
                                    class="global-card-thumb-badge-box bg-color-new"> {{$product?->badge?->name}} </span>
                            @endif
                        </div>

                        @include('tenant.frontend.shop.partials.product-options')
                    </div>

                    <div class="global-card-contents">
                        <div class="global-card-contents-flex">
                            <h5 class="global-card-contents-title text-capitalize">
                                <a href="javascript:void(0)"> {{Str::words($product->name, 15)}} </a>
                            </h5>
                            {!! render_product_star_rating_markup_with_count($product) !!}
                        </div>
                        <div class="price-update-through mt-3">
                            <span class="flash-prices color-one"> {{amount_with_currency_symbol($sale_price)}} </span>
                            <span
                                class="flash-old-prices"> {{$regular_price != null ? amount_with_currency_symbol($regular_price) : ''}} </span>
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
