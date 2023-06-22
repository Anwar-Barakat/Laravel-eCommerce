  <div class="u-s-p-b-60">

      <!--====== Section Intro ======-->
      <div class="section__intro u-s-m-b-46">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="section__text-wrap">
                          <a class="section__heading u-c-secondary u-s-m-b-12 mb-3" id="new-arrivals">{{ __('frontend.new_arrival') }}</a>

                          <span class="section__span u-c-silver">GET UP FOR NEW ARRIVALS</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--====== End - Section Intro ======-->


      <!--====== Section Content ======-->
      <div class="section__content">
          <div class="container">
              <div class="slider-fouc">
                  <div class="owl-carousel product-slider" data-item="4">
                      @foreach ($new_arrivals as $product)
                          <x-front-product-block :product="$product" />
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
      <!--====== End - Section Content ======-->
  </div>
