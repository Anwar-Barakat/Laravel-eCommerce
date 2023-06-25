<div>
    @if ($order->status == 'delivered')
        <a data-modal="modal" data-modal-id="#quick-look" data-toggle="modal" data-tooltip="tooltip" data data-placement="top" title="Order Return / Exchange Items" class="dash__custom-link btn--e-transparent-hover-brand-b-2">
            <i class="fas fa-undo-alt"></i> &nbsp;
            {{ __('btns.return_or_exchange') }}
        </a>

        {{-- Modal --}}
        <div class="modal fade" id="quick-look" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal--shadow">
                    <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <h4 class="dash__h1 ">Order Return / Exchange Items</h4>
                            </div>
                            <div class="col-lg-7">
                                @include('layouts.inc.errors-message')
                                <form class="checkout-f__delivery" wire:submit.prevent='returnOrder()'>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="u-s-m-b-30">
                                                        <label class="gl-label" for="reason">{{ $perpuse }} Reason</label>
                                                        <select class="select-box select-box--primary-style w-full" id="reason" wire:model='type'>
                                                            <option selected value="">{{ __('btns.select') }}</option>
                                                            <option selected value="0">Return</option>
                                                            <option selected value="1">Exchange</option>
                                                        </select>
                                                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="u-s-m-b-30">
                                                        <label class="gl-label" for="reason">{{ $perpuse }} Reason</label>
                                                        <select class="select-box select-box--primary-style w-full" id="reason" wire:model='reason'>
                                                            <option selected value="">{{ __('btns.select') }}</option>
                                                            @foreach (App\Models\OrderLog::RETURNEXCHANGEREASON as $key => $reason)
                                                                <option value="{{ $key }}">{{ __('frontend.' . $reason) }}</option>
                                                            @endforeach
                                                        </select>
                                                        <x-input-error :messages="$errors->get('reason')" class="mt-2" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="u-s-m-b-30">
                                                        <label class="gl-label" for="productId">{{ $perpuse }} Product</label>
                                                        <select class="select-box select-box--primary-style w-full" id="productId" wire:model='product_id'>
                                                            <option selected value="">{{ __('btns.select') }}</option>
                                                            @foreach ($order->order_products as $ele)
                                                                @if (!$ele->status)
                                                                    <option value="{{ $ele->product->id }}">{{ $ele->product->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <x-input-error :messages="$errors->get('product_id')" class="mt-2" />
                                                    </div>
                                                </div>
                                                @if ($attrSizes && $type == 1)
                                                    <div class="col-12">
                                                        <div class="u-s-m-b-30">
                                                            <label class="gl-label" for="size">Required Size</label>
                                                            <select class="select-box select-box--primary-style w-full" id="size" wire:model='required_size'>
                                                                <option selected value="">{{ __('btns.select') }}</option>
                                                                @foreach ($attrSizes as $attr)
                                                                    <option value="{{ $attr->size }}">{{ $attr->size }}</option>
                                                                @endforeach
                                                            </select>
                                                            <x-input-error :messages="$errors->get('product_size')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-12">
                                                    <div class="u-s-m-b-30">
                                                        <label class="gl-label" for="comment">Comment</label>
                                                        <textarea id="comment" cols="30" rows="5" class="form-control w-full" wire:model='comment' placeholder="Type your comment"></textarea>
                                                        <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mt-4 mb-2">
                                        <div class="card-footer mt-4">
                                            <div class="u-s-m-b-30">
                                                <button type="submit" data-dismiss="modal" wire:click.prevent='returnOrder()' class="dash__custom-link btn--e-transparent-hover-brand-b-2 ">
                                                    <i class="fas fa-undo-alt"></i> &nbsp;
                                                    {{ __('btns.' . $perpuse) }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
