<!-- Libs JS -->
<script type="text/javascript" src="{{ asset('assets/js/demo-theme.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/libs/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/libs/nouislider/dist/nouislider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/libs/litepicker/dist/litepicker.js') }}"></script>

<!-- Tabler Core -->
<script type="text/javascript" src="{{ asset('assets/js/tabler.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/demo.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>

@vite(['resources/js/app.js'])

<script>
    $(function() {
        $(document).ready(function() {
            $('body').find('.select2').select2();
        });
    });
</script>

@yield('js')
@stack('js')
