<span class="checkout-title fw-500 color-heading"> <i class="las la-exclamation-circle"></i> {{__('Returning Customer?')}} <a class="click-open-form" href="javascript:void(0)"> {{__('Click here to Login')}} </a> </span>

<div class="checkout-form-open">
    <div class="checkout-form-contents border-1 form-padding">
        <h2 class="checkout-form-contents-title"> {{__('Sign In')}} </h2>
        <div class="login-form mt-4">
            <div class="contact-page-form style-01" id="login_form_order_page">
                @csrf
                <div class="error-wrap"></div>
                <div class="form-group">
                    <input type="text" name="username" class="form-control"
                           placeholder="{{__('Username')}}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{__('Password')}}">
                </div>
                <div class="form-group btn-wrapper">
                    <button class="btn-default rounded-btn" id="login_btn"
                            type="submit">{{__('Login')}}</button>
                </div>
                <div class="row mb-4 rmber-area">
                    <div class="col-6">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" name="remember" class="custom-control-input"
                                   id="remember">
                            <label class="custom-control-label"
                                   for="remember">{{__('Remember Me')}}</label>
                        </div>
                    </div>
                    <div class="col-6 order-page-login-register-right">
                        <a class="d-block"
                           href="{{route('tenant.user.register')}}">{{__('Create new account?')}}</a>
                        <a href="{{route('tenant.user.forget.password')}}">{{__('Forgot Password?')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
