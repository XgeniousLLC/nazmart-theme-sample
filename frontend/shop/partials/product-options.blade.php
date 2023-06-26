<ul class="collection-icon-list color-three">
    @if($product->inventory_detail_count < 1)
        <li class="lists add-to-wishlist-btn" title="{{__('View')}}">
            <a class="icon cart-loading add-to-wishlist-btn" href="javascript:void(0)"
               data-product_id="{{ $product->id }}">
                <i class="lar la-heart"></i>
            </a>
        </li>
        <li class="lists">
            <a class="icon popup-modal cart-loading product-quick-view-ajax" href="javascript:void(0)"
               data-action-route="{{ route('tenant.products.single-quick-view', $product->slug) }}">
                <i class="lar la-eye"></i>
            </a>
        </li>
        <li class="lists" title="{{__('Add to Cart')}}">
            <a class="icon cart-loading add-to-cart-btn" data-product_id="{{ $product->id }}" href="javascript:void(0)">
                <i class="las la-shopping-bag"></i>
            </a>
        </li>
    @else
        <li class="lists">
            <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)"
               data-action-route="{{ route('tenant.products.single-quick-view', $product->slug) }}">
                <i class="lar la-heart"></i>
            </a>
        </li>
        <li class="lists">
            <a class="icon popup-modal cart-loading product-quick-view-ajax" href="javascript:void(0)"
               data-action-route="{{ route('tenant.products.single-quick-view', $product->slug) }}">
                <i class="lar la-eye"></i>
            </a>
        </li>
        <li class="lists">
            <a class="icon cart-loading product-quick-view-ajax" href="javascript:void(0)"
               data-action-route="{{ route('tenant.products.single-quick-view', $product->slug) }}">
                <i class="las la-shopping-bag"></i>
            </a>
        </li>
    @endif
    @php
        $image_array = array();
        $img = get_attachment_image_by_id($product->image_id);
        array_push($image_array, $img['img_url'] ?? []);

        if (count($product->gallery_images) > 0) {
            foreach ($product->gallery_images ?? [] as $image)
                {
                    $img = get_attachment_image_by_id($image->id);
                    array_push($image_array, $img['img_url']);
                }
        }
    @endphp
</ul>
