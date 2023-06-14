<div class="col-lg-9 col-md-12">
    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
        <div class="dash__pad-2">
            <div class="dash__address-header">
                <h1 class="dash__h1">{{ __('msgs.list', ['name' => __('frontend.delivery_addresses')]) }}</h1>
            </div>
        </div>
    </div>
    <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
        <div class="dash__table-2-wrap gl-scroll">
            <table class="dash__table-2">
                <thead>
                    <tr>
                        <th>{{ __('frontend.full_name') }}</th>
                        <th>{{ __('frontend.street_address') }}</th>
                        <th>{{ __('setting.mobile') }}</th>
                        <th>{{ __('auth.email') }}</th>
                        <th>{{ __('setting.status') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($addresses as $address)
                        <tr>
                            <td>{{ $address->full_name }}</td>
                            <td>{{ $address->street_address }}</td>
                            <td>{{ $address->mobile }}</td>
                            <td>{{ $address->email }}</td>
                            <td>
                                <div class="{{ $address->is_default ? 'text-green-500 text-bold' : 'gl-text' }}">{{ $address->is_default ? 'Selected' : 'Normal' }}</div>
                            </td>
                            <td>
                                <a class="address-book-edit btn--e-transparent-platinum-b-2" href="dash-address-edit.html">Edit</a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div>

        <a class="dash__custom-link btn--e-brand-b-2" href="dash-address-add.html"><i class="fas fa-plus u-s-m-r-8"></i>

            <span>Add New Address</span></a>
    </div>
</div>
