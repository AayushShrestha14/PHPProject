// Wait for the DOM to be ready
$(function () {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='studentdetails']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            firstname: {
                minlength: 3,
                maxlength: 30,
                pattern: "^[a-zA-Z_]*$",
                required: true,
                lettersonly:true              
            },
            surname: {
                minlength: 3,
                maxlength: 30,
                pattern: "^[a-zA-Z_]*$",
                required: true,
                
            },
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
            },
            dob: {
                required: true,
            },
            marks1:{
                number:true,
                min:0,
                max:100,
                required:true
            },
            marks2:{
                number:true,
                min:0,
                max:100,
                required:true
            },
            marks3:{
                number:true,
                min:0,
                max:100,
                required:true               
            },
            marks4:{
                number:true,
                min:0,
                max:100,
                required:true               
            },
            marks5:{
                number:true,
                min:0,
                max:100,
                required:true               
            },
            marks6:{
                number:true,
                min:0,
                max:100,
                required:true               
            }
        },
        
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },

        // Specify validation error messages
        messages: {
            firstname: "Please enter your firstname",
            surname: "Please enter your surname",
            dob: {
                required: "Please provide your date of birth",
            },
            email: {
                required:'Please enter an email address',
                email:"Please enter a valid email address"}
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
});