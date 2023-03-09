<div class="shop-sidebar-content">
    <div class="shop-close-main">
        <div class="close-bars"> <i class="las la-times"></i> </div>
        <div class="single-shop-left">
            <div class="single-shop-left-search">
                <div class="single-shop-left-search-input">
                    <form action="{{route('tenant.shop.search')}}" method="GET">
                        <input type="text" class="form--control" name="search" placeholder="{{__('Search Products')}}">
                        <button type="submit"> <i class="las la-search"></i> </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> {{__('Category')}} </h5>
                <div class="shop-left-list margin-top-15">
                    <ul class="category-lists active-list">
                        @foreach($categories as $category)
                            <li class="list" data-slug="{{$category->slug}}" data-value="{{ $category->name }}">
                                <a href="javascript:void(0)" class="item">
                                    <span data-value="{{ $category->name }}" data-slug="{{$category->slug}}" class="ad-values"> {{$category->name}} </span>
                                    <span> {{$category->product_count}} </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> {{__('Prices')}} </h5>
                <div class="shop-left-list mt-4">
                    <form class="price-range-slider" method="post" data-start-min="0" data-start-max="10000" data-min="0" data-max="10000" data-step="5">
                        <div class="ui-range-slider"></div>
                        <div class="ui-range-slider-footer">
                            <div class="ui-range-values">
                                <span class="ui-price-title"> {{__('Price:')}} </span>
                                <div class="ui-range-value-min">{{site_currency_symbol()}}<span class="min_price">0</span>
                                    <input type="hidden" value="0">
                                </div> -
                                <div class="ui-range-value-max">{{site_currency_symbol()}}<span class="max_price">10000</span>
                                    <input type="hidden" value="10000">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> {{__('Size')}} </h5>
                <div class="shop-left-list margin-top-15">
                    <ul class="size-lists active-list">
                        @foreach($sizes as $size)
                            <li class="list" data-slug="{{$size->id}}" data-value="{{ $size->size_code }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ucfirst($size->name)}}">
                                <a class="radius-5" href="javascript:void(0)"> {{$size->size_code}} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> {{__('Color')}} </h5>
                <div class="shop-left-list margin-top-15">
                    <ul class="color-lists active-list">
                        @foreach($colors as $color)
                            <li class="list" data-value="{{$color->name}}" data-slug="{{$color->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ucfirst($color->name)}}">
                                @php
                                    if (strtolower($color->color_code) == '#fff' || strtolower($color->color_code) == '#ffffff')
                                        {
                                            $border_class = 'border: 1px solid #d8d8d8';
                                        }
                                @endphp
                                <a class="radius-5" style="background-color: {{$color->color_code}};{{$border_class ?? ''}}" href="javascript:void(0)"> </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> {{__('Rating')}} </h5>
                <div class="shop-left-list">
                    <ul class="filter-lists active-list mt-3">
                        <li data-slug="5" class="list">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                        </li>
                        <li data-slug="4" class="list">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                        </li>
                        <li data-slug="3" class="list">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                        </li>
                        <li data-slug="2" class="list">
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="las la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                            <a href="javascript:void(0)"> <i class="lar la-star"></i> </a>
                        </li>
                        <li data-slug="1" class="list">
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
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> {{__('Tags')}} </h5>
                <div class="shop-left-list margin-top-15">
                    <ul class="tag-lists active-list">
                        @foreach($tags as $tag)
                            <li class="list" data-slug="{{$tag->tag_name}}">
                                <a class="radius-0 text-capitalize" href="javascript:void(0)"> {{$tag->tag_name}} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
