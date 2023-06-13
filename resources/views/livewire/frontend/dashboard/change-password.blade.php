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
                      <form class="dash-edit-p" wire:submit.prevent='updatePassword()'>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="u-s-m-b-30">
                                      <label class="gl-label" for="current_passowrd">{{ __('frontend.current_passowrd') }}</label>
                                      <input class="input-text input-text--primary-style" type="password" id="current_passowrd" wire:model='current_password' placeholder="********">
                                      <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="u-s-m-b-30">
                                      <label class="gl-label" for="password">{{ __('frontend.new_password') }} *</label>
                                      <input class="input-text input-text--primary-style" type="password" id="password" wire:model='password' placeholder="********">
                                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="u-s-m-b-30">
                                      <label class="gl-label" for="password_confirmation">{{ __('setting.password_confirmation') }} *</label>
                                      <input class="input-text input-text--primary-style" type="password" id="password_confirmation" wire:model='password_confirmation' placeholder="********">
                                      <x-input-error :messages="$errors->get('confirmation_password')" class="mt-2" />
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
