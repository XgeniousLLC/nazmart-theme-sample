@if($product->inventory_detail_count < 1)
    <a class="collection-cart fs-20 fw-500 ff-roboto color-three add-to-cart-btn" href="javascript:void(0)" data-product_id="{{ $product->id }}">
        {{__('Add to Cart')}} </a>
@else
    <a class="collection-cart fs-20 fw-500 ff-roboto color-three product-quick-view-ajax" href="javascript:void(0)" data-action-route="{{ route('tenant.products.single-quick-view', $product->slug) }}">
        {{__('Add to Cart')}} </a>
@endif
