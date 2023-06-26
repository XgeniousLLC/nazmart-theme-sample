<div class="book-details-sidebar-content bg-white sidebar-content-padding">
    <div class="book-details-sidebar-content-single single-sidebar-border">
        <span class="book-details-sidebar-content-sub"> {{__('Author')}} </span>
        <h4 class="book-details-sidebar-content-title"> {{$product->additionalFields?->author?->name}} </h4>
    </div>

    @if(!empty($product->additionalFields?->pages))
        <div class="book-details-sidebar-content-single single-sidebar-border">
            <span class="book-details-sidebar-content-sub"> {{__('Number of pages')}} </span>
            <h4 class="book-details-sidebar-content-title"> {{$product->additionalFields?->pages}} </h4>
        </div>
    @endif

    @if(!empty($product->release_date))
        <div class="book-details-sidebar-content-single single-sidebar-border">
            <span class="book-details-sidebar-content-sub"> {{__('Release Date')}} </span>
            <h4 class="book-details-sidebar-content-title"> {{$product->release_date->format('d M Y')}} </h4>
        </div>
    @endif

    @if(!empty($product->update_date))
        <div class="book-details-sidebar-content-single single-sidebar-border">
            <span class="book-details-sidebar-content-sub"> {{__('Update Date')}} </span>
            <h4 class="book-details-sidebar-content-title"> {{$product->update_date->format('d M Y')}} </h4>
        </div>
    @endif

    @if(!empty($product->additionalFields?->high_resolution))
        @php
            $resolution = match($product->additionalFields?->high_resolution){
                'yes' => __('High Resolution'),
                'no' => __('Low Resolution')
            }
        @endphp
        <div class="book-details-sidebar-content-single single-sidebar-border">
            <span class="book-details-sidebar-content-sub"> {{__('Resolution')}} </span>
            <h4 class="book-details-sidebar-content-title"> {{$resolution}} </h4>
        </div>
    @endif

    @if(!empty($product->additionalFields?->language))
        <div class="book-details-sidebar-content-single single-sidebar-border">
            <span class="book-details-sidebar-content-sub"> {{__('Language')}} </span>
            <h4 class="book-details-sidebar-content-title"> {{$product->additionalFields?->getLanguage?->name}} </h4>
        </div>
    @endif

    @if(!empty($product->additionalCustomFields))
        <div class="book-details-sidebar-content-single single-sidebar-border">
            @foreach($product->additionalCustomFields ?? [] as $customFiled)
                <span class="book-details-sidebar-content-sub"> {{$customFiled->option_name}} </span>
                <h4 class="book-details-sidebar-content-title"> {{$customFiled->option_value}} </h4>
            @endforeach
        </div>
    @endif
</div>
