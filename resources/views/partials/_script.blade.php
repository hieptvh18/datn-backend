<!--jQuery [ REQUIRED ]-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>


<!--BootstrapJS [ RECOMMENDED ]-->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>


<!--NiftyJS [ RECOMMENDED ]-->
<script src="{{ asset('assets/js/nifty.min.js') }}"></script>




<!--=================================================-->

<!--Demo script [ DEMONSTRATION ]-->
<script src="{{ asset('assets/js/demo/nifty-demo.min.js') }}"></script>


<!--Flot Chart [ OPTIONAL ]-->
<script src="{{ asset('assets/plugins/flot-charts/jquery.flot.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot-charts/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('assets/plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>


<!--Sparkline [ OPTIONAL ]-->
<script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>


<!--Specify page [ SAMPLE ]-->
<script src="{{ asset('assets/js/demo/dashboard.js') }}"></script>

 <!--Form File Upload [ SAMPLE ]-->
 <script src="{{asset('assets/js/demo/form-file-upload.js')}}"></script>
{{-- checkbox checked --}}
<script src="{{ asset('assets/js/checkbox.js') }}" defer></script>

{{-- alert message --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // alert success
    @if (session('message'))
        Swal.fire({
            position: 'bottom-end',
            icon: 'success',
            title: '{{ session('message') }}',
            showConfirmButton: false,
            timer: 1500
        })
    @endif

    // alert error
    @if (session('error'))
        Swal.fire({
            position: 'bottom-end',
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 1500
        })
    @endif

// confirm delete
    $(function() {
            $(document).on('click', '.btn-delete', function() {
                let formId = $(this).data('form')
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#${formId}`).submit();
                    }
                })
            })
        })
</script>

