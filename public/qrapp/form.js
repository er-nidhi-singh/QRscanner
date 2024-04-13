function swalError(message) {
    swal({
        title: "Error!",
        text: message,
        icon: "error",
        button: "OK",
    });
}


$('#qrForm').on('submit', function(e) {
    e.preventDefault(); // Prevent form submission
       var formData = $(this).serialize();
    //    var formData = $(this); 
       console.log(formData);
 
        // If form is valid, proceed with AJAX submission
        $.ajax({
            url: formSaveUrl,
            method: 'POST',
            data: formData,
            success: function(response){
                // Handle success response
                if (response.success) {
                    // Create success message element
                    swal({
                        title: "Success!",
                        text: "Registration completed.",
                        icon: "success",
                        button: "OK",
                    }).then(function() {
                        // Reset form fields
                        window.location.href = homeUrl;
                    });
                 

                    // Append success message to designated location in HTML
                    $('#success-message').html(successMessage).css('color', 'green');

                    // Show success message for 2 seconds
                    successMessage.fadeIn().delay(5000).fadeOut();
                } else {
                    swalError(response.message);

                    // If registration failed, handle error
                
                }

                // Redirect or do other actions as needed
            },
            error: function(xhr, status, error){
                // Handle error response
                console.error(xhr.responseText);
            }
        });
    
});