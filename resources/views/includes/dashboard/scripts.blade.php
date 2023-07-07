<!-- Libs JS -->
<script type="text/javascript" defer src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script type="text/javascript" defer src="{{ asset('assets/libs/nouislider/dist/nouislider.min.js') }}"></script>
<script type="text/javascript" defer src="{{ asset('assets/libs/litepicker/dist/litepicker.js') }}"></script>
<script type="text/javascript" defer src="{{ asset('assets/libs/tom-select/dist/js/tom-select.base.min.js') }}">
</script>

<!-- Tabler Core -->
<script type="text/javascript" defer src="{{ asset('assets/js/tabler.min.js') }}"></script>
<script type="text/javascript" defer src="{{ asset('assets/js/demo.min.js') }}"></script>

@yield('js')
@stack('js')
