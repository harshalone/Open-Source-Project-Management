<div class="container"> 
         <br/><br/>       
                    <div class="card">
                        <div class="listview lv-bordered lv-lg">
                            <div class="lv-header-alt">
                                <h2 class="lvh-label hidden-xs">Forum</h2>
                                 
                                <div class="btn-group pull-right">
				                    <a href="<? echo site_url('forum/add_discussion');?>" class="btn btn-default waves-effect">
				                        <i class="md  md-forum"></i> Add Discussion
				                    </a>
				                     
				                </div>
                            </div>
                            
                            <div class="lv-body"> 
                                    <? foreach($discussions as $key => $discussion){ ?> 
                                    <div class="lv-item media">
                                    <a href="<? echo site_url('forum/discussion');?>/<? echo $discussion['id']; ?>">
                                    <div class="media-body">
                                        <div class="lv-title">
                                         <? echo $discussion['title']; ?> 
                                        <small class="lv-small m-height-30"><? echo $discussion['details']; ?></small>
                                        </div>
                                        <ul class="lv-attrs pull-right">
                                            <li>Date Created: <? echo $discussion['created_at']; ?></li>
                                            <li>Reply: <? echo $discussion['reply']; ?></li>
                                            <li>View: <? echo $discussion['views']; ?></li>
                                        </ul> 
                                    </div>
                                    </a>
                                    </div>
                                    <? } ?>
                                
                                 
                            </div>
                        </div>
                        
                        <center><?php  echo $this->pagination->create_links(); ?></center>
                    </div> 