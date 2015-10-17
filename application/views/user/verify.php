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
                
                <form role="form" method="post" action="<? echo site_url('user/verify');?>">
                    <div class="form-group fg-line">
                        <h4>Code</h4>
                        <input type="text" name="code" class="input-lg form-control fg-input" placeholder="Copy paste the code here">
                    </div>
                    <div class="form-group fg-line">
                        <h4>Email address</h4>
                        <input type="email" name="email" class="input-lg form-control fg-input" placeholder="Enter email">
                    </div>
                    

                    <button type="submit" class="btn btn-primary btn-lg m-t-10 pull-right">
                        <i class="md-check"></i>
                        Verify</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
                    
                     
             