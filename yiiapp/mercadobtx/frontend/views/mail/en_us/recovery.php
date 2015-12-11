<p>Message from <?php echo $from . ': ' ?></p>

<p>We recieved a request to change your password.</p>
<p>If you recognize this request, follow this link to reset your password</p>
<a href="<?php echo $reset_link; ?>">Reset Password</a>
	
<p>If you DO NOT recognize this request, someone maybe trying to hack into your account.</p>
<a href="<?php echo $cancel_link; ?>">Report problem</a>

