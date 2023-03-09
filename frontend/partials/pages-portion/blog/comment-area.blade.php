<div class="comment-area-full-wrapper" data-padding-top="40">
    <!-- User comment area start -->
    <div class="user-comment-area" >
        <div class="comment-section-title section-title-style-03">

            @if($blogCommentCount > 0)
                <h3 class="title"><span class="total">
                 {{'('.$blogCommentCount.')'}}{{__('Comments')}}
            </span> </h3>
            @endif
</div>

<div class="comments-inner mt-5">

<div class="comments-flex-contents" id="comment_content_div">
{{ csrf_field() }}
<div id="comment_data" data-items="5">
   @include('tenant.frontend.partials.pages-portion.blog.comment-show-data')
</div>

@if($blogComments->count())
   @if($blogComments->count() > 4)
       <div class="load_more_div mt-4 btn-wrapper">
           <button  class="load-more-btn btn-default boxed-btn d-block w-100 " id="load_more_comment_button">{{__('Load More')}}</button>
       </div>
   @endif
@endif
</div>
</div>
</div>

<div class="custom-login" data-padding-top="50">
@if(!auth()->guard('web')->check())
@include('landlord.frontend.partials.ajax-user-login-markup',['title' => get_static_option('blog_single_page_login_title_'.get_user_lang().'_text')])
@endif
</div>


@if(auth()->guard('web')->check())
<div class="comment-form-area" data-padding-top="0">
<div class="comment-section-title section-title-style-03">
<h3 class="title">{{__('Post Your Comments')}}</h3>
</div>

<form action="{{route(route_prefix().'frontend.blog.comment.store')}}" class="comment-form" id="blog-comment-form">
@csrf
<div class="error-message"></div>
<div class="row">
   <input type="hidden" name="comment_id"/>
   <input type="hidden" name="blog_id" id="blog_id"
          value="{{$blog_post->id}}">
   <input type="hidden" name="user_id" id="user_id"
          value="{{auth()->guard('web')->user()->id}}">

   <input type="hidden" name="commented_by" id="commented_by"
          value="{{auth()->guard('web')->user()->name}}">

   <div class="col-lg-12">
       <div class="form-group">
           <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Comments" cols="30" rows="10" ></textarea>
       </div>
   </div>
   <div class="col-lg-12">
       <div class="btn-wrapper">
           <button type="submit" class="btn-default boxed-btn utility-btn transparent-btn mt-4" id="submitComment">{{__('Comment')}}</button>
       </div>
   </div>
</div>
</form>
</div>
@endif
</div>
