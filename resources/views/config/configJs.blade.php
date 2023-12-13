<!-- Core JS -->
{{-- <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script> --}}
<!-- build:js assets/vendor/js/core.js -->
<script type="text/javascript" src="https://unpkg.com/default-passive-events"></script>
{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script> --}}
<script src="{{ asset('/vendor/libs/popper/popper.js') }}"></script>

<script src="{{ asset('/vendor/libs/jquery/jquery.masknumber.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('/vendor/js/jquery.PrintArea.js') }}"></script>
<script src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>


<script src="{{ asset('/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
{{-- <script src="/vendor/libs/apex-charts/apexcharts.js"></script> --}}
{{-- <script src="/vendor/libs/datatables/jquery.dataTables.js"></script> --}}

{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
{{-- @if (Request::is(!'auth')) --}}
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('/js/main-dashboard.js') }}"></script>


{{-- @endif --}}

<!-- Main JS -->

<!-- Page JS    -->
@if (Request::is('users/*/update') || Request::is('gaji/gaji-param'))
    @if (Request::is('users/*/update'))
        <script type="module" src="{{ asset('js/Form/Resetpassword.js') }}"></script>
    @endif
    <script type="module" src="{{ asset('/js/input-mask.js') }}"></script>
    <script type="module" src="{{ asset('/js/formlistener.js') }}"></script>
@endif
@if (Request::is('admin/role-permission'))
    <script type="module" src="{{ asset('js/ui-popover.js') }}"></script>
@endif
@if (Request::is('users'))
    <script type="module" src="{{ asset('js/Form/AddUser.js') }}"></script>
    @if (session()->has('errors'))
        <script>
            $(document).ready(function() {
                // Trigger a click event on the button when the document is ready
                $("#addbutton").click();
            });
        </script>
    @endif
@endif
{{-- @dd(Request::is(route('submission.view_store'))); --}}
@if (Request::is('gaji/*/view') ||
        Request::is('gaji/submission/store') ||
        Request::is('gaji/submission/*/update') ||
        Request::is('gaji'))
    <script type="module" src="{{ asset('vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script type="module" src="{{ asset('js/forms-pickers.js') }}"></script>
    {{-- @if (Request::is('gaji/*/view')) --}}
    <script type="module" src="{{ asset('js/gajiviewlistener.js') }}"></script>
    {{-- @endif --}}
@endif
@if (Request::is('gaji*') ||
        Request::is('gaji/submission/store') ||
        Request::is('gaji/submission/*/update') ||
        Request::is('gaji/submission/detail/*') ||
        Request::is('slip*') ||
        Request::is('task*'))
    <script type="module" src="{{ asset('js/comacurency.js') }}"></script>
@endif
@if (Request::is('gaji/slip*'))
    <script type="module" src="{{ asset('js/numbertolisterner.js') }}"></script>
@endif
{{-- <script src="/js/dashboards-analytics.js"></script> --}}



<!-- Place this tag in your head or just before your close body tag. -->
{{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
