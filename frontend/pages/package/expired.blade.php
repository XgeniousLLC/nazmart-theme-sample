<!DOCTYPE html>
<html lang="{{\App\Facades\GlobalLanguage::default_slug()}}" dir="{{\App\Facades\GlobalLanguage::default_dir()}}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>

        {{get_static_option('site_title')}}

            - {{get_static_option('site_tag_line')}}

    </title>

    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/dynamic-style.css')}}">
    <style>
        :root {
            --main-color-one: {{get_static_option('site_color')}};
            --secondary-color: {{get_static_option('site_main_color_two')}};
            --heading-color: {{get_static_option('site_heading_color')}};
            --paragraph-color: {{get_static_option('site_paragraph_color')}};
            @php $heading_font_family = !empty(get_static_option('heading_font')) ? get_static_option('heading_font_family') :  get_static_option('body_font_family') @endphp
             --heading-font: "{{$heading_font_family}}", sans-serif;
            --body-font: "{{get_static_option('body_font_family')}}", sans-serif;
        }
    </style>
    <style>
        .maintenance-page-content-area {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 0;
            background-size: cover;
            background-position: center;
        }

        .maintenance-page-content-area:after {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: -1;
            content: '';
        }

        .page-content-wrap {
            text-align: center;
        }

        .page-content-wrap .logo-wrap {
            margin-bottom: 30px;
        }

        .page-content-wrap .maintain-title {
            font-size: 45px;
            font-weight: 700;
            color: #fff;
            line-height: 50px;
            margin-bottom: 20px;
        }

        .page-content-wrap p {
            font-size: 16px;
            line-height: 28px;
            color: rgba(255, 255, 255, .7);
            font-weight: 400;
        }

        .page-content-wrap .subscriber-form {
            position: relative;
            z-index: 0;
            max-width: 500px;
            margin: 0 auto;
            margin-top: 40px;
        }

        .page-content-wrap .subscriber-form .submit-btn {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 60px;
            height: 50px;
            text-align: center;
            border: none;
            background-color: var(--main-color-one);
            color: #fff;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .page-content-wrap .subscriber-form .form-group .form-control {
            height: 50px;
            padding: 0 20px;
            padding-right: 80px;
        }
        .counterdown-wrap.event-page #event_countdown .wrapper{
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 120px;
        }
        .counterdown-wrap.event-page #event_countdown {
            display: flex;
            margin-bottom: 30px
        }

        .counterdown-wrap.event-page #event_countdown > div {
            width: calc(100% / 4);
            margin: 5px;
            text-align: center;
            padding: 10px 10px;
            border: 2px dashed rgba(255,255,255,.5);
        }

        .counterdown-wrap.event-page #event_countdown > div .label {
            display: block;
            text-transform: capitalize;
            font-size: 14px;
            color: rgba(255, 255, 255, .8);
            font-weight: 500;
            line-height: 20px
        }

        .counterdown-wrap.event-page #event_countdown > div .time {
            font-size: 30px;
            font-weight: 700;
            color: #fff
        }

        .page-content-wrap .title {
            color: #ff4a4a;
            font-size: 32px;
            line-height: 36px;
            margin-bottom: 40px;
        }


        .page-content-wrap .btn.btn-primary {
            display: inline-block;
            background-color: #5e2ced;
            border: none;
            padding: 15px 30px;
            color: #fff;
            transition: all 300ms;
            text-decoration: none;
        }
        .page-content-wrap .btn.btn-primary:hover {
            background-color: #0a58ca;
            color: #fff;
        }

    </style>
    @yield('style')
    @if( \App\Facades\GlobalLanguage::default_dir() === 'rtl')
        <link rel="stylesheet" href="{{asset('assets/frontend/css/rtl.css')}}">
    @endif
</head>
<body>
@php

    $user_select_lang_slug = \App\Facades\GlobalLanguage::default_slug();
@endphp
<div class="maintenance-page-content-area"
    {!! render_background_image_markup_by_attachment_id(get_static_option('maintenance_bg_image')) !!}
>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="maintenance-page-inner-content">
                    <div class="page-content-wrap">
                        <h2 class="title">{{__('Your package plan has been expired please purchase or renew a package')}}</h2>
                        <a class="btn btn-primary" href="{{route('landlord.homepage') . '#price_plan_section'}}">{{__('Go To Plan Page')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>


