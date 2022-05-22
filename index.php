<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Practice </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-xl-6">
			<form  enctype="multipart/form-data" id="myform">
				@csrf
				<div class="form-group">
					<label>Name : </label>
					<input type="text" name="name" class="form-control">
					<span style="color: red;" id="name"></span>
				</div>
				<div class="form-group">
					<label>Email : </label>
					<input type="text" name="email" class="form-control">
					<span style="color: red;" id="email"></span>
				</div>
				<div class="form-group">
					<label>Password : </label>
					<input type="text" name="password" id="password" class="form-control">
					<span style="color: red;" ></span>
				</div>
				<div class="form-group">
					<label>Confirm Password : </label>
					<input type="text" name="cpassword" class="form-control">
					<span style="color: red;" id="cpassword"></span>
				</div>
				<a class="btn btn-primary" id="submit">Save</a>
				<!-- <input type="submit" name="save" id="submit" class="btn btn-primary"> -->
			</form>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
<script>
	$(document).ready(function(){
		$("#submit").click(function(){
			var form=$("#myform");

			$.validator.addMethod("onlyalpha", function (value, element)
			{
				if(isNaN(value))
				{
					return true;
				}
				else
				{
					return false;
				}
			});

			form.validate({
				rules :{
					name : {
						required: true,
						minlength : 3,
						onlyalpha : true,

					},
					email : {
						required : true,
						email    : true,
					},
					password : {
						required : true,
					},
					cpassword : {
						required : true,
						equalTo : "#password",
					}
				},
				messages : {
					name :{
						required  : "This field is required",
						minlength : "Name Must be 3 character", 
						onlyalpha : "Only alpha",
					},
					email : {
						required : "This field is required",
						email    : "Invalid email",
					},
					password : {
						required : "Password field is required",
					},
					cpassword : {
						required : 'This field is required',
						equalTo : "Password Not same",
					}

				},
			});

			if(form.valid()==true)
			{
				alert("Form submit");
			}
		});


	});
</script>
</body>
</html>
