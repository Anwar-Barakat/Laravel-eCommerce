  <div class="card">
      <div class="row g-0">
          <div class="col d-flex flex-column">
              <form wire:submit.prevent='submit'>
                  <div class="card-body">
                      @include('layouts.inc.errors-message')
                      <h3 class="mb-4 text-blue">{{ __('msgs.main_info') }}</h3>
                      <div class="row row-cards">
                          <div class="col-12 col-md-6 m-auto mb-4 text-center">
                              @if ($image)
                                  <img src="{{ $image->temporaryUrl() }}" class="img img-thumbnail" width="300">
                              @elseif ($product->getFirstMediaUrl('products', 'thumb'))
                                  <img src="{{ $product->getFirstMediaUrl('products') }}" class="img img-thumbnail" alt="{{ $product->name }}" width="300">
                              @else
                                  <img src="{{ asset('backend/static/square-default-image.jpeg') }}" class="img img-thumbnail" alt="{{ $product->name }}" width="300">
                              @endif
                          </div>
                      </div>
                      <div class="row row-cards">
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('msgs.name_ar')" />
                                  <x-text-input type="text" class="form-control" placeholder="حذاء اسود" wire:model.defer='name_ar' required />
                                  <x-input-error :messages="$errors->get('name_ar')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('msgs.name_en')" />
                                  <x-text-input type="text" class="form-control" placeholder="Black Shoes" wire:model.defer='name_en' required />
                                  <x-input-error :messages="$errors->get('name_en')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('partials.status')" />
                                  <select class="form-select" wire:model.defer='product.is_active'>
                                      <option value="">{{ __('btns.select') }}</option>
                                      <option value="1">{{ __('msgs.yes') }}</option>
                                      <option value="0">{{ __('msgs.no') }}</option>
                                  </select>
                                  <x-input-error :messages="$errors->get('product.is_active')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <div class="row row-cards">
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('section.section')" />
                                  <select class="form-select" wire:model="product.section_id">
                                      <option value="">{{ __('btns.select') }}</option>
                                      @foreach ($sections as $section)
                                          <option value="{{ $section->id }}">{{ $section->name }}</option>
                                      @endforeach
                                  </select>
                                  <x-input-error :messages="$errors->get('product.section_id')" class="mt-2" />
                              </div>
                          </div>
                          @if ($categories || $product)
                              <div class="col-12 col-md-6 col-lg-4">
                                  <div class="mb-3">
                                      <x-input-label class="form-label" :value="__('category.category')" />
                                      <select class="form-select" wire:model.defer="product.category_id">
                                          <option value="">{{ __('btns.select') }}</option>
                                          @foreach ($categories as $root)
                                              <option value="{{ $root->id }}">{{ ucwords($root->name) }}</option>
                                              @if ($root->subCategories)
                                                  @foreach ($root->subCategories as $child)
                                                      <option value="{{ $child->id }}">
                                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&raquo;
                                                          {{ ucwords($child->name) }}
                                                      </option>
                                                  @endforeach
                                              @endif
                                          @endforeach
                                      </select>
                                      <x-input-error :messages="$errors->get('product.parent_id')" class="mt-2" />
                                  </div>
                              </div>
                          @endif
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.brand')" />
                                  <select class="form-select" wire:model.defer="product.brand_id">
                                      <option value="">{{ __('btns.select') }}</option>
                                      @foreach ($brands as $brand)
                                          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                      @endforeach
                                  </select>
                                  <x-input-error :messages="$errors->get('product.brand_id')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <div class="row row-cards">
                          <div class="col-12 col-md-6">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('msgs.descriprion')" />
                                  <textarea wire:model.defer='product.description'rows="3" class="form-control"></textarea>
                                  <x-input-error :messages="$errors->get('product.description')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <hr class="mt-4 mb-3 w-50">
                      <h4 class="mb-4 text-blue">{{ __('product.prices_and_taxes') }}</h4>
                      <div class="row row-cards">
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.price')" />
                                  <div class="input-group">
                                      <span class="input-group-text">$</span>
                                      <x-text-input type="number" class="form-control" placeholder="2.5" wire:model.defer='product.price' required />
                                  </div>
                                  <x-input-error :messages="$errors->get('product.price')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.weight')" />
                                  <div class="input-group">
                                      <span class="input-group-text">g</span>
                                      <x-text-input type="number" class="form-control" placeholder="2.5" wire:model.defer='product.weight' required />
                                  </div>
                                  <x-input-error :messages="$errors->get('product.weight')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.gst')" />
                                  <div class="input-group">
                                      <span class="input-group-text">%</span>
                                      <x-text-input type="number" class="form-control" placeholder="2.5" wire:model='product.gst' required min="0" max="25" />
                                  </div>
                                  <x-input-error :messages="$errors->get('product.gst')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <div class="row row-cards">
                          <div class="col-12 col-md-6 col-lg-3">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.discount_type')" />
                                  <select class="form-select" wire:model.defer='product.discount_type'>
                                      <option value="">{{ __('btns.select') }}</option>
                                      <option value="0">{{ __('product.percentage') }}</option>
                                      <option value="1">{{ __('product.fixed') }}</option>
                                  </select>
                                  <x-input-error :messages="$errors->get('product.discount_type')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-3">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('category.discount')" />
                                  <div class="input-group">
                                      <span class="input-group-text">{{ $product->discount_type == 0 ? '%' : '$' }}</span>
                                      <x-text-input type="number" class="form-control" placeholder="10.00" wire:model='product.discount_value' required />
                                  </div>
                                  <x-input-error :messages="$errors->get('product.discount_value')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <hr class="mt-4 mb-3 w-50">
                      <h4 class="mb-4  text-blue">{{ __('msgs.additional_info') }}</h4>
                      <div class="row row-cards">
                          <div class="col-12 col-md-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('category.meta_title')" />
                                  <x-text-input type="text" class="form-control" wire:model.defer='product.meta_title' />
                                  <x-input-error :messages="$errors->get('product.meta_title')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('category.meta_description')" />
                                  <x-text-input type="text" class="form-control" wire:model.defer='product.meta_description' />
                                  <x-input-error :messages="$errors->get('product.meta_description')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('category.meta_keywords')" />
                                  <x-text-input type="text" class="form-control" wire:model.defer='product.meta_keywords' />
                                  <x-input-error :messages="$errors->get('product.meta_keywords')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-12 col-md-6 col-lg-3">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.product_is_featured')" />
                                  <select class="form-select" wire:model.defer='product.is_featured'>
                                      <option value="">{{ __('btns.select') }}</option>
                                      <option value="0">{{ __('msgs.no') }}</option>
                                      <option value="1">{{ __('msgs.yes') }}</option>
                                  </select>
                                  <x-input-error :messages="$errors->get('product.is_featured')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-3">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('product.product_is_best_seller')" />
                                  <select class="form-select" wire:model.defer='product.is_best_seller'>
                                      <option value="">{{ __('btns.select') }}</option>
                                      <option value="0">{{ __('msgs.no') }}</option>
                                      <option value="1">{{ __('msgs.yes') }}</option>
                                  </select>
                                  <x-input-error :messages="$errors->get('product.is_best_seller')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-12 col-md-6 col-lg-4">
                              <x-input-label class="form-label" :value="__('msgs.photo')" />
                              <x-text-input type="file" class="form-control" wire:model.defer='image' />
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
