<a href="javascript:void(0)" class="product-cart-btn cart-btn-absolute radius-5 digital-add-to-cart-btn" data-product_id="{{ $product->id }}"> {{__('Add to Cart')}} </a>
<a href="{{route('tenant.digital.shop.product.details', $product->slug)}}" class="cart-details-btn cart-details-absolute radius-5"> {{__('View Details')}} </a>
