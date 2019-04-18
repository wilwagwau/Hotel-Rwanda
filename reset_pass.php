<html>
<head>
	<?php include 'includes/head.php'; ?>
	<title>Reset Password</title>
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
			<b><h6 class = "text-info">Reset Password</h6></b>
			<hr />
		<br/>
		<div class="row">
		
			<div class="col-md-6"></div>
			<div class="col-md-6 col-md-offset-4">
				<div class="login-panel panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title"><i>Let's confirm your details</i></h5><hr />
                    </div>
                    <div class="panel-body">
                        <form role="form" method = "post" enctype = "multipart/form-data">
                            <fieldset>
								
								<div class="form-group">
									<label>National ID</label>
									<input class="form-control" placeholder="Enter national id" name="national_id" type="number" required>
								</div>
								
								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control" placeholder="Enter email address" name="email_address" type="email" required>
								</div>
								
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>New Password</label>
											<input type="password" class="form-control" name="new_pass" placeholder="Enter new password" required>
										</div>
										<div class="col">
											<label>Confirm Password</label>
											<input type="password" class="form-control" name="confirm_new_pass" placeholder="Re-enter password" required>
										</div>
									</div>
								</div>
							                
                                <button class="btn btn-lg btn-success btn-block " name = "reset_pass"><i class="fa fa-spin fa-refresh"></i>  Reset Password</button>
								
                            </fieldset>	
                        </form>
				
						<center><a href="login.php"><i class="fa fa-arrow-circle-o-right"></i> Login Here</a></center>
						<?php require_once 'includes/reset_pass_query.php' ?>
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