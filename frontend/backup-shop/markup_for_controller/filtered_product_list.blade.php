@foreach($product_object as $product)
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
                <div class="rating-wrap">
                    <div class="ratings">
                        <span class="hide-rating"></span>
                        <span class="show-rating"></span>
                    </div>
                    <p><span class="total-ratings">(185)</span></p>
                </div>
                <h5 class="global-flex-card-contents-title fw-500 mt-3">
                    <a href="javascript:void(0)"> {{Str::words($product->name, 8)}} </a>
                </h5>
                <div class="price-update-through mt-4">
                    <span class="flash-prices color-two"> {{amount_with_currency_symbol($sale_price)}} </span>
                    <span class="flash-old-prices"> {{$regular_price != null ? amount_with_currency_symbol($regular_price) : ''}} </span>
                </div>
                <p class="global-flex-card-contents-para extra-padding-right mt-4"> {{Str::words($product->summary, 30)}} </p>
                <div class="global-flex-card-contents-bottom border-flex-card pt-4 mt-4 pt-lg-5 mt-lg-5">
                    <div class="global-flex-card-contents-icon">
                        <div class="btn-wrapper" data-bs-toggle="tooltip" data-bs-placement="top"
                             title="add to Cart">
                            <a href="javascript:void(0)" class="cmn-btn cmn-btn-bg-2 radius-0"> Add to Cart </a>
                        </div>
                        <div class="icon-list" data-bs-toggle="tooltip" data-bs-placement="top"
                             title="add to Wishlist">
                            <a class="icon cart-loading" href="javascript:void(0)"> <i class="lar la-heart"></i>
                            </a>
                        </div>
                        <div class="icon-list" data-bs-toggle="tooltip" data-bs-placement="top"
                             title="add to Compare">
                            <a class="icon cart-loading" href="javascript:void(0)"> <i
                                    class="las la-retweet"></i> </a>
                        </div>
                        <div class="icon-list" data-bs-toggle="tooltip" data-bs-placement="top" title="Preview">
                            <a class="icon popup-modal cart-loading" href="javascript:void(0)"> <i
                                    class="lar la-eye"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{$product_object->links()}}
