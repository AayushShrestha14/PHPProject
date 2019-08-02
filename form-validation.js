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
                lettersonly: true
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
            password:{
                required: true
            },
            verifypassword:{
                required: true
            },
            dob: {
                required: true,
            },
            marks1: {
                number: true,
                min: 0,
                max: 100,
                required: true
            },
            marks2: {
                number: true,
                min: 0,
                max: 100,
                required: true
            },
            marks3: {
                number: true,
                min: 0,
                max: 100,
                required: true
            },
            marks4: {
                number: true,
                min: 0,
                max: 100,
                required: true
            },
            marks5: {
                number: true,
                min: 0,
                max: 100,
                required: true
            },
            marks6: {
                number: true,
                min: 0,
                max: 100,
                required: true
            }
        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        // Specify validation error messages
        messages: {
            firstname: {
                required: "Please enter your firstname",
                lettersonly: "Please enter alphabets only"
            },
            surname: "Please enter your surname",
            dob: {
                required: "Please provide your date of birth",
            },
            email: {
                required: 'Please enter an email address',
                email: "Please enter a valid email address"
            },
            password: {
                required: 'Please enter a password'
            },
            verifypassword:{
                required: 'Please Re-Enter password'
            }
//            marks1:"Enter your marks",
//            marks2:"Enter your marks",
//            marks3:"Enter your marks",
//            marks4:"Enter your marks",
//            marks5:"Enter your marks",
//            marks6:"Enter your marks"

        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
});

function hidepracticalmarks(n) {
  //var x = document.getElementsByClassName("practicalmarkstext").attr('value');
var x=n;//$( this ).val();

  if (x=='yes'){
     $("#practicalmarksblock").removeClass("hidden");
  }
   if (x=='no'){
     $("#practicalmarksblock").addClass("hidden");
  }
} 