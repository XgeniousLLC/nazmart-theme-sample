@php
    $image_one = get_static_option('background_image_one');
    $image_two = get_static_option('background_image_two');
    $image_three = get_static_option('background_image_three');
    $image_four = get_static_option('background_image_four');
    $image_five = get_static_option('background_image_five');
@endphp
<div class="badge-area badge-padding bg-item-four
@if((in_array(request()->route()->getName(),['tenant.frontend.homepage','tenant.dynamic.page']) && !empty($page_post) && $page_post->breadcrumb == 0 ))
        d-none
@endif">
    <div class="badge-shapes">
        {!! render_image_markup_by_attachment_id($image_one) !!}
        {!! render_image_markup_by_attachment_id($image_two) !!}
        {!! render_image_markup_by_attachment_id($image_three) !!}
        {!! render_image_markup_by_attachment_id($image_four) !!}
        {!! render_image_markup_by_attachment_id($image_five) !!}
    </div>
    <div class="container-three">
        <div class="row">
            <div class="col-lg-12">
                <div class="badge-contents">
                    <h1 class="badge-title"> @yield('page-title') </h1>

                    <ul class="bage-list margin-top-10">
                        <li class="list"> <a href="{{route('tenant.frontend.homepage')}}"> {{__('Home')}} </a> </li>

                        @if(Route::currentRouteName() === 'tenant.dynamic.page')
                            <li class="list"> <a href="#"> {!! $page_post->title ?? '' !!} </a> </li>
                        @else
                            <li class="list"> @yield('page-title') </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
