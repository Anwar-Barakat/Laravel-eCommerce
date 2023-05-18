<script src="{{ asset('backend/dist/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
<script src="{{ asset('backend/dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
<script src="{{ asset('backend/dist/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
<script src="{{ asset('backend/dist/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>

<!-- Tabler Core -->
<script src="{{ asset('backend/dist/js/tabler.min.js') }}" defer></script>
@stack('scripts')
{{--
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });

    });
</script> --}}

{{-- <livewire:scripts /> --}}
<script src="{{ asset('backend/dist/js/demo.min.js') }}" defer></script>
