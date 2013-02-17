<br />
<div class="container">
	<div class="row">
		<div class="span4 offset4">
			<ul class="nav nav-tabs">
				<li>
					<a href="/user/login">Sign In</a>
				</li>
				<li class="active">
					<a href="#">Register</a>
				</li>
			</ul>
			<?php if ($message) : ?>
				<div class="alert">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<?php print $message ?>
				</div>
			<?php endif; ?>
			<form method="POST" accept-charset="UTF-8">
				<input type="text" id="username" class="span4" name="name" placeholder="Username">
				<input type="password" id="password" class="span4" name="password" placeholder="Password">
				<input type="password" id="confirm-password" class="span4" name="confirm_password" placeholder="Confirm password">
				<button type="submit" name="submit" class="btn btn-info">Register</button>
			</form>    
		</div>
	</div>
</div>