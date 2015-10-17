 <section id="content">
  <div class="container">
   <?php include(SITE_VIEW_PATH."gadmin/top-menu.php"); ?>
      <br/><br/>
      <? //print_r($project_details[0]['userid']); ?>
   <div class="row"> 
                  <div class="col-md-12"> 
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
                 
                 <form role="form" method="post" action="<? echo site_url('gadmin/editproject');?>/<?php echo $project_details[0]['id']; ?>"> 
                    <div class="form-group fg-line">
                        <h4>Title</h4>
                        <input type="text" name="title" value="<?php echo $project_details[0]['title']; ?>" class="input-lg form-control fg-input" id="exampleInputEmail1" placeholder="Enter Title">
                    </div>  
                    <div class="row">
                                <div class="col-xs-3">
                                    <div class="fg-line form-group">
                                       <input type="text" value="<?php echo $project_details[0]['category']; ?>" name="category" class="input-lg form-control fg-input" /> 
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="fg-line form-group">
                                      <input type="text" value="<?php echo $project_details[0]['skill']; ?>" name="skills" class="input-lg form-control fg-input" /> 
                                            
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="fg-line form-group">
                                      <input type="text" value="<?php echo $project_details[0]['budget']; ?>" name="skills" class="input-lg form-control fg-input" /> 
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="fg-line form-group">
                                        <input type="text" value="<?php echo $project_details[0]['location']; ?>" name="skills" class="input-lg form-control fg-input" /> 
                                    </div>
                                </div>
                                
                                
                                 
                                <div class="col-xs-12">
                                    <div class="fg-line form-group">
                                        <div class="form-group">
			                                <div class="fg-line">
			                                    <textarea name="description" class="form-control" style="resize: vertical;" rows="10" placeholder="Please type some project summary here..."><? echo str_replace('<br />',"\n",$project_details[0]['details']); ?></textarea>
			                                </div>
			                            </div>
                                    </div>
                                </div>
                               
                               <div class="col-xs-12">
                                    <div class="fg-line form-group">
                                        <label class="radio radio-inline m-r-20">
                                            <input <? if($project_details[0]['status'] ==1) echo 'checked="checked"'; ?> type="radio" name="status" value="1">
                                            <i class="input-helper"></i>  
                                            Approve
                                        </label>
                                        <label class="radio radio-inline m-r-20">
                                            <input type="radio" name="status" value="2">
                                            <i class="input-helper"></i>  
                                            Delete
                                        </label>
                                        <label class="radio radio-inline m-r-20">
                                            <input <? if($project_details[0]['status'] ==3) echo 'checked="checked"'; ?> type="radio" name="status" value="3">
                                            <i class="input-helper"></i>  
                                            Need More details
                                        </label>
                                    </div>
                                </div>
                        
                                <div class="col-xs-12">
                                   <div class="fg-line form-group">
                                       <div class="fg-line">
                                           <input type="hidden" name="projectid" value="<? echo $project_details[0]['id']; ?>" /> 
                                           <textarea name="moredetails" class="form-control" style="resize: vertical;" rows="5" placeholder="If you select more details needed and put your comments here it will me emailed to the project owner..."></textarea>
                                        </div>
                                    </div>
                                </div>
                        
                            </div>
                     
                    <button type="submit" class="btn btn-primary btn-lg m-t-10 pull-right">
                        <i class="md-add"></i> 
                        Update</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
      </div>         
	</div>               
                     
             