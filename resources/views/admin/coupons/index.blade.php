<x-master-layout>
    @section('pageTitle', __('msgs.list', ['name' => __('product.coupons')]))
    @section('breadcrumbTitle', __('msgs.list', ['name' => __('product.coupons')]))
    @section('breadcrumbSubtitle', __('product.coupons'))

    @livewire('admin.coupon.display-coupon')
</x-master-layout>
