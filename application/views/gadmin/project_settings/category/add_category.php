<section id="main"> 
        
            <section id="content">
                <div class="container"> 
                <?php include(SITE_VIEW_PATH."gadmin/top-menu.php"); ?>
                                  
                  <div class="clearfix"></div>             
                <br/><br/>
                   
                <?php include(SITE_VIEW_PATH."gadmin/sub-menu.php"); ?>
                
                   <div class="clearfix"></div> 
                <br/><br/>
                      
                    
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
                             
                            <form class="row" method="post" action="<? echo site_url('gadmin/add_category');?>" role="form">
                                <div class="col-sm-10">
                                    <div class="form-group fg-line"> 
                                        <label class="sr-only" for="exampleInputEmail2">Category Name</label>
                                        <input type="text" value="<? if($actionTrigger != 'add') { echo $category_detail['name']; } ?>" name="category" class="form-control input-lg" id="exampleInputEmail2" placeholder="Category Name">
                                       <input type="hidden" value="<? if($actionTrigger != 'add') { echo $category_detail['id'];} ?>" name="id" >
                                    </div>
                                </div> 
                                
                                <div class="col-sm-2"> 
                                    <button name="action" value="<? echo $actionTrigger; ?>" type="submit" class="btn btn-primary btn-lg m-t-5 waves-effect"><? echo ucfirst($actionTrigger); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                   <div class="card">
                        <div class="listview lv-bordered lv-lg">
                            <div class="lv-header-alt">
                                <h2 class="lvh-label hidden-xs">Categories</h2>
                                
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
                                <? foreach($categories as $key=>$catagory){ ?>
                                <div class="lv-item media">
                                    <div class="checkbox pull-left">
                                        <label>
                                            <input type="checkbox" value="">
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title"><? echo $catagory['name']; ?></div>
                                        
                                        <div class="lv-actions actions dropdown">
                                            <a href="" data-toggle="dropdown" aria-expanded="true">
                                                <i class="md md-more-vert"></i>
                                            </a>
                                
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="<? echo site_url('gadmin/add_category');?>?action=update&id=<? echo $catagory['id']; ?>">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="<? echo site_url('gadmin/add_category');?>?action=delete&id=<? echo $catagory['id']; ?>">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <? }  ?>
                                 
                                 
                                 
                            </div>
                        </div>
                        
                         
                    </div>   
             