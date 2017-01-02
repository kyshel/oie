<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.5.4/bootstrap-slider.min.js"></script>

<script type="text/javascript">

	function select_argv(op){
		$('#argv_control').html('');
		$('#ajax_response').html('');

		$.getJSON("data.json?"+ new Date().getTime(), function(data) {
			//console.log(data); 
			filter_object=data.filter[op];

			if (filter_object.hasOwnProperty("argv_type")) {
				if (filter_object.argv_type == 'a') {
					var argv_split=filter_object.argv_range.split(' ');
					show_argv_control(op,argv_split)

				}
			}else{
				send_ajax(op);
			}



		});
	}


	function show_argv_control(op,argv_split){
		a=Number(argv_split[0]);
		b=Number(argv_split[1]);
		c=Number(argv_split[2]);

		if (typeof $.cookie(op+'_argv') === 'undefined'){
			$.cookie(op+'_argv',a+c)		
		}
		send_ajax(op,$.cookie(op+'_argv'));	

		
		argv_control='<div class="well"><input id="ex1" data-slider-id="ex1Slider" type="text" data-slider-min="'+a+'" data-slider-max="'+b+'" data-slider-step="'+c+'" data-slider-value="'+$.cookie(op+'_argv')+'"/></div>';
	
		$('#argv_control').html(argv_control);

		$('#ex1').slider({
			formatter: function(value) {
				return 'value:' + value;
			}
		});
		$("#ex1").on("slideStop", function(slideEvt) {
			console.log(slideEvt.value);
			send_ajax(op,slideEvt.value);
			$.cookie(op+'_argv', slideEvt.value, {expires: 365});
		});

	}




	function send_ajax(op,v3,v4){
		//console.log(op);

		$.ajax({
			url: 'ajax.php?op='+op+'&v3='+v3+'&v4='+v4,
			type: 'GET',
			// async:false, // compromise
		}).success( function(response,status,xhr) {			
			//console.log(response);
			$('#ajax_response').html(response);

		}).error( function(e) {
		});

	}

    // window.onbeforeunload = confirmExit;
    // function confirmExit() {
    //     return "You have attempted to leave this page, the file that you not save will lose, Are you sure?";
    // }
</script>