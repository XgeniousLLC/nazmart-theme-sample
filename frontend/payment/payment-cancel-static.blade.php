@extends('tenant.frontend.frontend-page-master')
@section('title')
    {{__('Order Cancelled')}}
@endsection
@section('content')
    <div class="error-page-content padding-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="order-cancel-area">
                         <div class="alert alert-warning">
                              <h5 class="title">{{ __('Your Order Has been canceled') }}</h5>
                         </div>
                        <div class="btn-wrapper text-center mt-5">
                            <a href="{{url('/')}}" class="boxed-btn btn btn-primary">{{__('Back To Home')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
