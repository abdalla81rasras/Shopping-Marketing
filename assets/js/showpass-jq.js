var InputPassword = $(".InputPassword");
var ShowPassword = $(".showpassword");

var InputCPassword = $(".InputCPassword");
var ShowCPassword = $(".showcpassword");

ShowPassword.on("click", function() {

    if (InputPassword.attr("type") === "password") {
        InputPassword.attr("type", "text");
        ShowPassword.attr("class", "fa fa-eye");
    } else {
        InputPassword.attr("type", "password");
        ShowPassword.attr("class", "fa fa-eye-slash");
    }

});

ShowCPassword.on("click", function() {

    if (InputCPassword.attr("type") === "password") {
        InputCPassword.attr("type", "text");
        ShowCPassword.attr("class", "fa fa-eye");
    } else {
        InputCPassword.attr("type", "password");
        ShowCPassword.attr("class", "fa fa-eye-slash");
    }
    
});
