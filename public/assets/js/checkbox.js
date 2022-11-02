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

// preview image
function preview() {
    previewImage.src = URL.createObjectURL(event.target.files[0]);
}

// preview multiple image
function handleFileSelect() {
    if (window.File && window.FileList && window.FileReader) {
        document.getElementById('result').textContent = '';
        var files = event.target.files; //FileList object
        var output = document.getElementById("result");
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.match('image')) continue;
            var picReader = new FileReader();
            picReader.addEventListener("load", function(event) {
                var picFile = event.target;
                var div = document.createElement("div");
                div.innerHTML = "<img class='thumbnail' style='width: 120px; height: 110px' src='" + picFile.result + "'" + "title='" + picFile.name + "'/>";
                console.log(file.name + '::' + file.size);
                output.insertBefore(div, null);
            });
            picReader.readAsDataURL(file);
        }
    } else {
        console.log("Your browser does not support File API");
    }
}
// document.getElementById('files').addEventListener('change', handleFileSelect, false);


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

// tags input
$(function() {
    $('#tags-inp').tagsinput();
});

// datepicker
$(function() {
    // $( "#datepicker" ).datepicker({startDate: '-0m'});
    $("#datepickerFuture").datepicker({ endDate: new Date() });
});
$(function() {
    // $( "#datepicker" ).datepicker({startDate: '-0m'});
    $("#datepickerPast").datepicker({ startDate: new Date() });
});