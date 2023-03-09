<section class="featured-area padding-top-50 padding-bottom-50">
    <div class="container-one">
        <div class="section-title theme-one text-left">
            <h2 class="title"> {{__('Related Product')}} </h2>
            <div class="append-featured"></div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="global-slick-init recent-slider nav-style-one slider-inner-margin"
                     data-appendArrows=".append-featured" data-infinite="true" data-arrows="true" data-dots="false"
                     data-slidesToShow="4" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                     data-prevArrow='<div class="prev-icon"><i class="las la-angle-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-angle-right"></i></div>'
                     data-responsive='[{"breakpoint": 1600,"settings": {"slidesToShow": 3}},{"breakpoint": 1400,"settings": {"slidesToShow": 3}},{"breakpoint": 1200,"settings": {"slidesToShow": 2}},{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 576,"settings": {"slidesToShow": 1} }]'>
                    @foreach($related_products as $product)
                        @php
                            if ($loop->odd) {
                                    $delay = 1;
                                    $class = 'fadeInDown';
                                }
                            else {
                                $delay = 2;
                                $class = 'fadeInUp';
                            }

                            $img_data = get_attachment_image_by_id($product->image_id, 'grid');
                            $img = !empty($img_data) ? $img_data['img_url'] : '';
                            $alt = !empty($img_data) ? $img_data['img_alt'] : '';

                            $discount = null;
                            if ($product->price)
                                {
                                    $discount = round(($product->sale_price / $product->price)*100, 2);
                                }
                        @endphp

                        <div class="slick-slider-items wow {{$class}}" data-wow-delay=".{{$delay}}s">
                            <div class="global-card no-shadow radius-0 pb-0">
                                <div class="global-card-thumb">
                                    <a href="{{route('tenant.shop.product.details', $product->slug)}}">
                                        <img src="{{$img}}" alt="{{$alt}}">
                                    </a>

                                    @if($discount != null)
                                        <div class="global-card-thumb-badge right-side">
                                            <span
                                                class="global-card-thumb-badge-box bg-color-two"> {{$discount.'%'}} {{__('Off')}} </span>

                                            @if(!empty($product->badge))
                                                <span
                                                    class="global-card-thumb-badge-box bg-color-new"> {{$product?->badge?->name}} </span>
                                            @endif
                                        </div>
                                    @endif

                                    <ul class="global-card-thumb-icons">
                                        <li class="icon-list" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="{{__('add to cart')}}">
                                            <a class="icon cart-loading" href="javascript:void(0)"> <i
                                                    class="las la-shopping-cart"></i> </a>
                                        </li>
                                        <li class="icon-list" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="{{__('add to Wishlist')}}">
                                            <a class="icon cart-loading" href="javascript:void(0)"> <i
                                                    class="lar la-heart"></i> </a>
                                        </li>
                                        <li class="icon-list" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="{{__('add to Compare')}}">
                                            <a class="icon cart-loading" href="javascript:void(0)"> <i
                                                    class="las la-retweet"></i> </a>
                                        </li>
                                        <li class="icon-list" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="{{__('Preview')}}">
                                            <a class="icon popup-modal cart-loading" href="javascript:void(0)"> <i
                                                    class="lar la-eye"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="global-card-contents">
                                    <div class="global-card-contents-flex">
                                        <h5 class="global-card-contents-title">
                                            <a href="javascript:void(0)"> {{Str::words($product->name, 4)}} </a>
                                        </h5>

                                         {!! render_product_star_rating_markup_with_count($product) !!}

                                    </div>
                                    <div class="price-update-through mt-3">
                                        {!! product_prices($product, 'color-two') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
