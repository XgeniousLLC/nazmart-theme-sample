@if(Auth::guard('web')->check())
    <div id="reviews" class="tab-content-item">
    <div class="single-details-tab">
        <div class="review-form my-5">
            <h3>{{__('Leave a Review')}}</h3>
            <form>
                <input type="hidden" class="rating-count" value="">
                <div class="ratings mt-4">
                    <select class="star-rating">
                        <option value="5">{{__('Excellent')}}</option>
                        <option value="4">{{__('Very Good')}}</option>
                        <option value="3" selected>{{__('Average')}}</option>
                        <option value="2">{{__('Poor')}}</option>
                        <option value="1">{{__('Terrible')}}</option>
                    </select>
                </div>

                <div class="form-group mt-4">
                    <textarea rows="8" type="text" name="review_text" class="form-control review-text" id="review-text"></textarea>
                </div>

                <div class="btn-wrapper text-end mt-4">
                    <button type="submit" id="review-submit-btn" class="cmn-btn btn-small cmn-btn-bg-2 radius-0">{{__('Submit Review')}}</button>
                </div>
            </form>
        </div>

        <div class="tab-review">
            <div class="all-reviews">
                @foreach($product->reviews->take(5) ?? [] as $review)
                    <div class="about-seller-flex-content">
                        <div class="about-seller-thumb">
                            <a href="javascript:void(0)">
                                {!! render_image_markup_by_attachment_id($review?->user?->image) !!}
                            </a>
                        </div>
                        <div class="about-seller-content">
                            <h5 class="title fw-500">
                                <a href="javascript:void(0)"> {{$review?->user?->name}} </a>
                            </h5>

                            {!! render_star_rating_markup($review->rating) !!}

                            <p class="about-review-para"> {{$review->review_text}} </p>
                            <span class="review-date"> {{$review->created_at?->diffForHumans()}} </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="btn-wrapper">
                <a href="javascript:void(0)" class="cmn-btn btn-small cmn-btn-bg-2 radius-0 see-more-review" data-items="5"> {{__('See More')}} </a>
            </div>
        </div>
    </div>
</div>
@else
    <div id="reviews" class="tab-content-item">
        <div class="single-details-tab">
            <div class="tab-review">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
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
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" id="login_submit_btn">{{__('Sign In')}}</button>
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
        </div>
    </div>
@endif
