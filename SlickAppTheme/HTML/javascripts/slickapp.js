$(document).ready(function() {
	$("div.header div.version").css({ '-moz-border-radius': '6px', '-webkit-border-radius': '6px' });
	$("div#contact_form .text_input").css({ '-moz-border-radius': '4px', '-webkit-border-radius': '4px' });
	$("div#about div.right").css({ '-moz-border-radius' : '8px', '-webkit-border-radius': '8px' });
	$("div#contact_form p label").css({ 
			'-moz-border-radius-topleft': '4px', 
			'-moz-border-radius-bottomleft': '4px', 
			'-webkit-border-bottom-left-radius' : '4px',
			'-webkit-border-top-left-radius' : '4px'  
	});
	$("select").css({ '-khtml-appearance' : 'none' });
	$('#reviews').serialScroll({
	  items: 'div',
	  axis: 'y',
	  duration: 800,
	  interval: 5000,
	  cycle: true
	});
	$('#reviews').trigger('next');
	$("a.screenshots").fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	400, 
			'speedOut'		:	400, 
			'overlayShow'	:	false
		});
		$('input#send').click(function() {
        var name = $('input#name').val();
        var email = $('input#email').val();
				var topic = $('input#topic').val();
        var message = $('textarea#message').val();
        $.ajax({
            type: 'post',
            url: 'scripts/send_email.php',
            data: 'name=' + name + '&email=' + email + '&topic=' + topic + '&message=' + message,

            success: function(results) {
                $('p.validation').html(results);
            }
        }); // end ajax
    });
	$("ul.tabs").tabs("div.panes > div", { history: true });
});