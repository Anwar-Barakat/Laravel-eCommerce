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
                         @livewire('frontend.product-detail.product-rating-component', ['product' => $product])
                         <!--====== End - Tab 3 ======-->
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
