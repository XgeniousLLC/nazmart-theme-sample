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
         $is_expired = $data['is_expired'];
     }

     $quickView = true;
    $image_details = get_attachment_image_by_id($product->image_id, 'full');
@endphp
<div class="modal-dialog modal-xl">
    <div class="modal-content p-5">
        <div class="quick-view-close-btn-wrapper quick-view-details">
            <button class="quick-view-close-btn"><i class="las la-times"></i></button>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xl-5">
                <div class="global-slick-init shop-details-top-slider quick-view-long-img" id="shop_details_gallery_slider" data-asNavFor=".shop-details-click-img" data-fade="true"
                     data-infinite="true" data-autoplaySpeed="3000" data-autoplay="true" data-src="{{ $image_details["img_url"] }}">
                    <div class="quick-view-thumb position-relative">
                        <img src="{{ $image_details["img_url"] }}">
                        <div class="global-card-thumb-badge right-side">
                            @if(!empty($discount))
                                <span class="global-card-thumb-badge-box bg-color-two"> {{$discount}}% {{__('off')}} </span>
                            @endif

                            @if(!empty($product->badge))
                                <span class="global-card-thumb-badge-box bg-color-new"> {{$product?->badge?->name}} </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-xl-7 quick-view-shop-wrapper">
                @include(include_theme_path('shop.product_details.partials.product-options'))
            </div>
        </div>
    </div>
</div>

{{-- new product modal - end --}}

<script>
    // check condition if those variable are declared than no need to declare again
    window.quick_view_attribute_store = JSON.parse('{!! json_encode($product_inventory_set) !!}');
    window.quick_view_additional_info_store = JSON.parse('{!! json_encode($additional_info_store) !!}');
    window.quick_view_available_options = $('.quick-view-value-input-area');
    window.quick_view_has_campaign = '{{ empty($campaign_product) ? 0 : 1 }}';
    window.quick_view_campaign_expired = '{{ isset($is_expired) ? $is_expired : 0 }}';
    window.quick_view_product_id = {{ $product->id }};
    window.quick_view_selected_variant = '';
</script>
