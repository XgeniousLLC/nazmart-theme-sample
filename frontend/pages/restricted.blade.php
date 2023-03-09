@extends('tenant.frontend.frontend-master')

@section('title')
    {{__('Restricted')}}
@endsection

@section('style')
    <style>
        .auth-form-light-wrap {
            max-width: 500px;
            margin-inline: auto;
            background-color: #fff;
            padding: 50px 30px;
            box-shadow: 0 0 20px #f3f3f3;
        }
        .brand-logo-restricted {
            max-width: 250px;
            margin: auto;
        }
        .auth-form-light-title {
            font-size: 20px;
            font-weight: 500;
            line-height: 1.3;
        }
        .padding-top-100 {
            padding-top: 100px;
        }
        .padding-bottom-100 {
            padding-bottom: 100px;
        }
        @media screen and (max-width: 991px){
            .padding-top-100 {
                padding-top: 70px;
            }
            .padding-bottom-100 {
                padding-bottom: 70px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="auth-restricted-area padding-top-100 padding-bottom-100">
        <div class="auth-form-light auth-form-light-wrap text-left">
            <div class="brand-logo brand-logo-restricted text-center">
                {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
            </div>
            <div class="auth-form-light-contents mt-4">
                <h5 class="auth-form-light-title text-center text-danger">{{__('Your account is under review or restricted. Kindly contact admin')}}</h5>
            </div>
        </div>
    </div>
@endsection
