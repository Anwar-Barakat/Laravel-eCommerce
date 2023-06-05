  <div class="card">
      <div class="row g-0">
          <div class="col d-flex flex-column">
              <form wire:submit.prevent='submit'>
                  <div class="card-body">
                      <h3 class="mb-4 text-blue">{{ __('msgs.main_info') }}</h3>
                      <div class="row row-cards">
                          <div class="col-sm-12 col-md-6 m-auto mb-4">
                              @if ($image)
                                  <img src="{{ $image->temporaryUrl() }}" class="img img-thumbnail" height="300">
                              @elseif ($banner->getFirstMediaUrl('banners', 'thumb'))
                                  <img src="{{ $banner->getFirstMediaUrl('banners') }}" class="img img-thumbnail" alt="{{ $banner->name }}">
                              @else
                                  <img src="{{ asset('backend/static/banner-default.jpg') }}" class="img img-thumbnail" alt="{{ $banner->name }}">
                              @endif
                          </div>
                      </div>
                      <div class="row row-cards">
                          <div class="col-sm-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.title')" />
                                  <x-text-input type="text" class="form-control" placeholder="Summer Collection" wire:model='banner.title' required wire:keyup='generateLink' />
                                  <x-input-error :messages="$errors->get('banner.title')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.title')" />
                                  <x-text-input type="text" class="form-control" placeholder="summer-collection" wire:model='banner.link' readonly disabled />
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('partials.status')" />
                                  <select class="form-select" wire:model='banner.is_active'>
                                      <option value="">{{ __('btns.select') }}</option>
                                      <option value="1">{{ __('msgs.yes') }}</option>
                                      <option value="0">{{ __('msgs.no') }}</option>
                                  </select>
                                  <x-input-error :messages="$errors->get('banner.is_active')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <div class="row row-cards">
                          <div class="col-sm-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.banner_type')" />
                                  <select class="form-select" wire:model='banner.type'>
                                      <option value="">{{ __('btns.select') }}</option>
                                      <option value="1">{{ __('product.fixed') }}</option>
                                      <option value="0">{{ __('product.slider') }}</option>
                                  </select>
                                  <x-input-error :messages="$errors->get('banner.type')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-6 col-lg-4">
                              <x-input-label class="form-label" :value="__('msgs.photo')" />
                              <x-text-input type="file" class="form-control" wire:model='image' />
                              <x-input-error :messages="$errors->get('image')" class="mt-2" />
                          </div>
                      </div>
                  </div>
                  <div class="card-footer text-end">
                      <button type="submit" class="btn btn-primary">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8"></path>
                              <path d="M14 19l2 2l4 -4"></path>
                              <path d="M9 8h4"></path>
                              <path d="M9 12h2"></path>
                          </svg>
                          {{ __('btns.submit') }}
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>
