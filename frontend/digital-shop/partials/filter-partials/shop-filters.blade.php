@if($errors->any())
    <div class="alert alert-danger search-results-fields">
        <ul class="list-none">
            <button type="button" class="close btn-sm" data-bs-dismiss="alert">×</button>
            @foreach($errors->all() as $error)
                <li> {{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row align-items-center justify-content-between">
    <div class="col-xl-6 col-lg-6">
        <div class="selectder-filter-contents click-hide-filter" style="display: none">
            <span> {{__('Selected Filter:')}}</span>
            <div class="selected-clear-items">
                <ul class="selected-flex-list" id="_porduct_fitler_item">

                </ul>
                <a class="click-hide-parent" data-filter="all" href="javascript:void(0)"> {{__('Clear All')}} </a>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6">
        <div class="shop-right">
            <span class="showing-results color-light"> {{__('Showing')}} 1-{{$pagination->count()}} {{__('of')}} {{$pagination->total()}} {{__('results')}} </span>
            <div class="single-shops">
                <div class="shop-nice-select" id="nice-select">
                    <select>
                        <option value="3"> {{__('Sort By Date')}} </option>
                        <option value="1"> {{__('Sort By Name')}} </option>
                        <option value="2"> {{__('Sort By Popularity')}} </option>
                        <option value="4"> {{__('Lowest to Highest')}} </option>
                        <option value="5"> {{__('Highest to Lowest')}} </option>
                    </select>
                </div>
            </div>
            <div class="single-shops">
                <ul class="shop-flex-icon tabs">
                    <li class="shop-icons" data-tab="tab-grid">
                        <a href="javascript:void(0)" class="icon"> <i class="las la-bars"></i> </a>
                    </li>
                    <li class="shop-icons active" data-tab="tab-grid2">
                        <a href="javascript:void(0)" class="icon"> <i class="las la-border-all"></i> </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
