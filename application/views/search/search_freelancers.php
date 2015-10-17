<div class="card">
                      <div class="container">   
                        <div class="card-body card-padding">
                            <form class="row" role="form">
                                <div class="col-sm-5">
                                    <div class="form-group fg-line"> 
                                        <input type="q" class="form-control input-sm" placeholder="Enter keyword">
                                    </div>
                                </div>
                                
                                <div class="col-sm-3">
                                    <div class="form-group fg-line"> 
                                        <input type="skills" class="form-control input-sm" placeholder="ex. wordpress">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group fg-line"> 
                                        <select class="form-control">
                                            <option>Location</option>
                                            <option>UK</option>
                                            <option>Europe</option>
                                            <option>Asia</option>
                                            <option>USA</option>
                                            <option>Middle East</option>
                                        </select>
                                    </div>
                                </div> 
                                
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-lg m-t-5 waves-effect pull-right"><i class="md md-search"></i> Search</button>
                                </div>
                            </form>
                        </div> 
                    </div>
</div>


 <div class="container"> 
         <br/><br/>  <? //print_r($freelancers); ?>
                    <div class="card">
                        <div class="listview lv-bordered lv-lg">
                            <div class="lv-header-alt">
                                <h2 class="lvh-label hidden-xs">Freelancers</h2>
                                 
                            </div>
                             
                            <div class="lv-body"> 
                                     <? foreach($freelancers as $key => $freelancer){ 
	                                     if($freelancer['is_confirmed']==1){
                                     ?> 
                                    <div class="lv-item media">
                                    <div class="pull-left">
                                    <? if($freelancer['pic']){ ?>
				                        <img class="lv-img-lg" src="http://www.googlelance.com/upload/users/profile/<? echo $freelancer['id']; ?>_thumb.jpg" alt="<? echo $freelancer['fullname']; ?>">
				                    <? }else { ?> 
				                        <div class="lv-avatar-lg bgm-blue pull-left"><? echo substr($freelancer['fullname'], 0, 1); ?></div>
				                    <? } ?>
				                    </div>
                                    <a href="<? echo site_url('user/profile');?>/<? echo $freelancer['userid']; ?>">
                                    <div class="media-body">
                                        <div class="lv-title">
                                         <? echo $freelancer['fullname']; ?> 
                                        <small class="lv-small m-height-30"><? echo $freelancer['summary']; ?></small>
                                        </div>
                                        <ul class="lv-attrs pull-right">
                                            <li><? echo $freelancer['created_at']; ?></li>
                                            <? if($freelancer['profession'] !=''){ ?><li><? echo $freelancer['profession']; ?></li> <? } ?>
                                            <? if($freelancer['twitter'] !=''){ ?><li>@<? echo $freelancer['twitter']; ?></li> <? } ?>
                                        </ul> 
                                    </div>
                                    </a>
                                    </div>
                                    <? } } ?>                                  
                            </div>
                        </div>
                        
                        <center><?php  echo $this->pagination->create_links(); ?></center>
                    </div> 