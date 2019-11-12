/**/
(function($) {
  
		//alert(parent_term);
	var bnd=$("#brand").val();
	if(bnd == "")
	{
	$("#model").prop('disabled', true);
	}
	/* Brand */
	$("#brand").bind("mouseenter  keyup ",function(){
		alert
		var val_brand=$(this).val();
		var brand_val={action:'ret_brand',val_brand:val_brand};
		jQuery.post(adminajax,brand_val,function(brand_data)
		{
		var brand_src=brand_data.split(',');
		$( "#brand" ).autocomplete({
		  source: brand_src
		});
		if (brand_src.length === 0) {
		
		}
		else
		{
			$("#model").prop('disabled', false);
		}
		});
	});
    /*var availableBrands = [parent_term];
    $( "#brand" ).autocomplete({
      source: availableBrands
    });*/
	$("#brand").attr("placeholder", "Enter Your Brand");
	
	/* Model */
	
	$("#model").bind("mouseenter  keyup ",function(){
		var brd_val=$("#brand").val();
		var val_model=$(this).val();
		var model_val={action:'ret_model',val_model:val_model,brd_val:brd_val};
		jQuery.post(adminajax,model_val,function(model_data)
		{
		var model_src=model_data.split(',');
		$( "#model" ).autocomplete({
		  source: model_src
		});
		});
	});
	/*var availableModels = [ 'MLX','TLX'  ];
    $( "#model" ).autocomplete({
      source: availableModels
    });*/
	$("#model").attr("placeholder", "Enter Your Model");
	
	if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
		if(filesLength < 4)
		{
		 $("div#car_image_error").text("(Minimum 4 Images Required)");
		 $("#files").val("");
		}
		else
		{
		  for (var i = 0; i < filesLength; i++) {
			var f = files[i]
			var fileReader = new FileReader();
			fileReader.onload = (function(e) {
			  var file = e.target;
			  $("<span class=\"pip\">" +
				"<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
				"<br/><span class=\"remove\">Remove image</span>" +
				"</span>").insertAfter("#files");
			  $(".remove").click(function(){
				$(this).parent(".pip").remove();
			  });
			  
			  
			  /*$("<img></img>", {
				class: "imageThumb",
				src: e.target.result,
				title: file.name + " | Click to remove"
			  }).insertAfter("#files").click(function(){$(this).remove();});*/
			  
			});
			fileReader.readAsDataURL(f);
		  }
	  }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
  
  
  $("#sell_submit").click(function(event){
  //alert("test");
	var brand_val=$("#brand").val();
	var model_val=$("#model").val();
	var year_val=document.getElementById("year").value;
	var fuel_val=$('input[name=fuel]:checked').val();
	var trans_val=$('input[name=transmission]:checked').val();
	var condition_val=$('input[name=condition]:checked').val();
	var mileage_val=$("#mileage").val();
	var specs_val=$('input[name=specs]:checked').val();
	var car_color_val=$('input[name=car_color]:checked').val();
	var price_val=$("#price").val();
	var location_val=document.getElementById("location").value;
	var desc_val=$("#desc").val();
	var car_image=document.getElementById("files").value;
	var mobile_no = document.getElementById("mobile").value;
    var filter = /^[0-9-+]+$/;
	if(brand_val == "")
	{
		$("div#brand_error").text("(Please Select Brand)");
		event.preventDefault();
	}
	else if(model_val == "")
	{
		$("div#model_error").text("(Please Select Model)");
		event.preventDefault();
	}
	else if(year_val == "")
	{
		$("div#year_error").text("(Please Select Year)");
		event.preventDefault();
	}
	else if(fuel_val == "" || fuel_val == null)
	{
		$("div#fuel_error").text("(Please Select Fuel)");
		event.preventDefault();
	}
	else if(trans_val == "" || trans_val == null)
	{
		$("div#trans_error").text("(Please Select Transmission)");
		event.preventDefault();
	}
	else if(condition_val == "" || condition_val == null)
	{
		$("div#condition_error").text("(Please Select Condition)");
		event.preventDefault();
	}
	else if(mileage_val == "")
	{
		$("div#mileage_error").text("(Please Select Mileage)");
		event.preventDefault();
	}
	else if(specs_val == "" || specs_val == null)
	{
		$("div#specs_error").text("(Please Select Specs)");
		event.preventDefault();
	}
	else if(car_color_val == "" || car_color_val == null)
	{
		$("div#car_color_error").text("(Please Select Car Color)");
		event.preventDefault();
	}
	else if(price_val == "")
	{
		$("div#price_error").text("(Please Select Price)");
		event.preventDefault();
	}
	else if(location_val == "")
	{
		$("div#location_error").text("(Please Select Location)");
		event.preventDefault();
	}
	else if(desc_val == "")
	{
		$("div#desc_error").text("(Please Fill Description)");
		event.preventDefault();
	}
	else if(car_image == "")
	{
		$("div#car_image_error").text("(Minimum 4 Images Required)");
		event.preventDefault();
	}
	else if (!filter.test(mobile_no)) {
        $("div#mobile_error").text("(Please enter valid mobile no.)");
        return false;
    }
    else {
	var doors_val=$('input[name=doors]:checked').val();
	var car_type=$('input[name=car_type]:checked').val();
	var engine_val=$("#engine").val();
	var power_val=$("#power").val();
	var extArray = [];
	$(".exterior:checked").each(function() {
		extArray.push($(this).val());
	});
	var exterior_val=extArray;
	var intArray = [];
	$(".interior:checked").each(function() {
		intArray.push($(this).val());
	});
	var interior_val=intArray;
	var equipArray = [];
	$(".equipment:checked").each(function() {
		equipArray.push($(this).val());
	});
	var equipment_val=equipArray;
	
	var user_id=$("#user_id").val();

        var fd = new FormData();
        var files_data = jQuery('.files-data'); // The <input type="file" /> field
        
        // Loop through each data and create an array file[] containing our files data.
        jQuery.each(jQuery(files_data), function(i, obj) {
            jQuery.each(obj.files,function(j,file){
                fd.append('files[' + j + ']', file);
            })
        });
        fd.append('brand',brand_val);
		fd.append('model',model_val);
		fd.append('year',year_val);
		fd.append('fuel_val',fuel_val);
		fd.append('doors_val',doors_val);
		fd.append('trans_val',trans_val);
		fd.append('car_type',car_type);
		fd.append('engine_val',engine_val);
		fd.append('power_val',power_val);
		fd.append('condition_val',condition_val);
		fd.append('mileage_val',mileage_val);
		fd.append('specs_val',specs_val);
		fd.append('car_color_val',car_color_val);
		fd.append('price_val',price_val);
		fd.append('location_val',location_val);
		fd.append('desc_val',desc_val);
		fd.append('mobile_no',mobile_no);
		fd.append('exterior_val',exterior_val);
		fd.append('interior_val',interior_val);
		fd.append('equipment_val',equipment_val);
		fd.append('user_id',user_id);
		
        // our AJAX identifier
        fd.append('action', 'sell_your_car');  

        jQuery.ajax({
            type: 'POST',
            url: 'http://saravanank.com/car/wp-admin/admin-ajax.php',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                jQuery('.upload-response').html(response); // Append Server Response
            }
        });	
    }
	
   });
   
   
   /* Favourite */
   
   $(".dash_content #favourite").click(function()
   {
		var listing_id="94";
		var new_fav={action:'save_favourite',listing_id:listing_id};
				jQuery.post("http://saravanank.com/car/wp-admin/admin-ajax.php",new_fav,function(data)
				{
				$("#favourite").val(data);
				});
	});
	
	
	/* update Account */
	$(".update_profile").click(function(event)
	{
	//alert("sdfadsf");
		var nickname=$("#nickname").val();
		var mob_no=$("#userphone").val();
		var userdesc=$("#userdesc").val();
		var u_id=$("#u_id").val();
		var files_data = $('#userimage');
		var files_data = new FormData();
		files_data.append( "nickname", nickname);
		files_data.append( "mob_no", mob_no);
		files_data.append( "userdesc", userdesc);
		files_data.append( "userid", u_id);
		files_data.append( "userimage", $('#userimage')[0].files[0]);
		files_data.append( "action", 'edit_user_det');
		jQuery.ajax({
            type: 'POST',
            url: 'http://saravanank.com/car/wp-admin/admin-ajax.php',
            data: files_data,
            contentType: false,
            processData: false,
            success: function(response){
			//alert(response);
               $("#resp").html(response);// Append Server Response
            }
        });
		
	});
	
	
	/*Profile edit */
	$(".profile_edit").click(function(event)
	{
		var nickname=$("#nicknme").val();
		var mob_no=$("#mobno").val();
		var old_pwd=$("#old_pwd").val();
		var new_pwd=$("#new_pwd").val();
		var confrm_pwd=$("#confrm_pwd").val();
		var u_id=$("#u_id").val();
		var edit_prf={action:'edit_profile',nickname:nickname,mob_no:mob_no,old_pwd:old_pwd,new_pwd:new_pwd,confrm_pwd:confrm_pwd,userid:u_id};
		jQuery.post(adminajax,edit_prf,function(data)
		{
			
			$("#resp_prof").html(data);
			$("#old_pwd").val("");
			$("#new_pwd").val("");
			$("#confrm_pwd").val("");
		});
	});
  })(jQuery);
  