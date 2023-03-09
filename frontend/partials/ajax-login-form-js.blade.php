<script>
    (function (){
        "use strict";

        $(document).on('click', '#login_btn', function (e) {
            e.preventDefault();
            var formContainer = $('#login_form_order_page');
            var el = $(this);
            var username = formContainer.find('input[name="username"]').val();
            var password = formContainer.find('input[name="password"]').val();
            var remember = formContainer.find('input[name="remember"]').val();

            el.text('{{__("Please Wait")}}');

            $.ajax({
                type: 'post',
                url: "{{route('tenant.user.ajax.login')}}",
                data: {
                    _token: "{{csrf_token()}}",
                    username : username,
                    password : password,
                    remember : remember,
                },
                success: function (data){
                    if(data.status == 'invalid'){
                        el.text('{{__("Login")}}')
                        formContainer.find('.error-wrap').html('<div class="alert alert-danger">'+data.msg+'</div>');
                    }else{
                        formContainer.find('.error-wrap').html('');
                        el.text('{{__("Login Success.. Redirecting ..")}}');
                        location.reload();
                    }
                },
                error: function (data){
                    var response = data.responseJSON.errors
                    formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                    $.each(response,function (value,index){
                        formContainer.find('.error-wrap ul').append('<li>'+value+'</li>');
                    });
                    el.text('{{__("Login")}}');
                }
            });
        });

    })(jQuery)
</script>
