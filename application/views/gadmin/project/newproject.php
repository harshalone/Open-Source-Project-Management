<section id="main"> 
        
            <section id="content">
                <div class="container"> 
                <?php include(SITE_VIEW_PATH."gadmin/top-menu.php"); ?>
                                  
                  <br/>      
                <? //print_r($new_projects); ?>
                <?php if (isset($success)) : ?>
			<div class="col-md-12">
				<div class="alert alert-success" role="alert">
					<?= $success ?>
				</div>
			</div>
		<?php endif; ?> 
                    <div class="card">
                        <div class="listview lv-bordered lv-lg">
                            <div class="lv-header-alt">
                                <h2 class="lvh-label hidden-xs">Projects</h2>
                                
                                <ul class="lv-actions actions">
                                    
                                    <li class="dropdown">
                                        <a href="" data-toggle="dropdown" aria-expanded="true">
                                            <i class="md md-sort"></i>
                                        </a>
                            
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href="">Last Modified</a>
                                            </li>
                                            <li>
                                                <a href="">Last Edited</a>
                                            </li>
                                            <li>
                                                <a href="">Name</a>
                                            </li>
                                            <li>
                                                <a href="">Date</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="md md-info"></i>
                                        </a>
                                    </li>
                                     
                                </ul>
                            </div>
                            
                            <div class="lv-body">
                                 
                                <? foreach($new_projects as $key=>$new_project){ ?>
                                <div class="lv-item media">
                                   
                                    <div class="media-body">
                                        <div class="lv-title"><? echo $new_project['title']; ?></div>
                                        <small class="lv-small"><? echo $new_project['details']; ?></small>
                                    
                                        <div class="lv-actions actions dropdown">
                                            <a href="" data-toggle="dropdown" aria-expanded="true">
                                                <i class="md md-more-vert"></i>
                                            </a>
                                
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="<? echo site_url('gadmin/editproject');?>/<? echo $new_project['id']; ?>">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <? } ?>
                                 
                                 
                            </div>
                        </div>
                        
                         <center><?php  echo $this->pagination->create_links(); ?></center>
                    </div> 
                    
                   