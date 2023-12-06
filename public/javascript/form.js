$(document).ready(function() {
    $("#showPass").click(function() {
        if ($(this).prop('checked')) {

            $(".typePasswordX").attr('type', 'text'); 
        } else {
            $(".typePasswordX").attr('type', 'password');
        }
    });


// change status using AJAX start

    // $(document).on('click', '#change-status-{{ $record->id }}', function() {
    //     var id = $(this).data('id');
    //     var status = $(this).data('status');

        // AJAX request to update the status
//         $.ajax({
//             url: "{{ route('update-status', $item->id) }}",
//             method: "POST",
//             data: {
//                 status: status
//             },
//             success: function(response) {
//                 // Update the status UI
//                 if (response.status === 'active') {
//                     $("#change-status-" + id).html('Inactive');
//                     $("#change-status-" + id).data('status', 'inactive');
//                 } else {
//                     $("#change-status-" + id).html('Active');
//                     $("#change-status-" + id).data('status', 'active');
//                 }
//             },
//             error: function(error) {
//                 // Handle error
//             }
//         });
//     });
});
// change status using AJAX end
