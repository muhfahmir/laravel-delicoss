<!-- General JS Scripts -->
<script src="{{ asset('vendor/stisla/modules/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/stisla/modules/popper.js') }}"></script>
<script src="{{ asset('vendor/stisla/modules/tooltip.js') }}"></script>
<script src="{{ asset('vendor/stisla/modules/bootstrap/js/bootstrap.min.js ') }}"></script>
<script src="{{ asset('vendor/stisla/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('vendor/stisla/modules/moment.min.js') }}"></script>
<script src="{{ asset('vendor/stisla/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('vendor/stisla/js/scripts.js') }}"></script>
<script src="{{ asset('vendor/stisla/js/custom.js') }}"></script>

{{-- ACTIVE DATATABLES --}}
<script>
    function readURL(input, element) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]); // convert to base64 string
                // reader.onload = function(e) {
                //     return e;
                // }
                return reader;
                // var reader = new FileReader();
                // console.log(element);
                // reader.onload = function(e) {
                //     $(`${element}`).attr('src', e.target.result);
                // }
                // reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
