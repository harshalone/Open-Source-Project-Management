 

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
                                        <a href="<? echo site_url('dashboard/messages');?>/<? echo $user_details[0]['userid']; ?>" class="btn bgm-white btn-float z-depth-1 waves-effect">
                                            <i class="md md-message"></i>
                                        </a>
                                        
                                         
                                    </div>
                                     
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
                                        <? echo $user_details[0]['summary']; ?>
                                    </div> 
                                </div>
                            </div>
                            
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-account m-r-5"></i> Basic Information</h2>
                                    
                                     
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>Full Name (official)</dt>
                                            <dd><? echo $user_details[0]['fullname_official']; ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Gender</dt>
                                            <dd>
                                            <? if($user_details[0]['gender'] == 1) echo "Male"; ?>  
                                            <? if($user_details[0]['gender'] == 0) echo "Female"; ?> 
                                            <? if($user_details[0]['gender'] == 2) echo "Other"; ?> 
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Joined since</dt>
                                            <dd><? echo $user_details[0]['created_at']; ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Profession</dt>
                                            <dd><? echo $user_details[0]['profession']; ?></dd>
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
                                            <dt >Address</dt>
                                            <dd>
                                              <? echo $user_details[0]['address']; ?> 
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt >Contact no.</dt>
                                            <dd>
                                              <? echo $user_details[0]['contact']; ?> 
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt >Secondary Email Address</dt>
                                            <dd>
                                             <? echo $user_details[0]['s_email']; ?>
                                            </dd>
                                        </dl> 
                                        <dl class="dl-horizontal">
                                            <dt >Skype</dt>
                                            <dd>
                                            <? echo $user_details[0]['skype']; ?> 
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt >Twitter</dt>
                                            <dd>
                                             <? echo $user_details[0]['twitter']; ?>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt >Facebook</dt>
                                            <dd>
                                              <? echo $user_details[0]['facebook']; ?>
                                            </dd>
                                        </dl> 
                                        <div class="clearfix"></div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 