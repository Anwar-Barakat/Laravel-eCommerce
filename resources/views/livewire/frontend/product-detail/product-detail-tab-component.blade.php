 <div class="u-s-p-y-90">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="pd-tab">
                     <div class="u-s-m-b-30">
                         <ul class="nav pd-tab__list">
                             @if ($product->filters->count() > 0)
                                 <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#pd-specification">{{ __('frontend.specifications') }}</a>
                                 </li>
                             @endif
                             <li class="nav-item">
                                 <a class="nav-link" data-toggle="tab" href="#pd-desc">{{ __('frontend.description') }}</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link active" id="view-review" data-toggle="tab" href="#pd-rev">{{ __('frontend.reviews') }}
                                     <span>(23)</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                     <div class="tab-content">
                         @if ($product->filters->count() > 0)
                             <!--====== Tab 1 ======-->
                             <div class="tab-pane" id="pd-specification">
                                 <div class="pd-tab__desc">
                                     <div class="u-s-m-b-15">
                                         <h4>PRODUCT INFORMATION</h4>
                                     </div>
                                     <div class="u-s-m-b-15">
                                         <div class="pd-table gl-scroll">
                                             <table>
                                                 <tbody>
                                                     @foreach ($product->filters as $productFilter)
                                                         <tr>
                                                             <td>{{ $productFilter->filter->name }}</td>
                                                             <td>{{ $productFilter->filter_value->value }}</td>
                                                         </tr>
                                                     @endforeach
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!--====== End - Tab 1 ======-->
                         @endif


                         <!--====== Tab 2 ======-->
                         <div class="tab-pane" id="pd-desc">
                             <div class="pd-tab__tag">
                                 <div class="u-s-m-b-15">
                                     <p>{{ $product->description }}</p>
                                 </div>
                                 <div class="u-s-m-b-30">
                                     <ul>
                                         <li><i class="fas fa-check u-s-m-r-8"></i>
                                             <span>Buyer Protection.</span>
                                         </li>
                                         <li><i class="fas fa-check u-s-m-r-8"></i>
                                             <span>Full Refund if you don't receive your order.</span>
                                         </li>
                                         <li><i class="fas fa-check u-s-m-r-8"></i>

                                             <span>Returns accepted if product not as described.</span>
                                         </li>
                                     </ul>
                                 </div>
                                 <div class="u-s-m-b-30">
                                     @if ($product->getFirstMediaUrl('product_video'))
                                         <video width="700" class="img img-thumbnail mb-4" controls>
                                             <source src="{{ $product->getFirstMediaUrl('product_video') }}" type="video/mp4" class="img img-thumbnail">
                                             <source src="{{ $product->getFirstMediaUrl('product_video') }}" type="video/ogg" class="img img-thumbnail">
                                             Browser Error
                                         </video>
                                     @endif
                                 </div>
                             </div>
                         </div>
                         <!--====== End - Tab 2 ======-->


                         <!--====== Tab 3 ======-->
                         <div class="tab-pane fade show active" id="pd-rev">
                             <div class="pd-tab__rev">
                                 <div class="u-s-m-b-30">
                                     <div class="pd-tab__rev-score">
                                         <div class="u-s-m-b-8">
                                             <h2>23 Reviews - 4.6 (Overall)</h2>
                                         </div>
                                         <div class="gl-rating-style-2 u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                                         <div class="u-s-m-b-8">
                                             <h4>We want to hear from you!</h4>
                                         </div>

                                         <span class="gl-text">Tell us what you think about this item</span>
                                     </div>
                                 </div>
                                 <div class="u-s-m-b-30">
                                     <form class="pd-tab__rev-f1">
                                         <div class="rev-f1__group">
                                             <div class="u-s-m-b-15">
                                                 <h2>23 Review(s) for Man Ruched Floral Applique Tee</h2>
                                             </div>
                                             <div class="u-s-m-b-15">

                                                 <label for="sort-review"></label><select class="select-box select-box--primary-style" id="sort-review">
                                                     <option selected>Sort by: Best Rating</option>
                                                     <option>Sort by: Worst Rating</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="rev-f1__review">
                                             <div class="review-o u-s-m-b-15">
                                                 <div class="review-o__info u-s-m-b-8">

                                                     <span class="review-o__name">John Doe</span>

                                                     <span class="review-o__date">27 Feb 2018 10:57:43</span>
                                                 </div>
                                                 <div class="review-o__rating gl-rating-style u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>

                                                     <span>(4)</span>
                                                 </div>
                                                 <p class="review-o__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                             </div>
                                             <div class="review-o u-s-m-b-15">
                                                 <div class="review-o__info u-s-m-b-8">

                                                     <span class="review-o__name">John Doe</span>

                                                     <span class="review-o__date">27 Feb 2018 10:57:43</span>
                                                 </div>
                                                 <div class="review-o__rating gl-rating-style u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>

                                                     <span>(4)</span>
                                                 </div>
                                                 <p class="review-o__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                             </div>
                                             <div class="review-o u-s-m-b-15">
                                                 <div class="review-o__info u-s-m-b-8">

                                                     <span class="review-o__name">John Doe</span>

                                                     <span class="review-o__date">27 Feb 2018 10:57:43</span>
                                                 </div>
                                                 <div class="review-o__rating gl-rating-style u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>

                                                     <span>(4)</span>
                                                 </div>
                                                 <p class="review-o__text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                             </div>
                                         </div>
                                     </form>
                                 </div>
                                 <div class="u-s-m-b-30">
                                     <form class="pd-tab__rev-f2">
                                         <h2 class="u-s-m-b-15">Add a Review</h2>

                                         <span class="gl-text u-s-m-b-15">Your email address will not be published. Required fields are marked *</span>
                                         <div class="u-s-m-b-30">
                                             <div class="rev-f2__table-wrap gl-scroll">
                                                 <table class="rev-f2__table">
                                                     <thead>
                                                         <tr>
                                                             <th>
                                                                 <div class="gl-rating-style-2"><i class="fas fa-star"></i>

                                                                     <span>(1)</span>
                                                                 </div>
                                                             </th>
                                                             <th>
                                                                 <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                                                     <span>(1.5)</span>
                                                                 </div>
                                                             </th>
                                                             <th>
                                                                 <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                     <span>(2)</span>
                                                                 </div>
                                                             </th>
                                                             <th>
                                                                 <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                                                     <span>(2.5)</span>
                                                                 </div>
                                                             </th>
                                                             <th>
                                                                 <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                     <span>(3)</span>
                                                                 </div>
                                                             </th>
                                                             <th>
                                                                 <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                                                     <span>(3.5)</span>
                                                                 </div>
                                                             </th>
                                                             <th>
                                                                 <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                     <span>(4)</span>
                                                                 </div>
                                                             </th>
                                                             <th>
                                                                 <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                                                     <span>(4.5)</span>
                                                                 </div>
                                                             </th>
                                                             <th>
                                                                 <div class="gl-rating-style-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                                                     <span>(5)</span>
                                                                 </div>
                                                             </th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         <tr>
                                                             <td>

                                                                 <!--====== Radio Box ======-->
                                                                 <div class="radio-box">

                                                                     <input type="radio" id="star-1" name="rating">
                                                                     <div class="radio-box__state radio-box__state--primary">

                                                                         <label class="radio-box__label" for="star-1"></label>
                                                                     </div>
                                                                 </div>
                                                                 <!--====== End - Radio Box ======-->
                                                             </td>
                                                             <td>

                                                                 <!--====== Radio Box ======-->
                                                                 <div class="radio-box">

                                                                     <input type="radio" id="star-1.5" name="rating">
                                                                     <div class="radio-box__state radio-box__state--primary">

                                                                         <label class="radio-box__label" for="star-1.5"></label>
                                                                     </div>
                                                                 </div>
                                                                 <!--====== End - Radio Box ======-->
                                                             </td>
                                                             <td>

                                                                 <!--====== Radio Box ======-->
                                                                 <div class="radio-box">

                                                                     <input type="radio" id="star-2" name="rating">
                                                                     <div class="radio-box__state radio-box__state--primary">

                                                                         <label class="radio-box__label" for="star-2"></label>
                                                                     </div>
                                                                 </div>
                                                                 <!--====== End - Radio Box ======-->
                                                             </td>
                                                             <td>

                                                                 <!--====== Radio Box ======-->
                                                                 <div class="radio-box">

                                                                     <input type="radio" id="star-2.5" name="rating">
                                                                     <div class="radio-box__state radio-box__state--primary">

                                                                         <label class="radio-box__label" for="star-2.5"></label>
                                                                     </div>
                                                                 </div>
                                                                 <!--====== End - Radio Box ======-->
                                                             </td>
                                                             <td>

                                                                 <!--====== Radio Box ======-->
                                                                 <div class="radio-box">

                                                                     <input type="radio" id="star-3" name="rating">
                                                                     <div class="radio-box__state radio-box__state--primary">

                                                                         <label class="radio-box__label" for="star-3"></label>
                                                                     </div>
                                                                 </div>
                                                                 <!--====== End - Radio Box ======-->
                                                             </td>
                                                             <td>

                                                                 <!--====== Radio Box ======-->
                                                                 <div class="radio-box">

                                                                     <input type="radio" id="star-3.5" name="rating">
                                                                     <div class="radio-box__state radio-box__state--primary">

                                                                         <label class="radio-box__label" for="star-3.5"></label>
                                                                     </div>
                                                                 </div>
                                                                 <!--====== End - Radio Box ======-->
                                                             </td>
                                                             <td>

                                                                 <!--====== Radio Box ======-->
                                                                 <div class="radio-box">

                                                                     <input type="radio" id="star-4" name="rating">
                                                                     <div class="radio-box__state radio-box__state--primary">

                                                                         <label class="radio-box__label" for="star-4"></label>
                                                                     </div>
                                                                 </div>
                                                                 <!--====== End - Radio Box ======-->
                                                             </td>
                                                             <td>

                                                                 <!--====== Radio Box ======-->
                                                                 <div class="radio-box">

                                                                     <input type="radio" id="star-4.5" name="rating">
                                                                     <div class="radio-box__state radio-box__state--primary">

                                                                         <label class="radio-box__label" for="star-4.5"></label>
                                                                     </div>
                                                                 </div>
                                                                 <!--====== End - Radio Box ======-->
                                                             </td>
                                                             <td>

                                                                 <!--====== Radio Box ======-->
                                                                 <div class="radio-box">

                                                                     <input type="radio" id="star-5" name="rating">
                                                                     <div class="radio-box__state radio-box__state--primary">

                                                                         <label class="radio-box__label" for="star-5"></label>
                                                                     </div>
                                                                 </div>
                                                                 <!--====== End - Radio Box ======-->
                                                             </td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                         <div class="rev-f2__group">
                                             <div class="u-s-m-b-15">

                                                 <label class="gl-label" for="reviewer-text">YOUR REVIEW *</label>
                                                 <textarea class="text-area text-area--primary-style" id="reviewer-text"></textarea>
                                             </div>
                                             <div>
                                                 <p class="u-s-m-b-30">

                                                     <label class="gl-label" for="reviewer-name">NAME *</label>

                                                     <input class="input-text input-text--primary-style" type="text" id="reviewer-name">
                                                 </p>
                                                 <p class="u-s-m-b-30">

                                                     <label class="gl-label" for="reviewer-email">EMAIL *</label>

                                                     <input class="input-text input-text--primary-style" type="text" id="reviewer-email">
                                                 </p>
                                             </div>
                                         </div>
                                         <div>

                                             <button class="btn btn--e-brand-shadow" type="submit">SUBMIT</button>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                         <!--====== End - Tab 3 ======-->
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
