<div class="product-o product-o--hover-on">
    <div class="product-o__wrap product-shadow">
        <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">
            @if ($product->getFirstMediaUrl('products', 'small'))
                <img class="aspect__img" src="{{ $product->getFirstMediaUrl('products', 'small') }}" alt="{{ $product->name }}">
            @else
                <img class="aspect__img" src="{{ asset('frontend/dist/images/product/electronic/product13.jpg') }}" alt="{{ $product->name }}">
            @endif
        </a>
        <div class="product-o__action-wrap">
            <ul class="product-o__action-list">
                <li>
                    <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                </li>
                <li>
                    <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                </li>
                <li>
                    <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                </li>
                <li>
                    <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <span class="product-o__category">
        <a href="">{{ $product->category->name }}</a>
    </span>
    <span class="product-o__name">
        <a href="product-detail.html">{{ $product->name }}</a>
    </span>
    <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
        <span class="product-o__review">(0)</span>
    </div>
    @php
        $dataPrices = App\Models\Product::applyDiscount($product->id, $product->price);
    @endphp
    @isset($dataPrices)
        @if ($dataPrices['discount'] > 0)
            <span class="font-weight-bold product-o__price text-green">
                ${{ $dataPrices['final_price'] }}
                <span class="text-secondary font-weight-normal product-o__discount text-red">${{ $dataPrices['original_price'] }}</span>
            </span>
        @else
            <span class="font-weight-bold product-o__price">
                ${{ $product->price }}
            </span>
        @endif
    @endisset
</div>
