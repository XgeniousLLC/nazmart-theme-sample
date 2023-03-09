<div class="create-account-wrapper shift-address-form mt-4 mt-lg-5">
    <a href="javascript:void(0)"
       class="create-accounts shift-another-address click-open-form3 fw-500 color-heading"> {{__('Shift Another Address')}} </a>
    <div class="checkout-address-form-wrapper border-1">
        <div class="signin-contents">
            <h2 class="checkout-form-contents-title"> {{__('Address Shift')}} </h2>
            <div class="login-form checkout-form">
                <div class="checkout-form-flex">
                    <div class="single-input mt-4">
                        <label class="label-title mb-3"> {{__('Country')}} </label>
                        <select class="form--control shift-another-country" name="shift_country" id="country">
                            <option value="" selected disabled>{{__('Select a country')}}</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="single-input mt-4">
                        <label class="label-title mb-3"> {{__('State')}} </label>
                        <select class="form--control shift-another-state" name="shift_state" id="state"></select>
                    </div>
                    <div class="single-input mt-4">
                        <label class="label-title mb-3"> {{__('City/Town')}} </label>
                        <input class="form--control" type="text" placeholder="Type City/Town" name="shift_city">
                    </div>
                </div>
                <div class="checkout-form-flex">
                    <div class="single-input mt-4">
                        <label class="label-title mb-3"> {{__('Name')}} </label>
                        <input class="form--control" type="tel" placeholder="Type Full Name" name="shift_name">
                    </div>
                    <div class="single-input mt-4">
                        <label class="label-title mb-3"> {{__('Mobile Number')}} </label>
                        <input class="form--control" type="tel" placeholder="Type Mobile Number" name="shift_phone">
                    </div>
                    <div class="single-input mt-4">
                        <label class="label-title mb-3"> {{__('Email Address')}} </label>
                        <input class="form--control" type="text" name="shift_email" placeholder="Type Email">
                    </div>
                </div>
                <div class="checkout-form-flex">
                    <div class="single-input mt-4">
                        <label class="label-title mb-3"> {{__('Address')}} </label>
                        <textarea class="form--control form--message" name="shift_address"
                                  placeholder="Type Address"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
