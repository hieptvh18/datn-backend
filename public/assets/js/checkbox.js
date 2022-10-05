$(document).on('click', '.checkbox_wrapper', function() {
    $(this).parents('.card').find('.checkbox_childrent').prop('checked', $(this).prop('checked'))
})

$(document).on('click', '.Parent', function() {
    $(this).parents('.Card').find('.Childrent').prop('checked', $(this).prop('checked'))
})

$(document).on('click', '.SubParent', function() {
    $(this).parents('.Card').find('.SubChildrent').prop('checked', $(this).prop('checked'))
})

$(document).on('click', '.checkall', function() {
    $(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked'))
    $(this).parents().find('.checkbox_childrent').prop('checked', $(this).prop('checked'))
})

function preview() {
    previewImage.src = URL.createObjectURL(event.target.files[0]);
}


$('#delete-multiple').on('click', function() {
    var selected = [];
    $('.Card .Childrent:checked').each(function() {
        selected.push($(this).val());
    });

    Swal.fire({
        icon: 'warning',
        title: 'Bạn có muốn xóa những dữ liệu này không?',
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: $(this).data('route'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "data": selected
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: response,
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        window.location.reload()
                    });
                }
            });
        }
    });
});


// select multiple
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});