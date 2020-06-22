<html>
	<head>
		<title></title>
		<script type="text/javascript" src="js/jquery-3.5.0.min.js"></script>
		<script>
			//$(document).ready(function(){
			//	$("#div1").click(function(){
			//		var name = ['jayvee'];
			//		
			//		var userInput = prompt("What is your name?");
			//		
			//		var result = name.indexOf(userInput) > -1 ? "Welcome":"Please Register first, before login";
			//		
			//		result += ', ' + userInput;
			//		
			//		document.getElementById("div").innerHTML=result;
			//	});
			//	
			//	function sumA(x,y){
			//		return x+y;
			//	}
			//	
			//	$("body").click(function(event){
			//		alert("clicked: "+event.target);
			//		document.getElementById("totalp").innerHTML="You clicked me.!";
			//	});
			//	$("#computation").click(function(){
			//		var input1 = prompt("Enter your first number?");
			//		var input2 = prompt("Enter your second number?");
			//		input1 = Number(input1);
			//		input2 = Number(input2);
			//	
			//		var total = 'The total number you have enter is '+sumA(input1,input2);
			//		
			//	
			//		document.getElementById("total").innerHTML=total;
			//	});
			//});
		</script>
		
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 
<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />
		<script type = "text/javascript" language = "javascript">
		$(function () {
		// $( "#dialog1" ).dialog({
		//	autoOpen: false
		// });
		// 
		// $("#opener").click(function() {
		//	$("#dialog1").dialog('open');
		// });
				
		});
			function myFunction() {
			  var x = document.getElementById("trial").value;
			  document.getElementById("demo").innerHTML = "Patient ID: " + x;
			}
         $(document).ready(function() {
			
			/////////////////////////HTML AJAX
			
			jQuery('#deltachecktemplate').dialog({
					autoOpen:false,
					title:"Delta Check",
					width:900,
					height:500,
					modal:true,
					buttons:{
						"Cancel":function(){
							jQuery(this).dialog('close');
						}
					},
				});
			jQuery('#demos').click(function(){
			
			ss='021-2009-0248';
					jQuery.ajax({
						async:false,
						type:'GET',
						dataType:'html',
						url:'jquery/jquery/resultv2/'+ss,
						success:function(data){
							jQuery('#deltachecktemplate').empty().append(data).dialog('open');
						}
					});
			});
			
			////////////////////
			//////////////////////JSON AJAX GET
			$("#trial").focusout(function(){
				//alert(document.getElementById("trial").value);
				//$(this).css("background-color", "red");
				
				//$("#driver").click(function(event){
				
					var ss =document.getElementById("trial").value;
				
					$.ajax({
					  url:'jquery/jquery/result/'+ss,
					  type:'GET',
						dataType:'json',
						async:false,
					  success:function(data) {
						if(data)
						{
						console.log(JSON.stringify(data),'wew');
						//	alert(data.Patient.id);
							$('#demo').append(data+' <b><i>already used_data</i></b>'+data.Patient.id).css("color", "red");
							
							document.getElementById("demo").innerHTML = json_decode(data);
							$('#trial').val('');
							//alert('yes');
						}else{
							//alert('no');
							$('#demo').css("color", "green");
						}
					  }
				   });
				//});
			
				alert('here');
			});
			
		jQuery('#post').click(function(){

    // Serialize the data in the form
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
   // var serializedData = $form.serialize();
    var serializedData = $('#demos').serialize();
			 $inputs.prop("disabled", true);
			jQuery.ajax({
				async:false,
				url:'jquery/jquery/resultv3',
				type:'POST',
				//data:formData,
				data:{ name: "John", location: "Boston" },
				dataType:'json',
				success:function(data){
								console.log(data);
					if (!data.result)
						alert('Data not Transmitted.');
					else
					{
						alert('Successfully Re-transmitted');
					}

					jQuery("#ajaxdebug").html(data);
				},
				error:function(jqXHR, textStatus, errorThrown){
						alert('There was an error communicating webserver, please contact your administrator. '+errorThrown);							
				}
			});	
		});	
			
			
			
			$("#trial").click(function(){
				$('#demo').css("color", "black");
			});
         });
		 
      </script>
	</head>
	<body>

<button id="opener">open the dialog</button>
<div id="dialog1" title="Dialog Title" hidden="hidden">I'm a dialog</div>
		<!--<div id="div1">
			Hello!
			<?php 
				Configure::load('messages');
			?>
		</div>
		<div id="div">
			
			<?php 
				echo Configure::read('Company.name');
			?>
		</div>
		<div id="computation">
			Addition
		</div>
		
		<p id="totalp">
			asd
		</p>
		<div id="total">
			
		</div>-->
		  <p>Click on the button to load result.html file:</p>
			
		  <div id = "deltacheck">Delta Check</div>
		  <div id = "demos">HTML AJAX</div>
		  <div id = "stage" style = "background-color:blue;">
			 STAGE
		  </div>
		  <input type='test' id='trials'  oninput="myFunction()"/>
		  <input type = "button" id = "driver" value = "Load Data" />
		  <span id="demo">asd</span>
		  <span id="post">POST AJAX</span>
<div id="deltachecktemplate">
	
</div>

	</body>
</html>
<script>

</script>

