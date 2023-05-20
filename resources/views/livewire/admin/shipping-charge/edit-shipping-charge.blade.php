  <div class="card">
      <div class="row g-0">
          <div class="col d-flex flex-column">
              <form wire:submit.prevent='submit'>
                  <div class="card-body">
                      <h3 class="mb-4 text-blue">{{ __('msgs.main_info') }}</h3>
                      <div class="row row-cards">
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('order.country')" />
                                  <select name="" id="" class="form-select" disabled readonly>
                                      <option value="">{{ $shippingCharge->country->name }}</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('order.zero_500g')" />
                                  <x-text-input type="text" class="form-control" wire:model='shippingCharge.zero_500g' required />
                                  <x-input-error :messages="$errors->get('shippingCharge.zero_500g')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('order._501_1000g')" />
                                  <x-text-input type="text" class="form-control" wire:model='shippingCharge._501_1000g' required />
                                  <x-input-error :messages="$errors->get('shippingCharge._501_1000g')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <div class="row row-cards">
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('order._1001_2000g')" />
                                  <x-text-input type="text" class="form-control" wire:model='shippingCharge._1001_2000g' required />
                                  <x-input-error :messages="$errors->get('shippingCharge._1001_2000g')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('order._2001_5000g')" />
                                  <x-text-input type="text" class="form-control" wire:model='shippingCharge._2001_5000g' required />
                                  <x-input-error :messages="$errors->get('shippingCharge._2001_5000g')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('order.above_5000g')" />
                                  <x-text-input type="text" class="form-control" wire:model='shippingCharge.above_5000g' required />
                                  <x-input-error :messages="$errors->get('shippingCharge.above_5000g')" class="mt-2" />
                              </div>
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
