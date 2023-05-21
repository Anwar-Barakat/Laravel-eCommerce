  <div class="card">
      <div class="row g-0">
          <div class="col d-flex flex-column">
              <form wire:submit.prevent='submit'>
                  <div class="card-body">
                      <h3 class="mb-4 text-blue">{{ __('msgs.main_info') }}</h3>
                      <div class="row row-cards">
                          @include('layouts.inc.errors-message')
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <div class="mb-3">
                                      <x-input-label class="form-label" :value="__('product.coupon')" />
                                      <div class="btn-group w-100" role="group">
                                          <input type="radio" value="0" class="btn-check" id="btn-radio-dropdown-1" autocomplete="off" wire:model='coupon.option' />
                                          <label for="btn-radio-dropdown-1" type="button" class="btn">{{ __('product.manual') }}</label>
                                          <input type="radio" value="1" class="btn-check" id="btn-radio-dropdown-2" autocomplete="off" wire:model='coupon.option' />
                                          <label for="btn-radio-dropdown-2" type="button" class="btn">{{ __('product.automatic') }}</label>
                                          <x-input-error :messages="$errors->get('coupon.option')" class="mt-2" />
                                      </div>
                                  </div>
                              </div>
                          </div>

                          @isset($coupon->option)
                              @if ($coupon->option == 0)
                                  <div class="col-12 col-md-6 col-lg-4">
                                      <div class="mb-3">
                                          <x-input-label class="form-label" :value="__('product.coupon_code')" />
                                          <x-text-input type="text" class="form-control" wire:model='coupon.code' />
                                          <x-input-error :messages="$errors->get('coupon.code')" class="mt-2" />
                                      </div>
                                  </div>
                              @endif
                          @endisset
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.coupon_type')" />
                                  <select class="form-select" wire:model='coupon.type'>
                                      <option value="">{{ __('btns.select') }}</option>
                                      @foreach (App\Models\Coupon::COUPONTYPE as $key => $type)
                                          <option value="{{ $key }}">{{ __('product.' . $type) }}</option>
                                      @endforeach
                                  </select>
                                  <x-input-error :messages="$errors->get('coupon.type')" class="mt-2" />
                              </div>
                          </div>
                      </div>

                      <div class="row row-cards">
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.amount_type')" />
                                  <select class="form-select" wire:model="coupon.amount_type">
                                      <option value="">{{ __('btns.select') }}</option>
                                      <option value="0">{{ __('product.percentage') }}</option>
                                      <option value="1">{{ __('product.fixed') }}</option>
                                  </select>
                                  <x-input-error :messages="$errors->get('coupon.amount_type')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.amount')" />
                                  <div class="input-group">
                                      <span class="input-group-text">{{ $coupon->amount_type == 0 ? '%' : '$' }}</span>
                                      <x-text-input type="number" class="form-control" placeholder="10.00" wire:model='coupon.amount' required />
                                  </div>
                                  <x-input-error :messages="$errors->get('coupon.amount')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <div class="row row-cards">
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.expiry_date')" />
                                  <x-text-input type="date" class="form-control" wire:model='coupon.expiry_date' required />
                                  <x-input-error :messages="$errors->get('coupon.expiry_date')" class="mt-2" />
                              </div>
                          </div>

                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('setting.status')" />
                                  <select class="form-select" wire:model="coupon.is_active">
                                      <option value="">{{ __('btns.select') }}</option>
                                      <option value="0">{{ __('msgs.not_active') }}</option>
                                      <option value="1">{{ __('msgs.active') }}</option>
                                  </select>
                                  <x-input-error :messages="$errors->get('coupon.is_active')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <div class="row row-cards">
                          <div class="mb-3">
                              <label class="form-label">{{ __('category.categories') }}</label>
                              <div class="form-selectgroup">
                                  @if ($categories)
                                      @foreach ($categories as $category)
                                          <label class="form-selectgroup-item">
                                              <input type="checkbox" value="{{ $category->id }}" class="form-selectgroup-input" wire:model.defer='coupon.categories.{{ $category->id }}' />
                                              <span class="form-selectgroup-label">{{ $category->name }}</span>
                                          </label>
                                          @if ($category->subCategories)
                                              @foreach ($category->subCategories as $sub)
                                                  <label class="form-selectgroup-item">
                                                      <input type="checkbox" value="{{ $sub->id }}" class="form-selectgroup-input" wire:model.defer='coupon.categories.{{ $sub->id }}' />
                                                      <span class="form-selectgroup-label">{{ $sub->name }}</span>
                                                  </label>
                                              @endforeach
                                          @endif
                                          <div class="w-100"></div>
                                      @endforeach
                                      <x-input-error :messages="$errors->get('coupon.categories')" class="mt-2" />
                                  @endif
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
