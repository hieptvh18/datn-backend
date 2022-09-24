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
<script src="{{ asset('assets/js/demo/form-file-upload.js') }}"></script>
{{-- checkbox checked --}}
<script src="{{ asset('assets/js/checkbox.js') }}" defer></script>

{{-- alert message --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // alert success
    @if (session('message'))
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ session('message') }}',
            showConfirmButton: false,
            timer: 1800
        })
    @endif

    // alert error
    @if (session('error'))
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 1800
        })
    @endif

    // confirm delete
    $(function() {
        $(document).on('click', '.btn-delete', function() {
            let formId = $(this).data('form')
            Swal.fire({
                title: 'Bạn chắc chắn muốn xóa?',
                text: "Bạn sẽ không thể khôi phục nó!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, tôi chắc chắn!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#${formId}`).submit();
                }
            })
        })
    });

    // confirm send sms notifi
    $(function() {
        $(document).on('click', '.confirm-sms', function() {
            let formId = $(this).data('form')
            Swal.fire({
                title: 'Cập nhật trạng thái và gửi tin nhắn thông báo khách hàng?',
                text: "Bạn sẽ cập nhật trạng thái đã xác nhận lịch đặt, đồng thời gửi tin nhắn sms thông báo lịch hẹn cho khách!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, tôi chắc chắn!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(`#${formId}`).submit();
                }
            })
        })
    })
</script>
