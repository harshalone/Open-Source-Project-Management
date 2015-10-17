 <section id="content">
  <div class="container">
   <div class="btn-group">
        <a href="<? echo site_url('forum');?>" class="btn btn-default waves-effect waves-button">
            <i class="md  md-forum"></i> Forum
        </a>

    </div>
   <br/><br/>   
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
                
                <form role="form" method="post" action="<? echo site_url('forum/add_discussion');?>"> 
                    <div class="form-group fg-line">
                        <h4>Title</h4>
                        <input type="text" name="title" value="<?php echo set_value('title'); ?>" class="input-lg form-control fg-input" id="exampleInputEmail1" placeholder="Enter Title">
                    </div>  
                    <div class="row"> 
                                <div class="col-xs-12">
                                    <div class="fg-line form-group">
                                        <div class="form-group">
			                                <div class="fg-line">
			                                    <textarea name="description" class="form-control" style="resize: vertical;" rows="10" placeholder="Please type some project summary here..."><?php echo set_value('description'); ?></textarea>
			                                </div>
			                            </div>
                                    </div>
                                </div>
                            </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="tne">
                            <i class="input-helper"></i>
                            Agree to our <a href="#">terms and conditions</a> 
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg m-t-10 pull-right">
                        <i class="md-add"></i>
                        Submit</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
                    
                     
             