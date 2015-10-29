 <section id="content">
  <div class="container">
      
    <div class="card">   
            <div class="card-body card-padding">
                <?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?> 
                <?php if (isset($success)) : ?>
			<div class="col-md-12">
				<div class="alert alert-success" role="alert">
					<?= $success ?>
				</div>
			</div>
		<?php endif; ?> 
                
                <form role="form" method="post" action="<?php echo site_url('user/register');?>">
                    <div class="form-group fg-line">
                        <h4>Fullname</h4>
                        <input type="text" name="fullname" value="<?php echo set_value('fullname'); ?>" class="input-lg form-control fg-input" id="exampleInputEmail1" placeholder="Enter your full name here">
                    </div>
                    <div class="form-group fg-line">
                        <h4>Username</h4>
                        <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="input-lg form-control fg-input" id="exampleInputEmail1" placeholder="Enter your full name here">
                    </div>
                    <div class="form-group fg-line">
                        <h4>Email address</h4>
                        <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="input-lg form-control fg-input" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group fg-line">
                        <h4>Password</h4>
                        <input type="password" name="password" class="form-control input-lg" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group fg-line">
                        <h4>Confirm Password</h4>
                        <input type="password" name="password_confirm" class="form-control input-lg" id="exampleInputPassword1" placeholder="Re-Password">
                    </div>
                    
                     <div class="form-group fg-line">
                        <div class="g-recaptcha" data-sitekey="6LcfBQ8TAAAAANRu4rsmkBgKPpapPH6_QxkA3CLf"></div>
                    </div>
                    
                    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="terms" />
                            <i class="input-helper"></i>
                            Agree to the <a href="">Terms and conditions</a>
                            <br/><br/> Already registered <a href="<? echo site_url('user/login');?>">Login here</a> 
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg m-t-10 pull-right">
                        <i class="md-person-outline"></i>
                        Register</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
                    
                     
             