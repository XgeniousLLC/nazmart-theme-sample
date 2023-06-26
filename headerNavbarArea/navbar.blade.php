<header class="header-style-01">
    <div class="searchbar-area">
        <!-- Menu area Starts -->
        <nav class="navbar navbar-area index-02 nav-two navbar-expand-lg navbar-border">
            <div class="container container-two nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo-wrapper">
                        @if(\App\Facades\GlobalLanguage::user_lang_dir() == 'rtl')
                            <a href="{{url('/')}}" class="logo">
                                {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                            </a>
                        @else
                            <a href="{{url('/')}}" class="logo">
                                @if(!empty(get_static_option('site_white_logo')))
                                    {!! render_image_markup_by_attachment_id(get_static_option('site_white_logo')) !!}
                                @else
                                    <h2 class="site-title">{{filter_static_option_value('site_title', $global_static_field_data)}}</h2>
                                @endif
                            </a>
                        @endif
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                    <ul class="navbar-nav">
                        {!! render_frontend_menu($primary_menu) !!}
                    </ul>
                </div>
                <div class="nav-right-content">
                    <ul>
                        <li>
                            <div class="info-bar-item">
                                <div class="track-icon-list style-02">
                                    <a href="javascript:void(0)" class="single-icon search-open">
                                        <span class="icon"> <i class="las la-search"></i> </span>
                                    </a>
                                    <div class="single-icon cart-shopping">
                                        <a class="icon" href="{{route('tenant.shop.compare.product.page')}}"> <i
                                                class="las la-sync"></i> </a>
                                    </div>
                                    <div class="single-icon cart-shopping">
                                        @php
                                            $cart = \Gloudemans\Shoppingcart\Facades\Cart::instance("wishlist")->content();
                                            $subtotal = \Gloudemans\Shoppingcart\Facades\Cart::instance("wishlist")->subtotal();
                                        @endphp
                                        <a href="javascript:void(0)" class="icon"> <i class="lar la-heart"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="icon-notification"> {{\Gloudemans\Shoppingcart\Facades\Cart::instance("wishlist")->content()->count()}} </a>
                                        <div class="addto-cart-contents">
                                            <div class="single-addto-cart-wrappers">
                                                @forelse($cart as $cart_item)
                                                    <div class="single-addto-carts">
                                                        <div class="addto-cart-flex-contents">
                                                            <div class="addto-cart-thumb">
                                                                {!! render_image_markup_by_attachment_id($cart_item?->options?->image) !!}
                                                            </div>
                                                            <div class="addto-cart-img-contents">
                                                                <h6 class="addto-cart-title fs-18"> {{Str::words($cart_item->name, 5)}} </h6>
                                                                <span class="name-subtitle d-block">
                                                                        @if($cart_item?->options?->color_name)
                                                                        {{__('Color:')}} {{$cart_item?->options?->color_name}} ,
                                                                    @endif

                                                                    @if($cart_item?->options?->size_name)
                                                                        {{__('Size:')}} {{$cart_item?->options?->size_name}}
                                                                    @endif

                                                                    @if($cart_item?->options?->attributes)
                                                                        <br>
                                                                        @foreach($cart_item?->options?->attributes as $key => $attribute)
                                                                            {{$key.':'}} {{$attribute}}{{!$loop->last ? ',' : ''}}
                                                                        @endforeach
                                                                    @endif
                                                                </span>

                                                                <div class="price-updates margin-top-10">
                                                                    <span class="price-title fs-16 fw-500 color-heading"> {{amount_with_currency_symbol($cart_item->price)}} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="addto-cart-counts color-heading fw-500"> {{$cart_item->qty}} </span>
                                                        <a href="javascript:void(0)" class="close-cart">
                                                            <span class="icon-close color-heading"> <i
                                                                    class="las la-times"></i> </span>
                                                        </a>
                                                    </div>
                                                @empty
                                                    <div class="single-addto-carts">
                                                        <p class="text-center">{{__('No Item in Wishlist')}}</p>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-icon cart-shopping">
                                        @php
                                            $cart = \Gloudemans\Shoppingcart\Facades\Cart::instance("default")->content();
                                            $subtotal = \Gloudemans\Shoppingcart\Facades\Cart::instance("default")->subtotal();
                                        @endphp
                                        <a href="javascript:void(0)" class="icon"> <i class="las la-shopping-cart"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="icon-notification"> {{\Gloudemans\Shoppingcart\Facades\Cart::instance("default")->content()->count()}} </a>
                                        <div class="addto-cart-contents">
                                            <div class="single-addto-cart-wrappers">
                                                @forelse($cart as $cart_item)
                                                    <div class="single-addto-carts">
                                                        <div class="addto-cart-flex-contents">
                                                            <div class="addto-cart-thumb">
                                                                {!! render_image_markup_by_attachment_id($cart_item?->options?->image) !!}
                                                            </div>
                                                            <div class="addto-cart-img-contents">
                                                                <h6 class="addto-cart-title fs-18"> {{Str::words($cart_item->name, 5)}} </h6>
                                                                <span class="name-subtitle d-block">
                                                                        @if($cart_item?->options?->color_name)
                                                                        {{__('Color:')}} {{$cart_item?->options?->color_name}} ,
                                                                    @endif

                                                                    @if($cart_item?->options?->size_name)
                                                                        {{__('Size:')}} {{$cart_item?->options?->size_name}}
                                                                    @endif

                                                                    @if($cart_item?->options?->attributes)
                                                                        <br>
                                                                        @foreach($cart_item?->options?->attributes as $key => $attribute)
                                                                            {{$key.':'}} {{$attribute}}{{!$loop->last ? ',' : ''}}
                                                                        @endforeach
                                                                    @endif
                                                                </span>

                                                                <div class="price-updates margin-top-10">
                                                                    <span class="price-title fs-16 fw-500 color-heading"> {{amount_with_currency_symbol($cart_item->price)}} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="addto-cart-counts color-heading fw-500"> {{$cart_item->qty}} </span>
                                                        <a href="javascript:void(0)" class="close-cart">
                                                            <span class="icon-close color-heading"> <i
                                                                    class="las la-times"></i> </span>
                                                        </a>
                                                    </div>
                                                @empty
                                                    <div class="single-addto-carts">
                                                        <p class="text-center">{{__('No Item in Wishlist')}}</p>
                                                    </div>
                                                @endforelse
                                            </div>

                                            @if($cart->count() != 0)
                                                <div class="cart-total-amount">
                                                    <h6 class="amount-title"> {{__('Total Amount:')}} </h6> <span
                                                        class="fs-18 fw-500 color-light"> {{float_amount_with_currency_symbol($subtotal)}} </span></div>
                                                <div class="btn-wrapper margin-top-20">
                                                    <a href="{{route('tenant.shop.checkout')}}" class="cmn-btn btn-bg-1 radius-0 w-100">
                                                        {{__('CheckOut')}} </a>
                                                </div>
                                                <div class="btn-wrapper margin-top-20">
                                                    <a href="{{route('tenant.shop.cart')}}" class="cmn-btn btn-outline-one radius-0 w-100">
                                                        {{__('View Cart')}} </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="login-account">
                                    <a href="javascript:void(0)" class="accounts">
                                        <i class="las la-user"></i>
                                    </a>
                                    <ul class="account-list-item">
                                        @auth('web')
                                            <li class="list">
                                                <a href="{{route('tenant.user.home')}}"> {{__('Dashboard')}} </a>
                                            </li>
                                            <li class="list">
                                                <a href="{{route('tenant.user.logout')}}"> {{__('Log Out')}} </a>
                                            </li>
                                        @else
                                            <li class="list">
                                                <a href="{{route('tenant.user.login')}}"> {{__('Sign In')}} </a>
                                            </li>
                                            <li class="list">
                                                <a href="{{route('tenant.user.register')}}"> {{__('Sign Up')}} </a>
                                            </li>
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Menu area end -->

        <!-- SearcBar -->
        <div class="search-bar">
            <form class="menu-search-form" action="#">
                <div class="search-open-form">
                    <div class="search-close"><i class="las la-times"></i></div>
                    <input class="item-search" type="text" placeholder="{{__('Search Here....')}}" id="search_form_input">
                    <button type="submit">{{__('Search Now')}}</button>
                </div>
                <div class="search-suggestions" id="search_suggestions_wrap">
                    <div class="search-suggestions-inner">
                        <h6 class="search-suggestions-title">{{__('Product Suggestions')}}</h6>
                        <ul class="product-suggestion-list mt-4">

                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>
