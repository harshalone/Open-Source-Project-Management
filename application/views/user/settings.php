 

   <div class="container"><br/><br/>
                     
               <? //include("top-menu.php"); ?>  
                    <div class="block-header">
                    <br/>
                        <h2><? echo $user_details[0]['fullname']; ?>  <small><? echo $user_details[0]['profession']; ?>, <? echo $user_details[0]['address']; ?></small></h2>
                        
                        <ul class="actions m-t-20 hidden-xs">
                            <li class="dropdown">
                                <a href="" data-toggle="dropdown" aria-expanded="false">
                                    <i class="md md-more-vert"></i>
                                </a>
                    
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Privacy Settings</a>
                                    </li>
                                    <li>
                                        <a href="">Account Settings</a>
                                    </li>
                                    <li>
                                        <a href="">Other Settings</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div> 
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
						 
                    <div class="card" id="profile-main">
                        <div class="pm-overview c-overflow" tabindex="5" style="overflow: hidden; outline: none;">
                            <div class="pmo-pic">
                                <div class="p-relative"> 
                                    <? if ($user_details[0]['pic']){ ?>
							         <img class="thumbnail profile_thumb" src="<? echo base_url().'upload/users/profile/'.$userid.'_profile_thumb.jpg'; ?>?n=<? echo rand(31, 4000); ?>" alt="">  
							         <? }else{ ?>
							         <img class="img-responsive profile_thumb"  src="/upload/users/placeholder-user-photo.png" alt="">   
							         <? } ?>
                                    <div class="pmop-message">
                                        <a data-toggle="dropdown" href="" class="btn bgm-white btn-float z-depth-1 waves-effect">
                                            <i class="md md-message"></i>
                                        </a>
                                        
                                         
                                    </div>
                                    
                                    <a href="<? echo site_url('dashboard/profilepicture');?>" class="pmop-edit">
                                        <i class="md md-camera-alt"></i> <span class="hidden-xs">Update Profile Picture</span>
                                    </a>
                                </div>
                                
                                
                                <div class="pmo-stat">
                                    <h2 class="m-0 c-white">1562</h2>
                                    Total job done
                                </div>
                            </div>
                            
                            <div class="pmo-block pmo-contact hidden-xs">
                                <h2>Contact</h2>
                                
                                <ul>
                                    <li><i class="md md-phone"></i> <? echo $user_details[0]['contact']; ?></li>
                                    <li><i class="md md-email"></i> <? echo $user_details[0]['s_email']; ?></li>
                                    <li><i class="md md-skype"></i> skype: <? echo $user_details[0]['skype']; ?></li>
                                    <li><i class="md md-twitter"></i> @<? echo $user_details[0]['twitter']; ?></li>
                                    <li>
                                        <i class="md md-location-on"></i>
                                        <address class="m-b-0">
                                            <? echo $user_details[0]['address']; ?>
                                        </address>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="pmo-block pmo-items hidden-xs">
                                <h2>Feedbacks</h2>
                                
                                <div class="pmob-body">
                                    <div class="row">
                                    <? for($i=0;$i<8;$i++){ ?>
                                        <a href="" class="col-xs-2">
                                            <img class="img-circle" src="http://www.googlelance.com/upload/users/profile/avatar.jpg" alt="">
                                        </a>    
                                    <? } ?>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="pm-body clearfix">
                        <form method="post" action="<? echo site_url('dashboard/settings');?>">
                         
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="md md-equalizer m-r-5"></i> Summary</h2>
                                    
                                     
                                </div>
                                <div class="pmbb-body p-l-30">
                                    
                                    <div class="pmbb-view">
                                        <div class="fg-line">
                                            <textarea name="summary" class="form-control" style="resize: vertical;"  rows="8" placeholder="Summary..."><? echo $user_details[0]['summary']; ?></textarea>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="md md-person m-r-5"></i> Basic Information</h2>
                                    
                                     
                                </div>
                                <div class="pmbb-body p-l-30">
                                    
                                    
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Full Name (official)</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input name="fullname_official" type="text" value="<? echo $user_details[0]['fullname_official']; ?>" class="form-control" placeholder="eg. Jon Hollaway">
                                                    
                                                </div>
                                                <small>this is your official full name you use in your bank account or paypal account</small>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Gender</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <select name="gender" class="form-control">
                                                        <option value="1" <? if($user_details[0]['gender'] == 1) echo "selected"; ?> >Male</option>
                                                        <option value="0" <? if($user_details[0]['gender'] == 0) echo "selected"; ?> >Female</option>
                                                        <option value="2" <? if($user_details[0]['gender'] == 2) echo "selected"; ?> >Other</option>
                                                    </select>
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Date of Birth</dt>
                                            <dd>
                                                <div class="dtp-container dropdown fg-line">
                                                    <input name="dob" type="text" value="<? echo $user_details[0]['dob']; ?>" class="form-control" data-toggle="dropdown" placeholder="yyyy-mm-dd">
                                                </div>
                                                <small>if you put any other format than this: yyyy-mm-dd than your Date of Birth will be set to null</small>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Profession</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="profession" value="<? echo $user_details[0]['profession']; ?>" class="form-control" placeholder="eg. Mallinda Hollaway">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                         
                                    </div>
                                </div>
                            </div>
                       
                        
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="md md-phone m-r-5"></i> Contact Information</h2>
                                    
                                     
                                </div>
                                <div class="pmbb-body p-l-30">
                                    
                                    
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Address</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="address" value="<? echo $user_details[0]['address']; ?>" class="form-control" placeholder="10098 ABC Towers, Dubai Silicon Oasis, Dubai, United Arab Emirates">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Contact no.</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="contact" value="<? echo $user_details[0]['contact']; ?>" class="form-control" placeholder="eg. 0044712345678 9">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Secondary Email Address</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input name="semail" type="email" value="<? echo $user_details[0]['s_email']; ?>" class="form-control" placeholder="eg. malinda.h@gmail.com">
                                                </div>
                                            </dd>
                                        </dl> 
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Skype</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="skype" value="<? echo $user_details[0]['skype']; ?>" class="form-control" placeholder="eg. malinda.hollaway">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Twitter</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="twitter" value="<? echo $user_details[0]['twitter']; ?>" class="form-control" placeholder="eg. @malinda">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Facebook</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="facebook" value="<? echo $user_details[0]['facebook']; ?>" class="form-control" placeholder="eg. @malinda">
                                                </div>
                                            </dd>
                                        </dl>
                                        <div class="m-t-30 pull-right"> 
                                            <input type="submit" class="btn btn-primary waves-effect" value="Save" /> 
                                            
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 