$( document ).ready(function() {
    //hide login/register form
    $("#loginform").toggle();
    
    //hide buttons for login/register
    $("#loginbtn").toggle();
    $("#registerbtn").toggle();
});

$(document).on("click","#signinbtn, #signupbtn",function(){
    //show login/register form
    $("#loginform").toggle();
    
    //hide buttons for signin/signup
    $("#signinbtn").toggle();
    $("#signupbtn").toggle();
});

$(document).on("click","#signinbtn",function(){
    //show button for login
    $("#loginbtn").toggle();
});
$(document).on("click","#signupbtn",function(){
    //show button for register
    $("#registerbtn").toggle();
});