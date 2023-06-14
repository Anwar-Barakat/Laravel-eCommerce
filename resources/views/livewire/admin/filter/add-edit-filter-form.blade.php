  <div class="card">
      <div class="row g-0">
          <div class="col d-flex flex-column">
              <form wire:submit.prevent='submit' id="add-filter">
                  <div class="card-body">
                      <h3 class="mb-4 text-blue">{{ __('msgs.main_info') }}</h3>
                      <div class="row row-cards">
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.fitler_name')" />
                                  <x-text-input type="text" class="form-control" wire:model.defer='filter.name' placeholder="{{ __('product.must_be_in_english', ['name' => __('product.fitler_name')]) }}" />
                                  <x-input-error :messages="$errors->get('filter.name')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('setting.status')" />
                                  <select class="form-select" wire:model.defer="filter.is_active">
                                      <option value="">{{ __('btns.select') }}</option>
                                      <option value="0">{{ __('msgs.not_active') }}</option>
                                      <option value="1">{{ __('msgs.active') }}</option>
                                  </select>
                                  <x-input-error :messages="$errors->get('filter.is_active')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <div class="row row-cards">
                          <div class="mb-3">
                              <label class="form-label">{{ __('category.categories') }}</label>
                              <div class="form-selectgroup">
                                  @foreach ($categories as $cat)
                                      <label class="form-selectgroup-item" wire:key='cat-{{ $cat->id }}'>
                                          <input type="checkbox" value="{{ $cat->id }}" class="form-selectgroup-input" wire:model.defer="filter.categories.{{ $cat->id }}" />
                                          <span class="form-selectgroup-label">{{ $cat->name }}</span>
                                      </label>
                                      @if ($cat->subCategories)
                                          @foreach ($cat->subCategories as $sub)
                                              <label class="form-selectgroup-item">
                                                  <input type="checkbox" value="{{ $sub->id }}" class="form-selectgroup-input" wire:model.defer='filter.categories.{{ $sub->id }}' />
                                                  <span class="form-selectgroup-label">{{ $sub->name }}</span>
                                              </label>
                                          @endforeach
                                      @endif
                                      <div class="w-100"></div>
                                  @endforeach
                              </div>
                              <x-input-error :messages="$errors->get('filter.categories')" class="mt-2" />
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
