// specialty-list "on change" event handler
$( "#specialty" ).change(function() {
    // that = specialty-list
    var that = this;
    console.log('On change event for #specialty: value = ' + that.value);
    // send ajax GET request 
    $.ajax({
        // method
        method: 'GET',
        // url
        url: "ajax-patient-book-appointment.php",
        // data
        data: {
            spec: that.value
        },
        // success handler
        success: function( data ) {
            // convert result from JSON
            console.log('Data received: ' + data);
            // initialize html for doctors list options
            doctors_options_html = '';
            // generate html for doctors list options
            data.forEach(docName => {
                //var docName = doc['username'];
                doctors_options_html += `<option value="${docName}">${docName}</option>`;
            });
            // display html for doctors list options
            $('#doctor').html(doctors_options_html);
            console.log('Ajax successful: data = ' + data);
        },
        // error handler
        error: function(jqXHR, textStatus, errorThrown){
            console.error('Ajax error: ' + textStatus + " - " + errorThrown);
        }
    });
    // ajax end
});
// "on change" event handler end