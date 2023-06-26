@extends(route_prefix().'frontend.frontend-page-master')

@section('title')
    {!! __('Search') !!}
@endsection

@section('page-title')
    {!! __('Search') !!}
@endsection

@section('content')
    <!-- Shop area starts -->
    <section class="shop-area padding-top-100 padding-bottom-50">
        <div class="container-one">
            <div class="shop-contents-wrapper">
                <div id="tab-grid2" class="tab-content-item active">
                    <div class="row">
                        <div class="col-12">
                            <h4>{{__('Search Result For:').' '.$search}}</h4>
                        </div>
                    </div>
                    <div class="row mt-4 gy-5">
                        @foreach($product_object as $product)
                            @php
                                $data = get_product_dynamic_price($product);
                                $campaign_name = $data['campaign_name'];
                                $regular_price = $data['regular_price'];
                                $sale_price = $data['sale_price'];
                                $discount = $data['discount'];
                            @endphp

                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <div class="global-card no-shadow radius-0 pb-0">
                                    <div class="global-card-thumb">
                                        <a href="{{route('tenant.shop.product.details', $product->slug)}}">
                                            {!! render_image_markup_by_attachment_id($product->image_id, '', 'grid') !!}
                                        </a>
                                        <div class="global-card-thumb-badge right-side">
                                            @if($discount != null)
                                                <span
                                                    class="global-card-thumb-badge-box bg-color-two"> {{$discount}}% {{__('off')}} </span>
                                            @endif

                                            @if(!empty($product->badge))
                                                <span
                                                    class="global-card-thumb-badge-box bg-color-new"> {{$product?->badge?->name}} </span>
                                            @endif
                                        </div>

                                        @include('tenant.frontend.shop.partials.product-options')
                                    </div>

                                    <div class="global-card-contents">
                                        <div class="global-card-contents-flex">
                                            <h5 class="global-card-contents-title">
                                                <a href="javascript:void(0)"> {{Str::words($product->name, 15)}} </a>
                                            </h5>
                                            {!! render_product_star_rating_markup_with_count($product) !!}
                                        </div>
                                        <div class="price-update-through mt-3">
                                            <span class="flash-prices color-two"> {{float_amount_with_currency_symbol($sale_price)}} </span>
                                            <span
                                                class="flash-old-prices"> {{$regular_price != null ? float_amount_with_currency_symbol($regular_price) : ''}} </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="pagination mt-60">
                            <ul class="pagination-list">
                                {!! $product_object->links() !!}
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Shop area end -->

    <!-- Shop Details Modal area end -->
    @include(include_theme_path('shop.partials.product-quick-view'))
    <!-- Shop Details Modal area end -->

    @include(include_theme_path('shop.partials.shop-footer'))
@endsection

@section('scripts')
    <script>
        $(function (){
            // Wishlist Product
            $(document).on('click', '.wishlist-btn', function (e){
                let el = $(this);
                let product = el.data('product_id');

                $.ajax({
                    url: '{{route('tenant.shop.wishlist.product')}}',
                    type: 'GET',
                    data: {
                        product_id : product
                    },
                    beforeSend: function (){
                        $('.loader').show();
                    },
                    success: function (data){
                        $('.loader').hide();


                        if (data.type === 'success')
                        {
                            toastr.success(data.msg)
                        } else {
                            toastr.error(data.msg);
                        }
                    },
                    error: function (data){
                        $('.loader').hide();
                    }
                });
            });

            /*========================================
                Product Quick View Modal
            ========================================*/
            $(document).on('click', 'a.popup-modal', function (e){
                let el = $(this).parent();
                let id = el.data('id');
                let modal = $('#product-modal');

                $.ajax({
                    type: 'GET',
                    url: '{{route('tenant.shop.quick.view')}}',
                    data: {
                        'id': id,
                    },

                    beforeSend: function () {
                        $('.loader').show();
                    },
                    success: function (data) {
                        modal.html(data.product_modal);

                        setInterval(() => {
                            $('.loader').hide();
                        }, 700)
                    },
                    error: function (data) {

                    }
                });
            });
        });
    </script>
@endsection
