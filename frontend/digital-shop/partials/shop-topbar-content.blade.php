<div class="category-filter category-border-top pt-5 pb-5">
    <div class="container custom-container-one">
        <div class="row">
            <div class="col-lg-12">
                <div class="category-list-wrapper">
                    <ul class="category-grid-list style-02 filter-list">
                        @foreach($categories as $category)
                            <li class="list" data-slug="{{$category->slug}}">
                                {{ $category->name }}
                                <div class="checkbox-inlines">
                                    <input class="check-input" type="checkbox">
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
