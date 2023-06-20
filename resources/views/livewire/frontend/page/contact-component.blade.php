 <!--====== App Content ======-->
 <div class="app-content">

     <!--====== Section 1 ======-->
     <div class="u-s-p-y-60">

         <!--====== Section Content ======-->
         <div class="section__content">
             <div class="container">
                 <div class="breadcrumb">
                     <div class="breadcrumb__wrap">
                         <ul class="breadcrumb__list">
                             <li class="has-separator">
                                 <a href="{{ route('frontend.home') }}">Home</a>
                             </li>
                             <li class="is-marked">
                                 <a href="contact.html">{{ __('frontend.contact_us') }}</a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--====== End - Section 1 ======-->


     <!--====== Section 2 ======-->
     <div class="u-s-p-b-60">

         <!--====== Section Content ======-->
         <div class="section__content">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="g-map">
                             <div id="map"></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!--====== End - Section Content ======-->
     </div>
     <!--====== End - Section 2 ======-->


     <!--====== Section 3 ======-->
     <div class="u-s-p-b-60">

         <!--====== Section Content ======-->
         <div class="section__content">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-4 col-md-6 u-s-m-b-30">
                         <div class="contact-o u-h-100">
                             <div class="contact-o__wrap">
                                 <div class="contact-o__icon"><i class="fas fa-phone-volume"></i></div>
                                 <span class="contact-o__info-text-1">{{ __('frontend.lets_have_a_call') }}</span>
                                 <span class="contact-o__info-text-2">{{ get_setting()->mobile }}</span>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-4 col-md-6 u-s-m-b-30">
                         <div class="contact-o u-h-100">
                             <div class="contact-o__wrap">
                                 <div class="contact-o__icon"><i class="fas fa-map-marker-alt"></i></div>
                                 <span class="contact-o__info-text-1">{{ __('frontend.our_location') }}</span>
                                 <span class="contact-o__info-text-2">{{ get_setting()->address }}</span>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-4 col-md-6 u-s-m-b-30">
                         <div class="contact-o u-h-100">
                             <div class="contact-o__wrap">
                                 <div class="contact-o__icon"><i class="far fa-clock"></i></div>
                                 <span class="contact-o__info-text-1">{{ __('frontend.work_time') }}</span>
                                 <span class="contact-o__info-text-2">{{ __('frontend.5_days_a_week') }}</span>
                                 <span class="contact-o__info-text-2">{{ __('frontend.from_7_to_9_pm') }}</span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!--====== End - Section Content ======-->
     </div>
     <!--====== End - Section 3 ======-->


     <!--====== Section 4 ======-->
     <div class="u-s-p-b-60">

         <!--====== Section Content ======-->
         <div class="section__content">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="contact-area u-h-100">
                             <div class="contact-area__heading">
                                 <h2>{{ __('frontend.get_in_touch') }}</h2>
                             </div>
                             <form class="contact-f" wire:submit.prevent='sendMessage()'>
                                 <div class="row">
                                     <div class="col-lg-6 col-md-6 u-h-100">
                                         <div class="u-s-m-b-30">
                                             <input wire:model='contact.name' class="input-text input-text--border-radius input-text--primary-style" type="text" id="c-name" placeholder="{{ __('auth.name') }} ({{ __('frontend.required') }})" required>
                                             <x-input-error :messages="$errors->get('contact.name')" class="mt-2" />
                                         </div>
                                         <div class="u-s-m-b-30">
                                             <input wire:model='contact.email' class="input-text input-text--border-radius input-text--primary-style" type="email" id="c-email" placeholder="{{ __('auth.email') }} ({{ __('frontend.required') }})" required>
                                             <x-input-error :messages="$errors->get('contact.email')" class="mt-2" />
                                         </div>
                                         <div class="u-s-m-b-30">
                                             <input wire:model='contact.subject' class="input-text input-text--border-radius input-text--primary-style" type="text" id="c-subject" placeholder="{{ __('auth.subject') }} ({{ __('frontend.required') }})" required>
                                             <x-input-error :messages="$errors->get('contact.subject')" class="mt-2" />
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-md-6 u-h-100">
                                         <div class="u-s-m-b-30">
                                             <textarea wire:model='contact.message' class="text-area text-area--border-radius text-area--primary-style" id="c-message" placeholder="{{ __('frontend.compose_a_message') }} ({{ __('frontend.required') }})" required></textarea>
                                             <x-input-error :messages="$errors->get('contact.message')" class="mt-2" />
                                         </div>
                                     </div>
                                     <div class="col-lg-12">
                                         <button class="btn btn--e-brand-b-2" type="submit">{{ __('frontend.send_message') }}</button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!--====== End - Section Content ======-->
     </div>
     <!--====== End - Section 4 ======-->
 </div>
 <!--====== End - App Content ======-->
