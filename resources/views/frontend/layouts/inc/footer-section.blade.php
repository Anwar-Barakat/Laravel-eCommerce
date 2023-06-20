     <footer>
         <div class="outer-footer">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-4 col-md-6">
                         <div class="outer-footer__content u-s-m-b-40">
                             <span class="outer-footer__content-title">Contact Us</span>
                             <div class="outer-footer__text-wrap"><i class="fas fa-home"></i>
                                 <span>{{ get_setting()->address }}</span>
                             </div>
                             <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>
                                 <span>{{ get_setting()->mobile }}</span>
                             </div>
                             <div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>
                                 <span>{{ get_setting()->email }}</span>
                             </div>
                             <div class="outer-footer__social">
                                 <ul>
                                     <li>
                                         <a class="s-fb--color-hover" href="{{ get_setting()->facebook_url }}"><i class="fab fa-facebook-f"></i></a>
                                     </li>
                                     <li>
                                         <a class="s-tw--color-hover" href="{{ get_setting()->twitter_url }}"><i class="fab fa-twitter"></i></a>
                                     </li>
                                     <li>
                                         <a class="s-insta--color-hover" href="{{ get_setting()->instagram_url }}"><i class="fab fa-instagram"></i></a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-4 col-md-6">
                         <div class="row">
                             <div class="col-lg-6 col-md-6">
                                 <div class="outer-footer__content u-s-m-b-40">

                                     <span class="outer-footer__content-title">Information</span>
                                     <div class="outer-footer__list-wrap">
                                         <ul>
                                             <li>
                                                 <a href="{{ route('frontend.cart.index') }}">Cart</a>
                                             </li>
                                             <li>

                                                 <a href="{{ route('frontend.profile.index') }}">Account</a>
                                             </li>
                                             <li>

                                                 <a href="{{ __('frontend.shop') }}">Shop</a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-6">
                                 <div class="outer-footer__content u-s-m-b-40">
                                     <div class="outer-footer__list-wrap">

                                         <span class="outer-footer__content-title">Our Company</span>
                                         <ul>
                                             <li>

                                                 <a href="about.html">About us</a>
                                             </li>
                                             <li>

                                                 <a href="{{ route('frontend.pages.contact') }}">Contact Us</a>
                                             </li>
                                             <li>

                                                 <a href="index.html">Sitemap</a>
                                             </li>
                                             <li>

                                                 <a href="dash-my-order.html">Delivery</a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-4 col-md-12">
                         <div class="outer-footer__content">

                             <span class="outer-footer__content-title">Join our Newsletter</span>
                             <form class="newsletter">
                                 <div class="u-s-m-b-15">
                                     <div class="radio-box newsletter__radio">
                                         <input type="radio" id="male" name="gender">
                                         <div class="radio-box__state radio-box__state--primary">
                                             <label class="radio-box__label" for="male">Male</label>
                                         </div>
                                     </div>
                                     <div class="radio-box newsletter__radio">

                                         <input type="radio" id="female" name="gender">
                                         <div class="radio-box__state radio-box__state--primary">

                                             <label class="radio-box__label" for="female">Female</label>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="newsletter__group">

                                     <label for="newsletter"></label>

                                     <input class="input-text input-text--only-white" type="text" id="newsletter" placeholder="Enter your Email">

                                     <button class="btn btn--e-brand newsletter__btn" type="submit">SUBSCRIBE</button>
                                 </div>

                                 <span class="newsletter__text">Subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.</span>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="lower-footer">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="lower-footer__content">
                             <div class="lower-footer__copyright">
                                 {{ get_setting()->footer }}
                             </div>
                             <div class="lower-footer__payment">
                                 <ul>
                                     <li><i class="fab fa-cc-stripe"></i></li>
                                     <li><i class="fab fa-cc-paypal"></i></li>
                                     <li><i class="fab fa-cc-mastercard"></i></li>
                                     <li><i class="fab fa-cc-visa"></i></li>
                                     <li><i class="fab fa-cc-discover"></i></li>
                                     <li><i class="fab fa-cc-amex"></i></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </footer>
