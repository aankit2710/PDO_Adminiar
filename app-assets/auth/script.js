$('document').ready(function()
{
	/* validation */
	$("#login-form").validate({
		rules:
		{
			password: {
				required: true,
			},
			user_email: {
				required: true,
				email: true
			},
		},
		messages:
		{
			password:{
				required: "Please Enter Correct Password"
			},
			user_email: "Please Enter Correct Username",
		},
		submitHandler: submitForm,
		errorPlacement: function(error, element)
		{
			if (element.attr("name") == "user_email" )
				error.insertAfter(".email_error");
			else if  (element.attr("name") == "password" )
				error.insertAfter(".pass_error");
			else
				error.insertAfter(element);
		}
	});
	/* validation */

	/* login submit */
	function submitForm()
	{
		var data = $("#login-form").serialize();

		$.ajax({

			type : 'POST',
			url  : 'ajax/auth_user.php',
			data : data,
			beforeSend: function()
			{
				$("#error").fadeOut();
				$("#btn-login").html('<span class="bx-transfer"></span> &nbsp; Processing ...');
			},
			success :  function(response)
			{
				if(response=="ok"){

					$("#btn-login").html('Signing In ...');
					setTimeout(' window.location.href = "dashboard.php"; ',1000);
				}
				else{

					$("#error").fadeIn(1000, function(){
						$("#error").html('<div class="alert alert-danger"> <span class="bx-info-circle"></span> &nbsp; '+response+' !</div>');
						$("#btn-login").html('<span class="bx-log-in"></span> &nbsp; Sign In');
					});
				}
			}
		});
		return false;
	}
	/* login submit */
});