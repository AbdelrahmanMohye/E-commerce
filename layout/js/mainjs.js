$(function(){
	'use strict';
        jQuery.htmlPrefilter = function( html ) {
	return html;
        };
	$('.choose_sing_login span').click(function(){
       $(this).addClass('selected').siblings().removeClass('selected');

       if ($('.choose_sing_login .T_login').hasClass('selected')) {
       	$('.SignUp_Login .login').removeClass('hidden');
       	$('.SignUp_Login .SignUp').addClass('hidden');
       }else{
       	$('.SignUp_Login .login').addClass('hidden');
       	$('.SignUp_Login .SignUp').removeClass('hidden');
       }
	});

       

});
