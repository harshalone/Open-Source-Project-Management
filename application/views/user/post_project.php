 <section id="content">
  <div class="container">
  
  <? include("top-menu.php"); ?>
   <br/><br/>  
   <div class="row"> 
                  <div class="col-md-8"> 
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
                
                <form role="form" method="post" action="<? echo site_url('dashboard/post_project');?>"> 
                    <div class="form-group fg-line">
                        <h4>Title</h4>
                        <input type="text" name="title" value="<?php echo set_value('title'); ?>" class="input-lg form-control fg-input" id="exampleInputEmail1" placeholder="Enter Title">
                    </div>  
                    <div class="row">
                                <div class="col-xs-3">
                                    <div class="fg-line form-group">
                                        <select name="category" class="form-control">
                                                    <option>Category</option>
                                                    <? foreach($categories as $key=>$catagory){ ?>
                                                    <option value="<? echo $catagory['name']; ?>">
                                                     <? echo $catagory['name']; ?>
                                                     </option>
                                                    <? }  ?> 
                                                </select>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="fg-line form-group">
                                         
                                     <select name="location" class="form-control" data-placeholder="Choose a Country...">
                                       <option>Location</option>
                                       <? foreach($locations as $key=>$location){ ?>
                                         <option value="<? echo $location['code']; ?>"><? echo $location['name']; ?></option>
                                        <? }  ?>
                                     </select>
                                            
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="fg-line form-group">
                                                 <select name="budget" class="form-control">
                                                    <option>Budget</option>
                                                    <option value="199">199</option>
                                                    <option value="299">299</option>
                                                    <option value="599">599</option>
                                                    <option value="999">999</option>
                                                    <option value="1599">1599</option>
                                                    <option value="1999">1999</option>
                                                    <option value="ongoing">ongoing</option>
                                                     
                                                </select>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="fg-line form-group">
                                        <input type="text" value="<?php echo set_value('skills'); ?>" name="skills" class="input-lg form-control fg-input" placeholder="ex. wordpress, php, drupal"> 
                                    </div>
                                </div>
                                
                                
                                 
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
      </div>
                             
                  <div class="col-md-4 hidden-sm"> 
                           <div class="card">
                                <div class="card-header ch-alt">
                                    <h2>Project Example <small>How to define a project requirement...</small>        
                                    </h2>
                                    
							    </div> 
	                            <div class="card-body card-padding">
	                          

								<strong>Project Format</strong>
								
								The format of a good Project should look something like this: <br/>
								
								<strong>Opening</strong> - Title of the project<br/>
								
								<strong>What you want to be accomplished</strong> - You need to be descriptive about what exactly you want to achieve once this job is finished by a provider…<br/>
								
								<strong>Your Budget</strong> - What you are willing to pay for this job<br/>
								
								<strong>What are the similar examples/websites you like similar to your job</strong> - Its always a good idea to provide some reference to other projects or websites or any kind of work you think related to your job so that provider can relate to it and understand it better…<br/>
								
								<strong>Ask a question</strong> – For clarification, may I ask, ‘what is your experience in similar field?<br/>
								
								<strong>Call to action</strong> – You can ask providers to put a code on TOP of their proposal so that you know its not a copy paste proposal.
	                              
	                            </div>
                           </div>
                           
                        </div>        
                            
	</div>               
                     
             