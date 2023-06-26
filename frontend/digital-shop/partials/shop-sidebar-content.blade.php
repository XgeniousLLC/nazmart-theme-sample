<div class="shop-sidebar-content">
    <div class="shop-close-content">
        <div class="shop-close-content-icon"> <i class="las la-times"></i> </div>
        <div class="single-shop-left bg-white">
            <div class="single-shop-left-title open">
                <h5 class="title"> {{__('Authors')}} </h5>
                <div class="single-shop-left-inner margin-top-15">
                    <ul class="single-shop-left-list active-list" id="author_filter">
                        @foreach($authors as $author)
                            <li class="item" data-slug="{{$author->slug}}">
                                <a href="javascript:void(0)"> {{$author->name}} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="single-shop-left bg-white mt-4">
            <div class="single-shop-left-title open">
                <h5 class="title"> Prices </h5>
                <div class="single-shop-left-inner mt-4">
                    <form class="price-range-slider" method="post" data-start-min="0" data-start-max="10000" data-min="0" data-max="10000" data-step="5">
                        <div class="ui-range-slider"></div>
                        <div class="ui-range-slider-footer">
                            <div class="ui-range-values">
                                <span class="ui-price-title"> Price: </span>
                                <div class="ui-range-value-min">$<span class="min_price">100</span>
                                    <input type="hidden" value="100">
                                </div>-
                                <div class="ui-range-value-max">$<span class="max_price">9950</span>
                                    <input type="hidden" value="9950">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="single-shop-left bg-white mt-4">
            <div class="single-shop-left-title open">
                <h5 class="title"> {{__('Language')}} </h5>
                <div class="single-shop-left-inner margin-top-15">
                    <ul class="single-shop-left-list active-list" id="language_filter">
                        @foreach($languages as $language)
                            <li class="item" data-slug="{{$language->slug}}">
                                <a href="javascript:void(0)"> {{$language->name}} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="single-shop-left bg-white mt-4">
            <div class="single-shop-left-title open">
                <h5 class="title"> Filter By Rating </h5>
                <div class="single-shop-left-inner">
                    <ul class="single-shop-left-filter-list active-list mt-3">
                        <li class="item active">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                        </li>
                        <li class="item">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                        </li>
                        <li class="item">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                        </li>
                        <li class="item">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                        </li>
                        <li class="item">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
