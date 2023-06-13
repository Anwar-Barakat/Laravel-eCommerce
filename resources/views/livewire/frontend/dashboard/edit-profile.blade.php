  <div class="col-lg-9 col-md-12">
      <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
          <div class="dash__pad-2">
              <h1 class="dash__h1 u-s-m-b-14">{{ __('frontend.edit_profile') }}</h1>

              <span class="dash__text u-s-m-b-30">Looks like you haven't update your profile</span>
              <div class="dash__link dash__link--secondary u-s-m-b-30">

                  <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <form class="dash-edit-p" wire:submit.prevent='submit()'>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="u-s-m-b-30">
                                      <label class="gl-label" for="email">{{ __('auth.email') }}</label>
                                      <input class="input-text input-text--primary-style" type="text" id="email" wire:model='user.email' disabled readonly>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="u-s-m-b-30">
                                      <label class="gl-label" for="fname">{{ __('frontend.first_name') }} *</label>
                                      <input class="input-text input-text--primary-style" type="text" id="fname" wire:model='user.first_name'>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="u-s-m-b-30">
                                      <label class="gl-label" for="lname">{{ __('frontend.last_name') }} *</label>
                                      <input class="input-text input-text--primary-style" type="text" id="lname" wire:model='user.last_name'>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="u-s-m-b-30">
                                      <label class="gl-label" for="mobile">{{ __('setting.mobile') }} *</label>
                                      <input class="input-text input-text--primary-style" type="text" id="mobile" wire:model='user.mobile'>
                                  </div>
                              </div>
                          </div>
                          <button class="btn btn--e-brand-b-2" type="submit">{{ __('btns.submit') }}</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
