<!-- Book Review Area start -->
<section class="bookreview-area section-bg-2 padding-top-50 padding-bottom-100">
    <div class="container custom-container-one">
        <div class="row gy-5">
            <div class="col-xxl-8 col-lg-7">
                <div class="bookreview-left-wrapper">
                    <ul class="tabs bookreview-tab">
                        <li class="active" data-tab="description"> {{__('Description')}} </li>
                        <li data-tab="reviews"> {{__('Reviews')}} </li>
                    </ul>
                </div>
                <div id="description" class="tab-content-item active">
                    <div class="bookreview-content-wrapper bg-white bookreviewer-padding mt-5">
                        <div class="bookreview-contents">
                            <div class="bookreview-contents-single">
                                <div class="bookreview-contents-single-flex d-flex">
                                    <div class="bookreview-contents-single-contents">
                                        <h4 class="bookreview-contents-single-contents-title">
                                            {{__('Description')}}
                                        </h4>
                                    </div>
                                </div>
                                <div class="bookreview-contents-single-bottom mt-4">
                                    <p class="bookreview-contents-single-bottom-para mt-4">
                                        {!! $product->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="reviews" class="tab-content-item">
                    <div class="bookreview-content-wrapper bg-white bookreviewer-padding mt-5">
                        <div class="bookreview-contents">
{{--                            <div class="bookreview-contents-top bookreview-contents-padding-botttom">--}}
{{--                                <div class="bookreview-contents-flex">--}}
{{--                                    <div class="bookreview-contents-left">--}}
{{--                                        <h4 class="bookreview-contents-title fw-600"> 4.8 Out Of 5 </h4>--}}
{{--                                        <div class="rating-wrap mt-3">--}}
{{--                                            <div class="ratings">--}}
{{--                                                <span class="hide-rating"></span>--}}
{{--                                                <span class="show-rating"></span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <span class="bookreview-contents-ratings-sub mt-3"> 105 Ratings </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="bookreview-contents-right">--}}
{{--                                        <div class="progress-bar-area">--}}
{{--                                            <div class="single-progress flex-progress">--}}
{{--                                                <span class="single-progress-star"> 5 Star </span>--}}
{{--                                                <div class="single-progress-skils">--}}
{{--                                                    <div class="single-progress-bars" data-percent="80">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <span class="single-progress-review"> 159 </span>--}}
{{--                                            </div>--}}
{{--                                            <div class="single-progress flex-progress">--}}
{{--                                                <span class="single-progress-star"> 4 Star </span>--}}
{{--                                                <div class="single-progress-skils">--}}
{{--                                                    <div class="single-progress-bars" data-percent="60">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <span class="single-progress-review"> 74 </span>--}}
{{--                                            </div>--}}
{{--                                            <div class="single-progress flex-progress">--}}
{{--                                                <span class="single-progress-star"> 3 Star </span>--}}
{{--                                                <div class="single-progress-skils">--}}
{{--                                                    <div class="single-progress-bars" data-percent="40">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <span class="single-progress-review"> 47 </span>--}}
{{--                                            </div>--}}
{{--                                            <div class="single-progress flex-progress">--}}
{{--                                                <span class="single-progress-star"> 2 Star </span>--}}
{{--                                                <div class="single-progress-skils">--}}
{{--                                                    <div class="single-progress-bars" data-percent="20">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <span class="single-progress-review"> 12 </span>--}}
{{--                                            </div>--}}
{{--                                            <div class="single-progress flex-progress">--}}
{{--                                                <span class="single-progress-star"> 1 Star </span>--}}
{{--                                                <div class="single-progress-skils">--}}
{{--                                                    <div class="single-progress-bars" data-percent="10">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <span class="single-progress-review"> 07 </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            @foreach($reviews ?? [] as $review)
                                <div class="bookreview-contents-single bookreview-top-border">
                                <div class="bookreview-contents-single-flex d-flex">
                                    <div class="bookreview-contents-single-thumb">
                                        @php
                                            $user = $review?->user;
                                            $image = get_attachment_image_by_id($user?->image);
                                            $image_url = !empty($image) ? $image['img_url'] : '';
                                        @endphp
                                        <a href="javscript:void(0)">
                                            <img class="radius-parcent-50" src="{{$image_url}}" alt="reviewer">
                                        </a>
                                    </div>
                                    <div class="bookreview-contents-single-contents">
                                        <h4 class="bookreview-contents-single-contents-title">
                                            <a href="javascript:void(0)"> {{$user?->name}} </a>
                                        </h4>
                                        <span class="bookreview-contents-single-contents-sub"> Mar 29 2022 </span>
                                    </div>
                                </div>
                                <div class="bookreview-contents-single-bottom mt-4">
                                    <div class="bookreview-contents-single-bottom-flex d-flex">
                                        {!! render_star_rating_markup($review->rating) !!}
                                    </div>
                                    <p class="bookreview-contents-single-bottom-para mt-4"> {{$review->review_text}} </p>
                                </div>
                            </div>
                            @endforeach

                            @if(!empty(Auth::guard('web')->user()))
                                <div class="review-form my-5">
                                    <h3>{{__('Leave a Review')}}</h3>
                                    <form>
                                        <input type="hidden" class="rating-count" value="">
                                        <div class="ratings mt-4">
                                            <select class="star-rating">
                                                <option value="5">{{__('Excellent')}}</option>
                                                <option value="4" selected>{{__('Very Good')}}</option>
                                                <option value="3">{{__('Average')}}</option>
                                                <option value="2">{{__('Poor')}}</option>
                                                <option value="1">{{__('Terrible')}}</option>
                                            </select>
                                        </div>

                                        <div class="form-group mt-4">
                                            <textarea type="text" name="review_text" class="form-control review-text" id="review-text"></textarea>
                                        </div>

                                        <div class="btn-wrapper text-end mt-4">
                                            <button type="submit" id="review-submit-btn" class="cmn-btn btn-small cmn-btn-bg-2 radius-0">{{__('Submit Review')}}</button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="tab-review">
                                            <div class="row">
                                                <div class="col-lg-10 mx-auto">
                                                    <div class="auth-form-light text-left p-5">
                                                        <div class="brand-logo">
                                                            {!! render_image_markup_by_attachment_id('site_logo') !!}
                                                        </div>
                                                        <h4 class="text-capitalize">{{__('Hello! let us get started')}}</h4>
                                                        <h6 class="font-weight-light">{{__('Sign in to continue.')}}</h6>
                                                        <x-error-msg/>
                                                        <x-flash-msg/>
                                                        <div id="msg-wrapper"></div>
                                                        <form class="pt-3" action="" method="post" id="login_form_order_page">
                                                            <div class="form-group">
                                                                <input type="text" name="email" class="form-control form-control-lg" placeholder="{{__('Username')}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="password" class="form-control form-control-lg"  placeholder="{{__('Password')}}">
                                                            </div>
                                                            <div class="mt-3 btn-wrapper">
                                                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn cmn-btn cmn-btn-bg-1 cmn-btn-small radius-0 mt-2" id="login_submit_btn">{{__('Sign In')}}</button>
                                                            </div>
                                                            <div class="my-2 d-flex justify-content-between align-items-center">
                                                                <div class="form-check">
                                                                    <label class="form-check-label text-muted">
                                                                        <input type="checkbox" name="remember" class="form-check-input"> {{__('Keep me signed in')}}
                                                                        <i class="input-helper"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="text-center mt-4 font-weight-light"> {{__('Do not have an account?')}} <a href="{{route('tenant.user.register')}}" class="text-primary">{{__('Create')}}</a></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <!-- Book related products Area start -->
            @include(include_theme_path('digital-shop.product_details.partials.related-products'))
            <!-- Book related products Area end -->
        </div>
    </div>
</section>
<!-- Book Review Area end -->
