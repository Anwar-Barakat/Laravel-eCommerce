<div class="tab-pane fade show active" id="pd-rev">
    <div class="pd-tab__rev">
        <div class="u-s-m-b-30">
            <div class="pd-tab__rev-score">
                @php
                    $reviews_count = $reviews->count();
                    $reviews_avg = $reviews_count ? $reviews->sum('rating') / $reviews_count : 0;
                @endphp
                <div class="u-s-m-b-8">
                    <h2>{{ $reviews_count ?? 0 }} {{ __('frontend.reviews') }} - {{ $reviews_avg ?? 0 }} ({{ __('frontend.overall') }})</h2>
                </div>
                <div class="gl-rating-style-2 u-s-m-b-8">
                    @for ($i = 1; $i <= $reviews_avg; $i++)
                        <i class="fas fa-star"></i>
                    @endfor

                    @if ($reviews_avg - floor($reviews_avg) > 0)
                        <i class="fas fa-star-half-alt"></i>
                    @endif
                </div>
                <div class="u-s-m-b-8">
                    <h4>{{ __('frontend.we_want_to_hear_from_you') }}</h4>
                </div>
                <span class="gl-text">{{ __('frontend.tell_us_what_you_think_about_this_item') }}</span>
            </div>
            
        </div>
        <div class="u-s-m-b-30">
            <form class="pd-tab__rev-f1">
                <div class="rev-f1__group">
                    <div class="u-s-m-b-15">
                        <h2>{{ $reviews->count() ?? 0 }} {{ __('frontend.reviews') }} {{ __('frontend.for') }} {{ $product->name }}</h2>
                    </div>
                    <div class="flex gap-2 flex-wrap items-center">
                        <div class="u-s-m-b-15">
                            <label for="sort-review"></label>
                            <select class="select-box select-box--primary-style" id="sort-review" wire:model='order_by'>
                                <option value="rating">{{ __('msgs.sort_by') }}: {{ __('frontend.rating') }}</option>
                                <option value="created_at">{{ __('msgs.sort_by') }}: {{ __('msgs.created_at') }}</option>
                            </select>
                        </div>
                        <div class="u-s-m-b-15">
                            <label for="sort-review"></label>
                            <select class="select-box select-box--primary-style" wire:model='sort_by'>
                                <option value="">{{ __('btns.select') }}</option>
                                <option value="asc">{{ __('msgs.asc') }}</option>
                                <option value="desc">{{ __('msgs.desc') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="rev-f1__review">
                    @forelse ($reviews as $review)
                        <div class="review-o u-s-m-b-15">
                            <div class="review-o__info u-s-m-b-8">
                                <span class="review-o__name">{{ $review->user->full_name }}</span>
                                <span class="review-o__date">{{ $review->create_at }}</span>
                            </div>
                            <div class="review-o__rating gl-rating-style u-s-m-b-8">
                                @for ($i = 1; $i <= $review->rating; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor

                                @if ($review->rating - floor($review->rating) > 0)
                                    <i class="fas fa-star-half-alt"></i>
                                @endif
                                <span>({{ $review->rating }})</span>
                            </div>
                            <p class="review-o__text">{{ $review->review }}</p>
                        </div>
                    @empty
                        <div class="review-o u-s-m-b-15">
                            <h5>{{ __('msgs.not_found') }}</h5>
                        </div>
                    @endforelse
                </div>
            </form>
        </div>
        <div class="u-s-m-b-30">
            <form class="pd-tab__rev-f2" wire:submit.prevent='addRating()'>
                <h2 class="u-s-m-b-15">{{ __('frontend.add_a_review') }}</h2>
                <span class="gl-text u-s-m-b-15">{{ __('frontend.add_a_review_note') }}</span>
                <div class="u-s-m-b-30">
                    <div class="rev-f2__table-wrap gl-scroll">
                        <table class="rev-f2__table">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="gl-rating-style-2">
                                            <i class="fas fa-star"></i>
                                            <span>(1)</span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="gl-rating-style-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span>(2)</span>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="gl-rating-style-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span>(3)</span>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="gl-rating-style-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span>(4)</span>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="gl-rating-style-2">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                            <span>(5)</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <td>
                                            <!--====== Radio Box ======-->
                                            <div class="radio-box">
                                                <input type="radio" name="rating" id="star-{{ $i }}" wire:model.debounce.500s='rating.rating' value="{{ $i }}">
                                                <div class="radio-box__state radio-box__state--primary">
                                                    <label class="radio-box__label" for="star-{{ $i }}"></label>
                                                </div>
                                            </div>
                                            <!--====== End - Radio Box ======-->
                                        </td>
                                    @endfor
                                </tr>
                            </tbody>
                        </table>
                        <x-input-error :messages="$errors->get('rating.rating')" class="mt-2" />
                    </div>
                </div>
                <div class="rev-f2__group">
                    <div class="u-s-m-b-15">
                        <label class="gl-label" for="reviewer-text">{{ __('frontend.your_review') }} *</label>
                        <textarea wire:model.debounce.500s='rating.review' class="text-area text-area--primary-style" id="reviewer-text"></textarea>
                        <x-input-error :messages="$errors->get('rating.review')" class="mt-2" />
                    </div>
                    <div>
                        <div class="u-s-m-b-30">
                            <label class="gl-label" for="reviewer-name">{{ __('frontend.full_name') }} *</label>
                            <input wire:model.debounce.500s='rating.name' class="input-text input-text--primary-style" type="text" id="reviewer-name">
                            <x-input-error :messages="$errors->get('rating.name')" class="mt-2" />
                        </div>
                        <div class="u-s-m-b-30">
                            <label class="gl-label" for="reviewer-email">{{ __('frontend.email') }} *</label>
                            <input wire:model.debounce.500s='rating.email' class="input-text input-text--primary-style" type="text" id="reviewer-email">
                            <x-input-error :messages="$errors->get('rating.email')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn--e-brand-shadow" type="submit">{{ __('btns.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
