<div class="u-s-m-b-30">
    <div class="shop-w">
        <div class="shop-w__intro-wrap">
            <h1 class="shop-w__h">{{ __('frontend.sections') }}</h1>
            <span class="fas fa-minus shop-w__toggle" data-target="#sections" data-toggle="collapse"></span>
        </div>
        <div class="shop-w__wrap show" id="sections">
            <ul class="shop-w__category-list gl-scroll">
                @foreach (App\Models\Section::with('categories')->active()->get() as $section)
                    <li class="{{ $section->categories->count() ? 'has-list' : '' }} mb-2">
                        <a href="javascript:;" class="pointer-events-none">{{ $section->name }}</a>
                        @if ($section->categories->count() > 0)
                            <span class="js-shop-category-span is-expanded fas fa-plus u-s-m-l-6"></span>
                            <ul style="display:block">
                                @foreach ($section->categories as $cat)
                                    <li class="{{ $cat->subCategories->count() > 0 ? 'has-list' : '' }}">
                                        <a href="{{ route('frontend.category.products', ['url' => $cat->url]) }}">{{ $cat->name }}</a>
                                        <span class="category-list__text u-s-m-l-6">({{ $cat->products->count() ?? 0 }})</span>
                                        @if ($cat->subCategories->count() > 0)
                                            <span class="js-shop-category-span fas fa-plus u-s-m-l-6"></span>
                                            <ul>
                                                @foreach ($cat->subCategories as $sub)
                                                    <li>
                                                        <a href="{{ route('frontend.category.products', ['url' => $sub->url]) }}">{{ $sub->name }} ({{ $sub->products->count() ?? 0 }})</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
