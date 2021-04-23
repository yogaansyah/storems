<script src="{{ asset('js/app.js') }}"></script>
<!-- jQuery -->
<script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin') }}/dist/js/adminlte.min.js"></script>

{{-- SweetAlert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

    $('.sa-delete').on('click', function() {

        let form_id = $(this).data('form-id');
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $('#' + form_id).submit();
                } else {
                    swal("Your file is safe!");
                }
            });
    });

</script>

@stack('scripts')
