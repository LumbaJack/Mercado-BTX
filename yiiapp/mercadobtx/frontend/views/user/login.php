<?php
/**
 * @var UserController $this
 * @var CActiveDataProvider $dataProvider
 */
?>
<style>

body{
    	background-color: #eceef3;
	}

	    .vertical-offset-100{
	        padding-top:100px;
		}
</style>
<script>
$(document).ready(function(){
  $(document).mousemove(function(e){
     TweenLite.to($('body'), 
        .5, 
        { css: 
            {
                'background-position':parseInt(event.pageX/8) + "px "+parseInt(event.pageY/12)+"px, "+parseInt(event.pageX/15)+"px "+parseInt(event.pageY/15)+"px, "+parseInt(event.pageX/30)+"px "+parseInt(event.pageY/30)+"px"
            }
        });
  });
});
</script>


	

<section id="authenty_preview" style="height: 643px;">
<section id="signin_main" class="authenty signin-main" style="height: 643px;">
<div class="section-content">
<div class="wrap">
<div class="container">
<div class="form-wrap">
		<div class="row">
		  <div class="title animated fadeInDown" data-animation="fadeInDown" data-animation-delay=".8s" style="">
			  <h2 class="short">Ingresar a Mi cuenta</h2>
		  </div>
			<div id="form_1" data-animation="bounceIn" class="animated bounceIn">
				<div class="form-header">
				  <i class="fa fa-user"></i>
			  </div>
			  <div class="form-main">
				  <form>
					  <div class="form-group">
						<input type="text" id="un_1" class="form-control" placeholder="E-mail" required="required">
							<input type="password" id="pw_1" class="form-control" placeholder="Password" required="required">
					  <center><a href="/users/" class="btn btn-lg btn-primary"><span id="registerButton">Ingresar</span></a></center>
					  </div>

				  </form>	
			  </div>
				<div class="form-footer">
					<div class="row">
						<div class="col-xs-7">
							<i class="fa fa-unlock-alt"></i>
							<a href="recovery.php" id="forgot_from_1">&iquest;Olvid&oacute; su contrase&ntilde;a?</a>
						</div>
						<div class="col-xs-5">
							<i class="fa fa-check"></i>
							<a href="signup.php" id="signup_from_1">Registrar1</a>
						</div>
					</div>
				</div>		
		  </div>
		</div>
	</div>
</div>
</div>
</div>
</section>
</section>
