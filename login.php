<?php
include "template/header.php";
?>

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="POST" action="member/cek-login.php">
							<input type="text" name="username" id="username" placeholder="Name" />
							<input type="password" name="password" id="password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="buat_akun.php" method="POST">
							<input type="text" name="nama" id="nama" placeholder="Name"/>

							<input type="text" name="username" id="username" 
							placeholder="Username"/>

							<input type="password" name="password" id="password" placeholder="Password"/>

							<input type="text" name="alamat" id="alamat" placeholder="Alamat"/>

							<input type="email" name="email" id="email" placeholder="Email"/>

							<input type="text" name="no_hp" id="no_hp" placeholder="No Telepon"/>

							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	

<?php
include "template/footer.php";
?>