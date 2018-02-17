$(document).ready(function () {
    $('#pass').keyup(function (event) {
        if ($('#pass').val() !== ($('#passConfirm').val())) {
            console.log("pass not match");
            $('#passMatch').text("Passwords do not match");
            $('#submit').prop('disabled', true);
        } else {
            console.log("pass match");
            $('#passMatch').text("");
            $('#submit').prop('disabled', false);
        }
    });
    $('#passConfirm').keyup(function (event) {
        if ($('#pass').val() !== ($('#passConfirm').val())) {
            console.log("passConfirm not match");
            $('#passMatch').text("Passwords do not match");
            $('#submit').prop('disabled', true);
        } else {
            console.log("passConfirm match")
            $('#passMatch').text("");
            $('#submit').prop('disabled', false);
        }
    });
});