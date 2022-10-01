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