<html>
<head>
	<?php include 'includes/head.php'; ?>
	<title>Login</title>
</head>
<body>
	<div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
	  		<a class="navbar-brand" href="index.php" style="color: #4cff00; font-size: 22px;">Hotel<span style="color: #fb7416"> Rwanda</span></a>
	  	</div>
	</nav>
	</div>
	<div class="container">
	<br/>
	<b><h6 class = "text-info">Login Portal</h6></b>
		<hr />
	<br/>
		<div class="row">
		<br/>
			<div class="col-md-6" style="border-right: 1px solid grey"></div>
			<div class="col-md-6 col-md-offset-4">
				<div class="login-panel panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title"><i>Please Enter Details</i></h5><hr />
                    </div>
                    <div class="panel-body">
                        <form role="form" method = "post" enctype = "multipart/form-data">
                            <fieldset>
							
								 <div class="form-group">
									<label>Email Address</label>
									<div class="input-group">
										<div class="input-group-prepend">
										  <div class="input-group-text"><i class="fa fa-envelope"></i></div>
										</div>
										<input class="form-control" placeholder="Enter email address" name="email_address" type="email" required>
									</div>
								</div>
								
								 <div class="form-group">
									<label>Password</label>
									<div class="input-group">
										<div class="input-group-prepend">
										  <div class="input-group-text"><i class="fa fa-lock"></i></div>
										</div>
										<input class="form-control" placeholder="Enter password" name="password" type="password" required>
									</div>
								</div>                          
                              
                                <button class="btn btn-lg btn-success btn-block " name = "login"><i class="fa fa-sign-in"></i>  Login</button>
                            </fieldset>	
                        </form>
						
						<center> <a href="reset_pass.php"> <i class="fa fa-spin fa-snner"></i>  Forgot password?</a></center>	
						<?php require_once 'includes/login_query.php' ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
	
	<div>
		<?php include 'includes/footer.php' ?>
	</div>

</body>
</html>