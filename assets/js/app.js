$(function ($) {
    var email_regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    var mobile_regex = /^[1-9]{1}[0-9]{9}$/;
    $("#registerForm").on('submit', function (e){
        e.preventDefault();
        var firstName = $("#firstName");
        var lastName = $("#lastName");
        var username = $("#username");
        var email = $("#email");
        var password = $("#password");
        var gender = $('input[name="gender"]:checked');
        var mobileNumber = $("#mobileNumber");

        if(firstName.val() == ""){
            return setErrors(firstName,"Please enter first name");
        } else if(lastName.val() == ""){
            return setErrors(lastName,"Please enter last name");
        } else if(username.val() == ""){
            return setErrors(username,"Please enter username");
        } else if(email.val() == ""){
            return setErrors(email,"Please enter email address");
        } else if(password.val() == ""){
            return setErrors(password,"Please enter password");
        } else if(email_regex.test(email.val()) == false){
            return setErrors(email,"Please enter a valid email address");
        } else if(!gender.length){
            return setRadioErrors('genderMsg',"Please select male or female");
        } else if(mobileNumber.val() != "" && mobile_regex.test(mobileNumber.val()) == false){
            return setErrors(mobileNumber,"Please enter valid mobile number");
        }

        var formData = new FormData($(this)[0]);

        $.ajax({
            url:$(this).attr('action'),
            type:'post',
            data:formData,
            contentType: false,
            processData:false,
            dataType : 'json',
            beforeSend: function () {
                // loader
            },
            success: function (data) {
                if(data.status == 'success'){
                    alert(data.message);
                    window.location.href = "./login";
                } else {
                    alert(data.message);
                }
            },
            error: function () {
                alert("System Problem Please Try Again");
            }
        });

        return false;
    });

    $("#loginForm").on('submit', function (e){
        e.preventDefault();
        var email = $("#email");
        var password = $("#password");

        if(email.val() == ""){
            return setErrors(email,"Please enter email address");
        } else if(email_regex.test(email.val()) == false){
            return setErrors(email,"Please enter a valid email address");
        } else if(password.val() == "") {
            return setErrors(password,"Please enter password");
        }

        var formData = new FormData($(this)[0]);

        $.ajax({
            url:$(this).attr('action'),
            type:'post',
            data:formData,
            contentType: false,
            processData:false,
            dataType : 'json',
            beforeSend: function () {
                // loader
            },
            success: function (data) {
                if(data.status == 'success'){
                    alert(data.message);
                    window.location.href = "./home";
                } else {
                    alert(data.message);
                }
            },
            error: function () {
                alert("System Problem Please Try Again");
            }
        });

        return false;
    });

    $("#deleteProfile").click(function (e){
        e.preventDefault();
        $.ajax({
            url:'./deleteProfile',
            type:'get',
            data:'',
            dataType : 'json',
            success: function (data) {
                if(data.status == 'success'){
                    alert(data.message);
                    window.location.href = "./login";
                } else {
                    alert(data.message);
                }
            },
            error: function () {
                alert("System Problem Please Try Again");
            }
        });

        return false;
    });

});

function setErrors(id,msg){
    $(".has-error").removeClass('has-error');
    $('.form-group').find('.error').remove();
    id.
        focus()
        .parents('.form-group')
        .addClass('has-error');

    id
        .parent()
        .append('<span class="help-block error">'+msg+'</span>');
    return false;
}

function setRadioErrors(id,msg){
    $(".has-error").removeClass('has-error');
    $('.form-group').find('.error').remove();
    $('#'+id)
        .parents('.form-group')
        .addClass('has-error');

    $('#'+id)
        .append('<span class="help-block error">'+msg+'</span>');
    return false;
}