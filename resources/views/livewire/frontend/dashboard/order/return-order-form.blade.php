<div>
    @if ($order->status == 'delivered')
        <a data-modal="modal" data-modal-id="#quick-look" data-toggle="modal" data-tooltip="tooltip" data data-placement="top" title="Order Return Items" class="dash__custom-link btn--e-transparent-hover-brand-b-2">
            <i class="fas fa-undo-alt"></i> &nbsp;
            {{ __('btns.return') }}
        </a>

        {{-- Modal --}}
        <div class="modal fade" id="quick-look" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal--shadow">
                    <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <h4 class="dash__h1 ">Order Return Items</h4>
                            </div>
                            <div class="col-lg-7">
                                <form class="checkout-f__delivery" wire:submit.prevent='returnOrder()'>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="u-s-m-b-30">
                                                        <label class="gl-label" for="reason">Return Reason</label>
                                                        <select class="select-box select-box--primary-style w-full" id="reason" wire:model='return.reason'>
                                                            <option selected value="">{{ __('btns.select') }}</option>
                                                            @foreach (App\Models\OrderLog::RETURNREASON as $key => $reason)
                                                                <option value="{{ $key }}">{{ __('frontend.' . $reason) }}</option>
                                                            @endforeach
                                                        </select>
                                                        <x-input-error :messages="$errors->get('return.reason')" class="mt-2" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="u-s-m-b-30">
                                                        <label class="gl-label" for="productId">Return Product</label>
                                                        <select class="select-box select-box--primary-style w-full" id="productId" wire:model='return.product_id'>
                                                            <option selected value="">{{ __('btns.select') }}</option>
                                                            @foreach ($order->order_products as $ele)
                                                                @if ($ele->status != 'return_initiated')
                                                                    <option value="{{ $ele->product->id }}">{{ $ele->product->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        <x-input-error :messages="$errors->get('return.product_id')" class="mt-2" />
                                                    </div>
                                                </div>
                                                @if ($attrSizes)
                                                    <div class="col-12">
                                                        <div class="u-s-m-b-30">
                                                            <label class="gl-label" for="size">Product Sizes</label>
                                                            <select class="select-box select-box--primary-style w-full" id="size" wire:model='return.product_size'>
                                                                <option selected value="">{{ __('btns.select') }}</option>
                                                                @foreach ($attrSizes as $attr)
                                                                    <option value="{{ $attr->size }}">{{ $attr->size }}</option>
                                                                @endforeach
                                                            </select>
                                                            <x-input-error :messages="$errors->get('return.product_size')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-12">
                                                    <div class="u-s-m-b-30">
                                                        <label class="gl-label" for="comment">Comment</label>
                                                        <textarea id="comment" cols="30" rows="5" class="form-control w-full" wire:model='return.comment' placeholder="Type your comment"></textarea>
                                                        <x-input-error :messages="$errors->get('return.comment')" class="mt-2" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mt-4 mb-2">
                                        <div class="card-footer mt-4">
                                            <div class="u-s-m-b-30">
                                                <button type="submit" data-dismiss="modal" wire:click.prevent='returnOrder()' class="dash__custom-link btn--e-transparent-hover-brand-b-2">
                                                    <i class="fas fa-undo-alt"></i> &nbsp;
                                                    {{ __('btns.return') }}
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
