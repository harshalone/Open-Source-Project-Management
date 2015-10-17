<div class="container"> 
<br/><br/>
	<div class="row"> 
                  <div class="col-md-8">
                     <div class="card">
                                <div class="card-header ch-alt">
                                 <a href="<? echo site_url('dashboard/post_project');?>" class="btn btn-default waves-effect pull-right">
						                        <i class="md md-play-install"></i> Post Similar Project
						                    </a>
                                    <h2><? echo $project_details['0']['title']; ?> <small>
                                    <div class="highlight" ><? echo $project_details['0']['category']; ?> | &#163;<? echo $project_details['0']['budget']; ?> | <? echo $project_details['0']['skill']; ?></div>
                                    </small>        
                                    </h2>
                                    
							    </div>     
                                
                                <div class="card-body card-padding">
                                    <p>
                                    <? echo $project_details['0']['details']; ?>
	                               
                                    </p>
                                    <small class="pull-right bottom--30"><? echo $project_details['0']['created_at']; ?> </small>         
                                </div>
                                
                      </div>
                      
                      <div class="card"> 
				        <div class="card-body card-padding"> 
				            
				            <div class="media-demo">
				                <div class="media">
				                    <div class="pull-left">
				                        <a href="#">
				                             <img src="http://www.googlelance.com/upload/users/profile/avatar.jpg" alt="">                        </a>
				                    </div>
				                    <div class="media-body">
				                        <h4 class="media-heading">kansagous</h4>
				                         How to create an email Account 14                         
				                    </div>
				                    <small class="pull-right bottom--30">2015-08-11 07:41:21</small>
				                </div>
				               
				                                                     
				                </div>
				            </div>
				        </div>
				        
				        <? if($action =='icandoit'){ ?> 
				        <form id="bidform" role="form" method="post" action="<? echo site_url('search/project');?>/<? echo $project_details['0']['id']; ?>?action=icandoit#bidform"> 
				        <?php if (validation_errors()) : ?>
				        <div class="row"> 
						<div class="col-md-12">
							<div class="alert alert-danger" role="alert">
								<?= validation_errors() ?>
							</div>
						</div>
						</div>
					<?php endif; ?>
					<?php if (isset($error)) : ?>
					<div class="row"> 
						<div class="col-md-12">
							<div class="alert alert-danger" role="alert">
								<?= $error ?>
							</div>
						</div>
						</div>
					<?php endif; ?> 
			                <?php if (isset($success)) : ?>
			                <div class="row"> 
							<div class="col-md-12">
								<div class="alert alert-success" role="alert">
									<?= $success ?>
								</div>
						   </div>
						</div>
					<?php endif; ?>
				        <div class="card"> 
				        <div class="card-header ch-alt">
                                <div class="row"> 
                                <div class="col-xs-6">
                                    <div class="fg-line form-group">
                                        <label for="exampleInputEmail1">Bid</label>
                                        <input type="number" class="form-control input-lg" placeholder="&nbsp;&nbsp;ex. 500">
                                    </div> 
                                </div>
                                <div class="col-xs-6">
                                    <div class="fg-line form-group">
                                        <label for="exampleInputEmail1">Timeframe</label>
                                        <input type="text" class="form-control input-lg" placeholder="&nbsp;&nbsp;ex. 10 working days">
                                    </div>
                                </div> 
                            </div>  
                                    
					    </div> 
				        <div class="card-body card-padding"> 
				        
				        
				            <div class="fg-line form-group">
				            <textarea name="description" class="form-control" style="resize: vertical;" rows="6" placeholder="Please type some proposal here..."></textarea>
				            </div>
				            <button type="submit" class="btn btn-primary btn-lg m-t-10 waves-effect pull-right">Submit</button>
				            <div class="clearfix"></div>
				            </div>
				        </div>
				        </form>
				        <? } ?>
				                      
                  </div>
                             
                  <div class="col-md-4 hidden-sm">
                  
                      <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>Heads up! Only 20 proposals are allowed on a normal project.
                            </div>
                            <div class="card">
	                            <div class="card-body card-padding">
	                             <a href="?action=icandoit#bidform" class="btn btn-success btn-block waves-effect">
	                             <i class="md md-thumb-up"></i>  
	                              I can do it!
	                              </a>
	                            </div>
                           </div>
                           <div class="card">
                                <div class="card-header ch-alt">
                                    <h2>Proposal Example <small>How to write proposal and bid...</small>        
                                    </h2>
                                    
							    </div> 
	                            <div class="card-body card-padding">
	                          

								<strong>Proposal Format</strong>
								
								The format of a good proposal should look something like this: <br/>
								
								<strong>Opening</strong> - Hello, (include buyer's name), I am Sarah Porche<br/>
								
								<strong>Why you are interesting in this job</strong> - Your job attracted my attention because it is compatible with my freelancing interests and experience…<br/>
								
								<strong>Offer Value</strong> - For your fee, you will receive my undivided attention to this project.  It will be completed to your specifications and delivered when you need it.<br/>
								
								<strong>How you have helped other buyers with similar projects</strong> - The nature of this project is very similar to previous work I have completed.  They found my work exemplary and…<br/>
								
								<strong>Ask a question</strong> – For clarification, may I ask, ‘Does your audience respond better to a general or more technical approach?<br/>
								
								<strong>Call to action</strong> – I hope to hear from you soon so we can start working on this as soon as possible.
	                              
	                            </div>
                           </div>
                           
                        </div>        
                            
	</div> 