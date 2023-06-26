<div id="tab-grid" class="tab-content-item">
    <div class="row mt-4">
        @foreach($products as $product)
            @php
                $data = get_product_dynamic_price($product);
                $campaign_name = $data['campaign_name'];
                $regular_price = $data['regular_price'];
                $sale_price = $data['sale_price'];
                $discount = $data['discount'];
            @endphp

            <div class="col-sm-12 mt-4">
                <div class="global-flex-card">
                    <div class="global-card-thumb global-flex-card-thumb"
                        {!! render_background_image_markup_by_attachment_id($product->image_id) !!}>
                        <div class="global-card-thumb-badge right-side">
                            @if($discount != null)
                                <span
                                    class="global-card-thumb-badge-box bg-color-two"> {{$discount}}% {{__('off')}} </span>
                            @endif

                            @if(!empty($product->badge))
                                <span
                                    class="global-card-thumb-badge-box bg-color-new"> {{$product?->badge?->name}} </span>
                            @endif

                            @if(!is_null($campaign_name))
                                <span
                                    class="global-card-thumb-badge-box bg-color-new"> {{$campaign_name}} </span>
                            @endif
                        </div>
                    </div>

                    <div class="global-flex-card-contents">
                        {!! render_product_star_rating_markup_with_count($product) !!}
                        <h5 class="global-flex-card-contents-title fw-500 mt-3">
                            <a href="{{route('tenant.shop.product.details', $product->slug)}}"> {{Str::words($product->name, 15)}} </a>
                        </h5>
                        <div class="price-update-through mt-4">
                            <span class="flash-prices color-one"> {{amount_with_currency_symbol($sale_price)}} </span>
                            <span class="flash-old-prices"> {{$regular_price != null ? amount_with_currency_symbol($regular_price) : ''}} </span>
                        </div>
                        <p class="global-flex-card-contents-para extra-padding-right mt-4"> {{Str::words($product->summary, 30)}} </p>
                        <div class="global-flex-card-contents-bottom border-flex-card pt-4 mt-4 pt-lg-5 mt-lg-5">
                            <div class="global-flex-card-contents-icon">
                                @if($product->inventory_detail_count < 1)
                                    <div class="btn-wrapper" data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="{{__('Add to Cart')}}">
                                        <a href="javascript:void(0)" data-product_id="{{ $product->id }}" class="add-to-cart-btn cmn-btn cmn-btn-bg-1 cmn-btn-small radius-0"> {{__('Add to Cart')}} </a>
                                    </div>
                                    <div class="icon-list wishlist-btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="{{__('Add to Wishlist')}}">
                                        <a class="add-to-wishlist-btn icon cart-loading" data-product_id="{{ $product->id }}" href="javascript:void(0)"> <i class="lar la-heart"></i>
                                        </a>
                                    </div>
                                    <div class="icon-list compare-btn" data-product_id="{{$product->id}}" data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="{{__('Add to Compare')}}">
                                        <a class="icon cart-loading compare-btn" href="javascript:void(0)"> <i
                                                class="las la-retweet"></i> </a>
                                    </div>
                                @else
                                    <div class="btn-wrapper" data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="{{__('Add to Cart')}}">
                                        <a href="javascript:void(0)" class="product-quick-view-ajax cmn-btn cmn-btn-bg-2 radius-0" data-action-route="{{ route('tenant.products.single-quick-view', $product->slug) }}"> {{__('Add to Cart')}} </a>
                                    </div>
                                    <div class="icon-list wishlist-btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="{{__('Add to Wishlist')}}">
                                        <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)" data-action-route="{{ route('tenant.products.single-quick-view', $product->slug) }}"> <i class="lar la-heart"></i>
                                        </a>
                                    </div>
                                    <div class="icon-list compare-btn" data-bs-toggle="tooltip" data-bs-placement="top"
                                         title="{{__('Add to Compare')}}">
                                        <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)" data-action-route="{{ route('tenant.products.single-quick-view', $product->slug) }}"> <i
                                                    class="las la-retweet"></i> </a>
                                    </div>
                                @endif

                                @php
                                    $image_array = array();
                                    $img = get_attachment_image_by_id($product->image_id);
                                    array_push($image_array, $img['img_url'] ?? []);

                                    if (count($product->gallery_images) > 0)
                                        {
                                            foreach ($product->gallery_images ?? [] as $image)
                                                {
                                                    $img = get_attachment_image_by_id($image->id);
                                                    array_push($image_array, $img['img_url']);
                                                }
                                        }
                                @endphp
                                <div class="icon-list" data-bs-toggle="tooltip" data-bs-placement="top" title="Preview">
                                    <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)" data-action-route="{{ route('tenant.products.single-quick-view', $product->slug) }}"> <i
                                            class="lar la-eye"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <ul class="pagination">
            @if(count($links) > 1)
                @foreach($links as $link)
                    <li class="page-item"><a data-page="{{ $loop->iteration }}" class="page-link {{ $loop->iteration === $current_page ? "active" : ""}}" href="{{ $link }}">{{ $loop->iteration }}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
