<!-- Compare Area Starts -->
    <section class="compare-area padding-top-75 padding-bottom-50">
        <div class="container container-one">
            <div class="row">
                @foreach($product_array as $product)
                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="single-compare">
                            <div class="single-compare-thumb">
                                <a href="javascript:void(0)">
                                    {!! render_image_markup_by_attachment_id($product->image) !!}
                                </a>
                            </div>
                            <div class="single-compare-contents mt-3">
                                <div class="rating-wrap">
                                    <div class="ratings">
                                        <span class="hide-rating"></span>
                                        <span class="show-rating"></span>
                                    </div>
                                    <p> <span class="total-ratings">(243)</span></p>
                                </div>
                                <h2 class="single-compare-contents-title fw-500 mt-2">
                                    <a href="javascript:void(0)"> Popular T-shirts Collection </a>
                                </h2>
                                <h6 class="single-compare-contents-price mt-2"> $100.00 </h6>
                                <h6 class="single-compare-contents-id mt-3"> Product ID: 55154823 </h6>
                                <p class="single-compare-contents-para"> There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long </p>
                                <ul class="single-compare-contents-list">
                                    <li class="single-compare-contents-list-item color-stock"> In Stock </li>
                                    <li class="single-compare-contents-list-item"> Cotton </li>
                                    <li class="single-compare-contents-list-item"> White </li>
                                    <li class="single-compare-contents-list-item"> H-30” / W-20” </li>
                                </ul>
                                <div class="btn-wrapper">
                                    <a href="javascript:void(0)" class="cmn-btn cmn-btn-bg-2 radius-0 mt-4"> Buy Now </a>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="remove-btn close-compare mt-4"> Remove </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
<!-- Compare Area end -->
