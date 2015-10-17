<div class="card">
                      <div class="container">   
                        <div class="card-body card-padding">
                            <form class="row" role="form">
                                <div class="col-sm-5">
                                    <div class="form-group fg-line"> 
                                        <input type="q" class="form-control input-sm" id="exampleInputEmail2" placeholder="Enter keyword">
                                    </div>
                                </div>
                                
                                <div class="col-sm-3">
                                    <div class="form-group fg-line"> 
                                        <select class="form-control">
                                            <option>Category</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                            <option>Option 4</option>
                                            <option>Option 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group fg-line"> 
                                        <select class="form-control">
                                            <option>Budget</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                            <option>Option 4</option>
                                            <option>Option 5</option>
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
         <br/><br/>       
                    <div class="card">
                        <div class="listview lv-bordered lv-lg">
                            <div class="lv-header-alt">
                                <h2 class="lvh-label hidden-xs">Projects</h2>
                                 
                                <div class="btn-group pull-right">
				                    <a href="<? echo site_url('dashboard/post_project');?>" class="btn btn-default waves-effect">
				                        <i class="md md-play-install"></i> Add Project
				                    </a>
				                     
				                </div>
                            </div>
                            
                            <div class="lv-body"> 
                                     <? foreach($projects as $key => $project){ ?> 
                                    <div class="lv-item media">
                                    <a href="<? echo site_url('search/project');?>/<? echo $project['id']; ?>">
                                    <div class="media-body">
                                        <div class="lv-title">
                                         <? echo $project['title']; ?> 
                                        <small class="lv-small m-height-30"><? echo $project['details']; ?></small>
                                        </div>
                                        <ul class="lv-attrs pull-right">
                                            <li><? echo $project['created_at']; ?></li>
                                            <li><? echo $project['budget']; ?></li>
                                            <li><? echo $project['location']; ?></li>
                                        </ul> 
                                    </div>
                                    </a>
                                    </div>
                                    <? } ?>                                  
                            </div>
                        </div>
                        
                        <center><?php  echo $this->pagination->create_links(); ?></center>
                    </div> 