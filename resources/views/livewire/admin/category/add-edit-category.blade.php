  <div class="card">
      <div class="row g-0">
          <div class="col d-flex flex-column">
              <form wire:submit.prevent='submit'>
                  <div class="card-body">
                      @include('layouts.inc.errors-message')
                      <h3 class="mb-4 text-blue">{{ __('msgs.main_info') }}</h3>
                      <div class="row row-cards">
                          <div class="col-sm-12 col-md-6 m-auto mb-4">
                              @if ($image)
                                  <img src="{{ $image->temporaryUrl() }}" class="img img-thumbnail" height="300">
                              @elseif ($category->getFirstMediaUrl('categories', 'thumb'))
                                  <img src="{{ $category->getFirstMediaUrl('categories') }}" class="img img-thumbnail" alt="{{ $category->name }}">
                              @else
                                  <img src="{{ asset('backend/static/banner-default.jpg') }}" class="img img-thumbnail" alt="{{ $category->name }}">
                              @endif
                          </div>
                      </div>
                      <div class="row row-cards">
                          <div class="col-sm-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('msgs.name_ar')" />
                                  <x-text-input type="text" class="form-control" placeholder="أحذية" wire:model='name_ar' required />
                                  <x-input-error :messages="$errors->get('name_ar')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('msgs.name_en')" />
                                  <x-text-input type="text" class="form-control" placeholder="Shoes" wire:model='name_en' required />
                                  <x-input-error :messages="$errors->get('name_en')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('partials.status')" />
                                  <select class="form-select" wire:model='category.is_active'>
                                      <option value="">{{ __('btns.select') }}</option>
                                      <option value="1">{{ __('msgs.yes') }}</option>
                                      <option value="0">{{ __('msgs.no') }}</option>
                                  </select>
                                  <x-input-error :messages="$errors->get('category.is_active')" class="mt-2" />
                              </div>
                          </div>
                      </div>

                      <div class="row row-cards">
                          <div class="col-sm-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('section.section')" />
                                  <select class="form-select" wire:model="category.section_id">
                                      <option value="">{{ __('btns.select') }}</option>
                                      @foreach ($sections as $section)
                                          <option value="{{ $section->id }}">{{ $section->name }}</option>
                                      @endforeach
                                  </select>
                                  <x-input-error :messages="$errors->get('category.section_id')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('category.category_level')" />
                                  <select class="form-select" wire:model="category.parent_id">
                                      <option value="">{{ __('btns.select') }}</option>
                                      <option value="0">{{ __('msgs.parent') }}</option>
                                      @if ($categories)
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
                                      @endif
                                  </select>
                                  <x-input-error :messages="$errors->get('category.parent_id')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-6 col-lg-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('category.discount')" />
                                  <div class="input-group">
                                      <span class="input-group-text">%</span>
                                      <x-text-input type="number" class="form-control" placeholder="10.00" wire:model='category.discount' required />
                                  </div>
                                  <x-input-error :messages="$errors->get('category.discount')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <div class="row row-cards">
                          <div class="col-sm-12 col-md-6">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('msgs.descriprion')" />
                                  <textarea wire:model='category.description'rows="3" class="form-control"></textarea>
                                  <x-input-error :messages="$errors->get('category.description')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <hr class="mt-4 mb-3 w-50">
                      <h4 class="mb-4  text-blue">{{ __('msgs.additional_info') }}</h4>
                      <div class="row row-cards">
                          <div class="col-sm-12 col-md-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('category.meta_title')" />
                                  <x-text-input type="text" class="form-control" wire:model='category.meta_title' />
                                  <x-input-error :messages="$errors->get('category.meta_title')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('category.meta_description')" />
                                  <x-text-input type="text" class="form-control" wire:model='category.meta_description' />
                                  <x-input-error :messages="$errors->get('category.meta_description')" class="mt-2" />
                              </div>
                          </div>
                          <div class="col-sm-12 col-md-4">
                              <div class="mb-3">
                                  <x-input-label class="form-label" :value="__('category.meta_keywords')" />
                                  <x-text-input type="text" class="form-control" wire:model='category.meta_keywords' />
                                  <x-input-error :messages="$errors->get('category.meta_keywords')" class="mt-2" />
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-4">
                          <x-input-label class="form-label" :value="__('msgs.photo')" />
                          <x-text-input type="file" class="form-control" wire:model='image' />
                          <x-input-error :messages="$errors->get('image')" class="mt-2" />
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
