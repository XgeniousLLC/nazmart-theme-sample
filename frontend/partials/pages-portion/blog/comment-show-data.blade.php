
<ul class="comment-list">
    @foreach($blogComments as $key => $data)
        @php
            $avatar_image =
            $commented_user_image = render_image_markup_by_attachment_id(get_static_option('blog_avater_image'),'','thumb');
        @endphp
        <li>
            <div class="single-comment-wrap">
                <div class="thumb">
                    {!! $commented_user_image !!}
                </div>
                <div class="content">
                    <div class="content-top">
                        <div class="left">
                            <h4 class="title" data-parent_name="{{optional($data->user)->name }}">{{optional($data->user)->name ?? ''}}</h4>
                            <ul class="post-meta">
                                <li class="meta-item comment-date">
                                    <i class="lar la-calendar icon"></i>
                                    {{date('d F Y', strtotime($data->created_at ?? ''))}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p class="comment common-para">{!! $data->comment_content ?? '' !!}
                    </p>

                    @if(auth('web')->check() && auth('web')->id() != $data->user_id)
                        <div class="reply">
                            <a href="#" data-comment_id="{{ $data->id }}" class="reply-btn btn-replay"></i><span class="text">{{__('Reply')}}</span></a>
                        </div>
                    @endif
                </div>
            </div>
        </li>

        <li class="has-children">
            <ul>
                @foreach($data->reply as $repData)
                    @php
                        $commented_child_author_image = render_image_markup_by_attachment_id(get_static_option('blog_avater_image'),'','thumb');
                    @endphp
                    <li>
                        <div class="single-comment-wrap">
                            <div class="thumb">
                                {!! $commented_child_author_image !!}
                            </div>
                            <div class="content">
                                <div class="content-top">
                                    <div class="left">
                                        <h4 class="title">{{optional($repData->user)->name }}</h4>
                                        <ul class="post-meta">
                                            <li class="meta-item">
                                                <i class="lar la-calendar icon"></i>
                                                {{date('d F Y', strtotime($repData->created_at ?? ''))}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="comment common-para">{!! $repData->comment_content ?? '' !!}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>

