<div class="u-s-m-b-30">
    <div class="shop-w">
        @if ($category && $filters)
            @foreach ($filters as $filter)
                @if (in_array($category->id, $filter->categories) && $filter->filter_values->count() > 0)
                    <div class="facet-filter-associates img-thumbnail filtering-padding">
                        <div class="shop-w__intro-wrap">
                            <h1 class="shop-w__h">{{ ucwords($filter->name) }}</h1>
                            <span class="fas fa-minus shop-w__toggle" data-target="#filter{{ $filter->id }}" data-toggle="collapse" aria-expanded="true"></span>
                        </div>
                        <div class="shop-w__wrap show" id="filter{{ $filter->id }}">
                            <ul class="shop-w__list gl-scroll">
                                @foreach ($filter->filter_values as $filterValue)
                                    <li>
                                        <div class="check-box">
                                            <input type="checkbox" id="filter{{ $filterValue->id }}" value="{{ $filterValue->id }}" wire:model='selectedFilters'>
                                            <div class="check-box__state check-box__state--primary">
                                                <label class="check-box__label" for="filter{{ $filterValue->id }}">{{ $filterValue->value }}</label>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</div>
