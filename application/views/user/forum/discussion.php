<div class="container"> 
<br/><br/>
<div class="btn-group">
        <a href="<? echo site_url('forum');?>" class="btn btn-default waves-effect waves-button">
            <i class="md  md-forum"></i> Forum
        </a>

    </div>
    <br/><br/>
	<div class="card"> 
        <div class="card-body card-padding"> 
            
            <div class="media-demo">
                <div class="media">
                    <div class="pull-left">
                        <a href="#">
                             <? echo img('upload/users/profile/avatar.jpg');?>
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><? echo $discussion[0]['title']; ?></h4>
                         <? echo $discussion[0]['details']; ?>
                    </div>
                </div>
               
                                                     
                </div>
            </div>
        </div> 
        
        <? foreach($reply as $key => $rep){ ?> 
        <div class="card"> 
        <div class="card-body card-padding"> 
            
            <div class="media-demo">
                <div class="media">
                    <div class="pull-left">
                        <a href="#">
                             <? echo img('upload/users/profile/avatar.jpg');?>
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><? echo $rep['username']; ?></h4>
                         <? echo $rep['reply']; ?>
                         
                    </div>
                    <small class="pull-right bottom--30"><? echo $rep['created_at']; ?></small>
                </div>
               
                                                     
                </div>
            </div>
        </div> 
        <? } ?>
        
        <center><?php  echo $this->pagination->create_links(); ?></center>
        
        <? if ($logged_in == TRUE) { ?>
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
                
                <form role="form" method="post" action="<? echo site_url('forum/discussion');?>/<? echo $discussionid; ?>"> 
                      
                    <div class="row"> 
                                <div class="col-xs-12">
                                    <div class="fg-line form-group">
                                        <div class="form-group">
			                                <div class="fg-line">
			                                    <textarea name="reply" class="form-control" style="resize: vertical;" rows="5" placeholder="Please type your reply here..."></textarea>
			                                </div>
			                            </div>
                                    </div>
                                </div>
                            </div>
                     
                    <button type="submit" class="btn btn-primary btn-lg m-t-10 pull-right">
                        <i class="md-add"></i>
                        Submit</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        <? } ?>
                        