jQuery('.add-friend').on('click', function () {
    var id = jQuery(this).data('id');
    Swal.fire({
        title: 'Confirmation Message',
        text: "Are you sure you want to add this user?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if (result.value) {
            jQuery.post(soa_chat_object.ajaxurl + '?action=add_friend', {id: id}, function (data, textStatus, xhr) {
                console.log(data);
                if (data.status) {
                    Swal.fire(
                        'Confirmation Message',
                        data.message,
                        'success'
                    )
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: data.message,
                    })
                }
            }, 'json');
        }
    })
});


jQuery('.remove-friend').on('click', function () {
    var id = jQuery(this).data('id');
    Swal.fire({
        title: 'Confirmation Message',
        text: "Are you sure you want to remove this user?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirm'
    }).then((result) => {
        if (result.value) {
            jQuery.post(soa_chat_object.ajaxurl + '?action=remove_friend', {id: id}, function (data, textStatus, xhr) {
                console.log(data);
                if (data.status) {
                    Swal.fire(
                        'Confirmation Message',
                        data.message,
                        'success'
                    )
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: data.message,
                    })
                }
            }, 'json');
        }
    })
});



