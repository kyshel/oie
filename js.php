<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<script type="text/javascript">

	function select_argv(op){
		$('#argv_control').html('');
		$('#ajax_response').html('');
		if (op == 'blur') {
			if (typeof $.cookie('blur_argv') === 'undefined'){
				$.cookie('blur_argv',5)
			}	

			send_ajax(op,$.cookie('blur_argv'));
			argv_control='<select id="argv_selector" onchange="send_ajax(\''+op+'\',this.value)"> \
			<option value="5" selected>5</option> \
			<option value="10">10</option>\
			<option value="20">20</option>\
			<option value="50">50</option></select>';


			$('#argv_control').html(argv_control);
			$('#argv_selector').val($.cookie('blur_argv')).attr('selected', true);
			$('#argv_selector').change(function() {
				$.cookie('blur_argv', $(this).val(), {expires: 365});
			})

		}else if(op == 'threshold'){

			if (typeof $.cookie('threshold_argv') === 'undefined'){
				$.cookie('blur_argv',150)
			}	

			send_ajax(op, $.cookie('threshold_argv'));
			argv_control='<select id="argv_selector" onchange="send_ajax(\''+op+'\',this.value)"> \
			<option value="50" selected>50</option> \
			<option value="100">100</option>\
			<option value="150">150</option>\
			<option value="200">200</option></select>';
			$('#argv_control').html(argv_control);
			$('#argv_selector').val($.cookie('threshold_argv')).attr('selected', true);
			$('#argv_selector').change(function() {
				$.cookie('threshold_argv', $(this).val(), {expires: 365});
			})

		}
		else{
			send_ajax(op);
		}
	}




	function send_ajax(op,v3,v4){
		//console.log(op);

		$.ajax({
			url: 'ajax.php?op='+op+'&v3='+v3+'&v4='+v4,
			type: 'GET',
			// async:false, // compromise
		}).success( function(response,status,xhr) {			
			console.log(response);
			$('#ajax_response').html(response);

		}).error( function(e) {
		});

	}

    // window.onbeforeunload = confirmExit;
    // function confirmExit() {
    //     return "You have attempted to leave this page, the file that you not save will lose, Are you sure?";
    // }
</script>