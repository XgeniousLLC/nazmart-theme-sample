@foreach($product_object as $product)
    @php
        $data = get_product_dynamic_price($product);
        $campaign_name = $data['campaign_name'];
        $regular_price = $data['regular_price'];
        $sale_price = $data['sale_price'];
        $discount = $data['discount'];
    @endphp

    <div class="col-xxl-4 col-lg-6 col-sm-6">
        <div class="global-card no-shadow radius-0 pb-0">
            <div class="global-card-thumb">
                <a href="javascript:void(0)">
                    {!! render_image_markup_by_attachment_id($product->image_id) !!}
                </a>
                <div class="global-card-thumb-badge right-side">
                    @if($discount != null)
                        <span
                            class="global-card-thumb-badge-box bg-color-two"> {{$discount}}% {{__('off')}} </span>
                    @endif

                    @if(!empty($product->badge))
                        <span class="global-card-thumb-badge-box bg-color-new"> {{$product?->badge?->name}} </span>
                    @endif

                    @if(!is_null($campaign_name))
                        <span
                            class="global-card-thumb-badge-box bg-color-new"> {{$campaign_name}} </span>
                    @endif
                </div>

                @include('tenant.frontend.shop.partials.product-options')
            </div>

            <div class="global-card-contents">
                <div class="global-card-contents-flex">
                    <h5 class="global-card-contents-title"><a
                            href="javascript:void(0)"> {{Str::words($product->name, 4)}} </a>
                    </h5>
                    <div class="rating-wrap">
                        <div class="ratings">
                            <span class="hide-rating"></span>
                            <span class="show-rating"></span>
                        </div>
                        <p><span class="total-ratings">(185)</span></p>
                    </div>
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

{{$product_object->links()}}
