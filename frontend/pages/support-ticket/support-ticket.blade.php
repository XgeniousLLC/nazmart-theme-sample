@extends('tenant.frontend.user.dashboard.user-master')

@section('title')
    {{__('Support Ticket')}}
@endsection

@section('site-title')
    {{__('Support Ticket')}}
@endsection

@section('section')
    <div class="parent">
        <h3>{{__('Support Ticket')}}</h3>
        <div class="support-ticket-wrapper mt-4">
            @if(auth()->guard('web')->check())
                <h3 class="title">{{get_static_option('support_ticket_form_title')}}</h3>
                <x-error-msg/>
                <form action="{{route('tenant.frontend.support.ticket.store')}}" method="post" class="support-ticket-form-wrapper" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="via" value="{{__('website')}}">
                    <div class="form-group">
                        <label>{{__('Title')}}</label>
                        <input type="text" class="form-control" name="title" placeholder="{{__('Title')}}">
                    </div>
                    <div class="form-group">
                        <label>{{__('Subject')}}</label>
                        <input type="text" class="form-control" name="subject" placeholder="{{__('Subject')}}">
                    </div>
                    <div class="form-group">
                        <label>{{__('Priority')}}</label>
                        <select name="priority" class="form-control">
                            <option value="low">{{__('Low')}}</option>
                            <option value="medium">{{__('Medium')}}</option>
                            <option value="high">{{__('High')}}</option>
                            <option value="urgent">{{__('Urgent')}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{__('Departments')}}</label>
                        <select name="departments" class="form-control">
                            @foreach($departments as $dep)
                                <option value="{{$dep->id}}">{{$dep->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{__('Description')}}</label>
                        <textarea name="description" class="form-control" cols="30" rows="10" placeholder="{{__('Description')}}"></textarea>
                    </div>
                    <div class="btn-wrapper text-center">
                        <button class="btn btn-submit" type="submit">{{get_static_option('support_ticket_button_text') ?? 'Submit'}}</button>
                    </div>
                </form>
            @else
                @include('tenant.frontend.partials.ajax-login-form',['title' => get_static_option('support_ticket_login_notice')])
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        <x-btn.save/>
    </script>
@endsection
