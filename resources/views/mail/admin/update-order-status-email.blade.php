<x-mail::message>
# Update Order Status

## Dear {{ $order->user->full_name }},

Thank you for your recent order #{{ $order->id }}. Your order status has been updated successfully to {{ __('order.'.$order->status) }}.

### The order details :
@component('mail::table')
| Order id | Order Date | Shipping Charges | Discount | Total Amount |
|---|-------------|---------|-------|--------|
| #{{ $order->id }} | {{ $order->created_at }} | {{ $order->shipping_charges }} | {{ $order->discount_value ?? 0 }} | {{ $order->grand_price }} |
@endcomponent

### The delivery address detail :
@component('mail::table')
| Full Name | Mobile | Street address | Town/City | Country |
|------------|-----------------|---------------|------------------|----------------|
| {{ $order->delivery_address->full_name }} | {{ $order->delivery_address->mobile }} | {{ $order->delivery_address->street_address }} | {{ $order->delivery_address->city }} | {{ $order->delivery_address->country->name }} |
@endcomponent

Please note that your order may take a few days to arrive. We will send you an email with tracking information once your order has shipped.
Thank you for your business. We hope you enjoy your order!

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
