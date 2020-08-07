jQuery(document).ready(function(){
    jQuery('.log-button').click(function(){
       jQuery(".login-window").removeClass('hide-login').addClass('show-login');
    });
});

/*jQuery(document).ready(function(){
    jQuery('.login-window').click(function(){
       jQuery(".login-window").removeClass('show-login').addClass('hide-login');
    }).children().click(function(e) {
        return false;
    });
});*/

jQuery(document).ready(function(){
    jQuery('.exit-button').click(function(){
       jQuery(".login-window").removeClass('show-login').addClass('hide-login');
    });
});