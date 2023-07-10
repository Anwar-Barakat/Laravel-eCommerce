  <div class="card">
      <div class="row g-0">
          <div class="col d-flex flex-column">
              <form wire:submit.prevent='submit' id="add-filter">
                  <div class="card-body">
                      <h3 class="mb-4 text-blue">{{ __('msgs.main_info') }}</h3>
                      <div class="row row-cards">
                          <div class="mb-3">
                              <label class="form-label">
                                  {{ __('setting.permissions') }}
                                  <a href="{{ route('admin.permissions.index') }}">({{ __('msgs.add', ['name' => __('order.new')]) }})</a>
                              </label>
                              <div class="form-selectgroup">
                                  @foreach ($permissions as $permission)
                                      <label class="form-selectgroup-item" wire:key='permission-{{ $permission->id }}'>
                                          <input type="checkbox" value="{{ $permission->id }}" class="form-selectgroup-input" wire:model="selectedPermissions" />
                                          <span class="form-selectgroup-label">{{ ucwords(str_replace('_', ' ', $permission->name)) }}</span>
                                      </label>
                                  @endforeach
                              </div>
                              <x-input-error :messages="$errors->get('selectedPermissions')" class="mt-2" />
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
