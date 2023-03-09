@extends(route_prefix().'frontend.frontend-page-master')

@section('title')
    {!! __('Compare Product') !!}
@endsection

@section('page-title')
    {!! __('Compare Product') !!}
@endsection

@section('content')
    <!-- Compare Area Starts -->
    <section class="compare-area padding-top-75 padding-bottom-50">
        <div class="container container-one">
            <div class="row">
                <!-- Compare Area Starts -->
                <section class="compare-area padding-top-75 padding-bottom-50">
                    <div class="container container-one">
                        <div class="row">
                            @forelse(\Gloudemans\Shoppingcart\Facades\Cart::instance("compare")->content() as $product)
                                @php
                                    $data = get_product_dynamic_price($product);
                                    $campaign_name = $data['campaign_name'];
                                    $regular_price = $data['regular_price'];
                                    $sale_price = $data['sale_price'];
                                    $discount = $data['discount'];

                                    $product_slug = \Modules\Product\Entities\Product::find($product->id);
                                    $product_slug = $product_slug->slug;
                                @endphp

                                <div class="col-lg-4 col-md-6 mt-4">
                                    <div class="single-compare">
                                        <div class="single-compare-thumb">
                                            <a href="{{route('tenant.shop.product.details', $product_slug)}}">
                                                {!! render_image_markup_by_attachment_id($product->options->image, '', 'grid') !!}
                                            </a>
                                        </div>
                                        <div class="single-compare-contents mt-3">
                                            <h2 class="single-compare-contents-title fw-500 mt-2">
                                                <a href="{{route('tenant.shop.product.details', $product_slug)}}"> {{$product->name}} </a>
                                            </h2>
                                            <h6 class="single-compare-contents-price mt-2"> {{amount_with_currency_symbol($product->price)}} </h6>

                                            @if(!empty($product?->options['description']))
                                                <h6 class="single-compare-contents-id mt-3"> {{__('SKU:')}} <strong> {{$product?->options?->sku}}</strong> </h6>
                                            @endif

                                            <ul class="single-compare-contents-list">
                                                @if(!empty($product?->options['description']))
                                                    <li class="single-compare-contents-list-item"> <strong>{{__('Description:')}}</strong>
                                                        {!! $product?->options['description'] !!}
                                                    </li>
                                                @endif

                                                @if(!empty($product->options["color_name"] ?? ''))
                                                    <li class="single-compare-contents-list-item"> <strong>{{__('Color:')}}</strong>
                                                        <ul class="list_sub_item color-ul">
                                                            <li data-color-code="{{$product->options['color_name']}}">{{$product->options['color_name']}}</li>
                                                        </ul>
                                                    </li>
                                                @endif

                                                @if(!empty($product->options["size_name"]))
                                                    <li class="single-compare-contents-list-item"> <strong>{{__('Size:')}}</strong>
                                                        <ul class="list_sub_item">
                                                            <li>{{$product->options['size_name']}}</li>
                                                        </ul>
                                                    </li>
                                                @endif

                                                @forelse($product->options["attributes"] ?? [] as $key => $value)
                                                    <li class="single-compare-contents-list-item"> <strong>{{ $key }}</strong>
                                                        <ul class="list_sub_item">
                                                            <li>{{ $value }}</li>
                                                        </ul>
                                                    </li>
                                                @empty

                                                @endforelse
                                            </ul>
                                        </div>
                                        <a href="javascript:void(0)"
                                           class="remove-btn close-compare compare-remove-btn mt-4"
                                           data-product_id="{{$product->rowId}}"
                                        > {{__('Remove')}} </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <h4 class="text-center">{{__('No Product Available')}}</h4>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </section>
                <!-- Compare Area end -->
            </div>
        </div>
    </section>
    <!-- Compare Area end -->

    @include(include_theme_path('shop.partials.shop-footer'))
@endsection

@section('scripts')
    <script>
        $(function (){
            /* ========================================
                Compare Click Close
            ======================================== */
            $(document).on('click', '.compare-remove-btn', function () {
                let product_id = $(this).data('product_id');

                $.ajax({
                    url: '{{route('tenant.shop.compare.product.remove')}}',
                    type: 'GET',
                    data: {
                        product_id: product_id
                    },
                    beforeSend: function () {
                        $('.loader').show();
                    },
                    success: function (data) {
                        $('.loader').hide();

                        let sessionData = sessionStorage;
                        let ids = sessionData['products'].split(',');

                        $.each(ids, function (index ,value){
                            if (value == product_id)
                            {
                                ids.splice(index, 1);
                            }
                        });

                        let new_items = String(ids.join(","));

                        sessionStorage.clear();
                        if (new_items !== '')
                        {
                            sessionStorage.setItem('products', new_items);
                        }
                    },
                    error: function (data) {
                        $('.loader').hide();
                    }
                });
            });
        });
    </script>
@endsection
