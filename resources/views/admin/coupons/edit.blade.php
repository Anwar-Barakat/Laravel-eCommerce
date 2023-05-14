<x-master-layout>
    @section('pageTitle', __('msgs.edit', ['name' => __('product.coupon')]))
    @section('breadcrumbTitle', __('msgs.edit', ['name' => __('product.coupon')]))
    @section('breadcrumbSubtitle', __('product.coupons'))

    @livewire('admin.coupon.add-edit-coupon', ['coupon' => $coupon])
</x-master-layout>
