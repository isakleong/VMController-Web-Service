<!DOCTYPE html>
<html>
<head>
	<title>Proyek Tekvir</title>
	<script src="https://code.jquery.com/jquery-3.4.1.js"
	integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"/>
	<style type="text/css">
	#home{
		margin-top: 50px;
		text-align: center;
	}
</style>
</head>
<body style="text-align: center; background-color: #f2b51d">
	<div class="container">

		<div class="jumbotron" id="home">
			<h1 class="display-3">Choose Your Command!</h1>
			<p class="lead">This is the way you controll the VM</p>
			<hr class="my-4">
			<!-- <form class="form-inline justify-content-center">
				<label class="sr-only" for="yourEmail">Email</label>
				<div class="input-group mb-2 mr-sm-2 mb-sm-0">
					<div class="input-group-addon">@</div>
					<input type="text" class="form-control" id="yourEmail" placeholder="Your Email">
				</div>
				<button type="button" class="btn btn-primary my-2 my-sm-0">Sign Up</button>
			</form> -->
			<form class="justify-content-center" method="post">
				<div class="row" style="padding-bottom: 30px;">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="input-group mb-2 mr-sm-2 mb-sm-0">
							<select class="form-control mr-sm-2" id="exampleFormControlSelect1" name="command" onchange="java_script_:show(this.options[this.selectedIndex].value)">
								<option value="" disabled selected>Command</option>
								<option value="START">POWER ON</option>
								<option value="STOP">POWER OFF</option>
								<option value="SUSPEND">SUSPEND</option>
								<option value="FCLONE">FULL CLONE</option>
								<option value="LCLONE">LINKED CLONE</option>
								<option value="RUNSC">RUN SCRIPT</option>
							</select>
							<input type="submit" name="kumpul" id="kumpul" class="btn btn-primary my-2 my-sm-0">
						</div>
						<br>
						<button type="button" class="btn btn-primary my-2 my-sm-0" name="terminal" id="terminal">See Terminal</button>
					</div>
				</div>

				<div class="row">
					<div class="col" id='hiddenDiv' style="display: none;">
						<b>Contoh path untuk clone: C:\Users\Eryn\Documents\Virtual Machines\vm-clone.vmx</b><br>
						<label for="path">Path untuk clone : </label>
						<input type="text" class="form-control" name="clonepath" id="clonepath" aria-describedby="clonepath" placeholder="Enter path" onfocus="Contoh path untuk clone: C:\Users\Eryn\Documents\Virtual Machines\vm-clone.vmx">
					</div>
				</div>

				<div class="row">
					<div class="col" id='hiddenDiv2' style="display: none;">
						<input type="file" class="form-control" id="sortpicture" name="sortpic">
						<br>
						<button id="upload" type="button" class="btn btn-primary" required>Upload</button><br><br>
						<label for="interpreter">Interpreter : </label>
						<input type="text" class="form-control" name="interpreter" id="interpreter" aria-describedby="interpreter" placeholder="Enter interpreter">
					</div>
				</div>

				<input type="hidden" name="pathh" id="pathh" value="">
			</form>
			<br>
		</div>

	</div>
	<script type="text/javascript">
		function show(select_item) {
			if (select_item == "START" || select_item == "STOP" || select_item == "SUSPEND" ) {
				hiddenDiv.style.visibility='hidden';
				hiddenDiv.style.display='none';

				hiddenDiv2.style.visibility='hidden';
				hiddenDiv2.style.display='none';
			} 
			else if (select_item == "LCLONE" || select_item == "FCLONE") {
				hiddenDiv.style.visibility='visible';
				hiddenDiv.style.display='block';

				hiddenDiv2.style.visibility='hidden';
				hiddenDiv2.style.display='none';
				Form.fileURL.focus();
			}
			else if(select_item == "RUNSC"){
				hiddenDiv2.style.visibility='visible';
				hiddenDiv2.style.display='block';

				hiddenDiv.style.visibility='hidden';
				hiddenDiv.style.display='none';
				Form.fileURL.focus();
			} 
		} 
		$(document).ready(function(){
			var pathh;
			$('#upload').on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				var file_data = $('#sortpicture').prop('files')[0];  
				var form_data = new FormData();                  
				form_data.append('file', file_data);
				//alert(form_data);                             
				$.ajax({
				        url: 'upload_file.php', // point to server-side PHP script 
				        dataType: 'text',  // what to expect back from the PHP script, if anything
				        cache: false,
				        contentType: false,
				        processData: false,
				        data: form_data,                         
				        type: 'post',
				        success: function(res){
				        	if(res == 'a'){
				        		alert('gagal');
				        	}else{
				        		alert("Upload sukses!!"); // display response from the PHP script, if any
				        		pathh = res;
				        		document.getElementById('pathh').value = pathh;
					            //alert(document.getElementById('pathh').value + " ");

					        }


					    }
					});
			});

			$('#terminal').on('click', function(e) {
				$.ajax({
					type: "POST",
					url: "terminal.php",
				}).done(function( msg ) {

				});    
			});
				//document.getElementById('pathh').value = pathh;
			});
		</script>
	</body>
	</html>

	<?php
	include "database.php";

	$id= $_GET["num"];

	//get status
	global $con;
	$get_vm=mysqli_query($con,"select * from proyek where id=$id");
	$row=mysqli_fetch_assoc($get_vm);
	$status=$row['status'];

	if($_POST){
		$command = strtoupper($_POST['command']);

		if($status == "OFF" || $status == "PAUSE"){
			if($command=="START"){

				// $vmxpath = "\"C:/Users/Eryn/Documents/Virtual Machines/Ubuntu 64-bit/Ubuntu 64-bit.vmx\"";

				global $con;
				$get_vm=mysqli_query($con,"select * from proyek where id=$id");
				$row=mysqli_fetch_assoc($get_vm);
				$vmxpath=$row['path'];


				$cmd = "\"D:/Kuliah/Sem 6/VmVIX/Debug/vm-vix.exe\" $command  \"$vmxpath\" ";

				$c = shell_exec($cmd);
				echo $c;

				$update_status=mysqli_query($con,"update proyek set status='ON' WHERE id=$id");

				echo "<script> alert('Command Succeeded!'); </script>";
			}
			else{
				echo "<script> alert('VM is OFF!'); </script>";
			}
		}
		else if($status == "ON"){
			if($command=="STOP"){
				global $con;
				$get_vm=mysqli_query($con,"select * from proyek where id=$id");
				$row=mysqli_fetch_assoc($get_vm);
				$vmxpath=$row['path'];

				$cmd = "\"D:/Kuliah/Sem 6/VmVIX/Debug/vm-vix.exe\" $command  \"$vmxpath\" ";

				$c = shell_exec($cmd);
				echo $c;

				$update_status=mysqli_query($con,"update proyek set status='OFF' WHERE id=$id");
				echo "<script> alert('Command Succeeded!'); </script>";
			}
			else if( $command=="SUSPEND"){
				global $con;
				$get_vm=mysqli_query($con,"select * from proyek where id=$id");
				$row=mysqli_fetch_assoc($get_vm);
				$vmxpath=$row['path'];


				$cmd = "\"D:/Kuliah/Sem 6/VmVIX/Debug/vm-vix.exe\" $command  \"$vmxpath\" ";

				$c = shell_exec($cmd);
				echo $c;

				$update_status=mysqli_query($con,"update proyek set status='PAUSE' WHERE id=$id");
				echo "<script> alert('Command Succeeded!'); </script>";
			}
			else if($command=="FCLONE" || $command=="LCLONE"){
				global $con;
				$pathclone=$_POST['clonepath'];

				// $vmxpath = "\"C:/Users/Eryn/Documents/Virtual Machines/Ubuntu 64-bit/Ubuntu 64-bit.vmx\"";
				$get_vm=mysqli_query($con,"select * from proyek where id=$id");
				$row=mysqli_fetch_assoc($get_vm);
				$vmxpath=$row['path'];

				$cmd = "\"D:/Kuliah/Sem 6/VmVIX/Debug/vm-vix.exe\" $command \"$vmxpath\" \"$pathclone\" ";

				$c = shell_exec($cmd);
				echo $c;
				echo "<script> alert('Command Succeeded!'); </script>";
			}
			else if($command=="RUNSC"){
				global $con;
				$get_vm=mysqli_query($con,"select * from proyek where id=$id");
				$row=mysqli_fetch_assoc($get_vm);
				$vmxpath=$row['path'];

				$interpreter=$_POST['interpreter'];

				// $vmxpath = "\"C:/Users/Eryn/Documents/Virtual Machines/Ubuntu 64-bit/Ubuntu 64-bit.vmx\"";

				$scriptfile =  "\"D:/xampp/htdocs/tekvir/" . $_POST['pathh'] .  "\"";

				$cmd = "\"D:/Kuliah/Sem 6/VmVIX/Debug/VmVIX.exe\" \"D:/Kuliah/Sem 6/vm-tekvir/VMTekvir.vmx\" $interpreter $scriptfile";

				
				$c = shell_exec($cmd);

				$variable = "";
				$variable .= "<div class=\"container\"> <div class=\"card\"> <div class=\"body\"> '$c'</div></div></div>";
				echo '<pre>';
				echo $variable;
				echo '<pre>';

				echo "<script> alert('$cmd'); </script>";
			}
			else{
				echo "<script> alert('VM already ON!'); </script>";
			}
		}
	}

	?>



