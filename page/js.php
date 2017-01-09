
<script type="text/javascript">

	function select_argv(op){
		$('#argv_control').html('');
		$('#ajax_response').html('');

		$.getJSON("data.json?"+ new Date().getTime(), function(data) {
			//console.log(data); 
			filter_object=data.filter[op];

			if (filter_object.hasOwnProperty("argv_type")) {
				if (filter_object.argv_type == 'slide') {
					var argv_split=filter_object.argv_range.split(' ');
					show_argv_control(op,argv_split,filter_object.argv_name)
				}else if(filter_object.argv_type == 'resize'){
					show_argv_control_resize(op,filter_object)
				}else if(filter_object.argv_type == 'button'){
					show_argv_control_button(op,filter_object)
				}
			}else{
				$('#argv_control').html(capitalizeFirstLetter(op) + ' result:');
				send_ajax(op);
			}



		});
	}

	

	function show_argv_control_button(op, filter_object){


		console.log(filter_object); 

		argv_control='Choose type: ';
		for (code in filter_object['argv_button']) {
			console.log(code);
			console.log(filter_object.argv_button[code]);
			button_text=filter_object.argv_button[code];
			argv_control+=' <button onclick="send_ajax(\''+op+'\','+code+')" class="btn btn-default">'+button_text+'</button>';
		}
		argv_control+='<br><br>';

		$('#argv_control').html(argv_control);


	}

	function show_argv_control_resize(op, filter_object){
		//console.log(filter_object); 

		

		argv_control='<div class="form-group"><input id="resize_x" type="number" name="" class="form-control input_resize" value="'+$.cookie('file_origin_width')+'"> x ';
		argv_control+='<input id="resize_y" type="number" name="" value="'+$.cookie('file_origin_height')+'" class="form-control input_resize"> ';
		//argv_control+='<input type="checkbox" name="">';
		argv_control+=' <button id="btn_resize" class="btn btn-default">Apply</button></div>';
		$('#argv_control').html(argv_control);

		$("#btn_resize").click(function(){
			v3=$('#resize_x').val();
			v4=$('#resize_y').val();
			send_ajax(op,v3,v4);
		});


	}


	function show_argv_control(op,argv_split,argv_name){
		argv_name=(argv_name == undefined ? 'Value' : argv_name);
		a=Number(argv_split[0]);
		b=Number(argv_split[1]);
		c=Number(argv_split[2]);

		if (typeof $.cookie(op+'_argv') === 'undefined'){
			$.cookie(op+'_argv',a+c)		
		}
		send_ajax(op,$.cookie(op+'_argv'));	

		argv_control=capitalizeFirstLetter(op) + ' result:';
		argv_control+='<div class="well">'+capitalizeFirstLetter(argv_name)+': &nbsp;&nbsp;<input id="ex1" data-slider-id="ex1Slider" type="text" data-slider-min="'+a+'" data-slider-max="'+b+'" data-slider-step="'+c+'" data-slider-value="'+$.cookie(op+'_argv')+'"/></div>';
	
		$('#argv_control').html(argv_control);

		$('#ex1').slider({
			formatter: function(value) {
				return 'Value:' + value;
			}
		});
		$("#ex1").on("slideStop", function(slideEvt) {
			console.log(slideEvt.value);
			send_ajax(op,slideEvt.value);
			$.cookie(op+'_argv', slideEvt.value, {expires: 365});
		});

	}




	function send_ajax(op,v3,v4,v5,v6,v7,v8,v9){
		//console.log(op);

		path='ajax.php?op='+op+'&v3='+v3+'&v4='+v4+'&v5='+v5+'&v6='+v6+'&v7='+v7+'&v8='+v8+'&v9='+v9;
		$.ajax({
			url: path,
			type: 'GET',
			// async:false, // compromise
		}).success( function(response,status,xhr) {			
			//console.log(response);
			$('#ajax_response').html(response);
			$("html,body").animate({scrollTop: $("#processed_panel").offset().top-80}, 500);
		}).error( function(e) {
		});

	}

	function capitalizeFirstLetter(string) {
		return string.charAt(0).toUpperCase() + string.slice(1);
	}

    // window.onbeforeunload = confirmExit;
    // function confirmExit() {
    //     return "You have attempted to leave this page, the file that you not save will lose, Are you sure?";
    // }
</script>