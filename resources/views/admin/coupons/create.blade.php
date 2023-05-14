<x-master-layout>
    @section('pageTitle', __('msgs.create', ['name' => __('product.coupon')]))
    @section('breadcrumbTitle', __('msgs.create', ['name' => __('product.coupon')]))
    @section('breadcrumbSubtitle', __('product.coupons'))

    @livewire('admin.coupon.add-edit-coupon')
</x-master-layout>
