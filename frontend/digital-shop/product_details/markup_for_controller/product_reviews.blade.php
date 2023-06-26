@foreach($reviews ?? [] as $review)
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
