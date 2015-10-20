<section id="main"> 
        
   <div class="block-header">
                <br/>
                        <h2 class="pull-left">Project Title here</h2>
                    
                         <div class="btn-group pull-right">
                                <button type="button" class="btn btn-primary waves-effect">Backlog</button>
                                <button type="button" class="btn btn-default waves-effect">Active Sprints</button>
                                <button type="button" class="btn btn-default waves-effect">Reports</button>
                            </div>
                    
                    </div>
           
                
                
            <section id="content"> 
                <div id="" class="col-sm-6">
                    <div class="card">
                        <div class="listview lv-bordered lv-lg">
                            <div class="lv-header-alt">
                                <h2 class="lvh-label hidden-xs">Backlog</h2>
                                
                                <ul class="lv-actions actions">
                                    <li>
                                        <a href="">
                                            <i class="md md-access-time"></i>
                                        </a>
                                    </li>
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
                                    <li class="dropdown">
                                        <a href="" data-toggle="dropdown" aria-expanded="true">
                                            <i class="md md-more-vert"></i>
                                        </a>
                            
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href="">Refresh</a>
                                            </li>
                                            <li>
                                                <a href="">Listview Settings</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="lv-body">
                                <?php for($i=0;$i<10;$i++){ ?>
                                 
                                <div class="lv-item media">
                                    <div class="checkbox pull-left">
                                        <span class="badge">119</span>
                                        <label> 
                                            <button class="btn btn-xs waves-effect"><i class="md md-bug-report"></i></button>
                                            
                                        </label>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Create a new feature</div>
                                        
                                        <div class="lv-actions actions dropdown">
                                            <a href="" data-toggle="dropdown" aria-expanded="true">
                                                <i class="md md-more-vert"></i>
                                            </a>
                                
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    
                    </div>
                    
                     
                </div>  
                <div id="" class="col-sm-6">
                     
                    <div class="card">
                            <div class="card-header ch-alt">
                                <h2>Project Name / <a >119</a> / Customers should be able to leave feedback
                                    <small>Status:	OPEN | Component/s:	None | Labels:	PuB | Affects Version/s:	None | Fix | Version/s:	None | Epic: None | Story Points: #5 | Estimation: 6h</small>
                                    
                                </h2>
                                <div class="lv-header-alt">
                                
                                <ul class="lv-actions actions"> 
                                    <li class="dropdown">
                                        <a href="" data-toggle="dropdown" aria-expanded="true">
                                            <i class="md md-more-vert"></i>
                                        </a>
                            
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href="">Edit</a>
                                            </li>
                                            <li>
                                                <a href="">Assign</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                                
                            </div>

                            <div class="card-body card-padding">
                                 
                                <blockquote class="m-b-10">
                                    <p class="lead">Description</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                </blockquote>
                                
                                <blockquote class="m-b-10">
                                    <p class="lead">Attachment</p>
                                    <ul class="clist clist-angle">
                                        <li><span class="badge">PPT</span>Lorem ipsum dolor sit amet</li>
                                        <li>Consectetur adipiscing elit</li> 
                                    </ul>
                                </blockquote> 
                                <blockquote class="m-b-10">
                                    <p class="lead">Comments</p>
                                     <form role="form" method="post" action="#"> 

                                                <div class="row"> 
                                                            <div class="col-xs-12">
                                                                <div class="fg-line form-group">
                                                                    <div class="form-group">
                                                                        <div class="fg-line">
                                                                            <textarea name="reply" class="form-control" style="resize: vertical;" rows="5" placeholder="Please type your reply here..."></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary btn-sm m-t-10 pull-right waves-effect waves-button">
                                                    <i class="md-add"></i>
                                                    Submit</button>
                                                            </div>
                                                        </div> 
                                                <div class="clearfix"></div>
                                            </form> 
                                </blockquote> 
                                <p class="lead">Tasks</p>
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Issue Key</th>
                                        <th>Summary</th>
                                        <th>Status</th>
                                        <th>Estimation</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Alexandra</td>
                                        <td>Christopher</td>
                                        <td><span class="badge">open</span></td>
                                        <td>Ducky</td>
                                        <td>Edit</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Madeleine</td>
                                        <td>Hollaway</td>
                                        <td><span class="badge">open</span></td>
                                        <td>Cheese</td>
                                        <td>Edit</td>
                                    </tr> 
                                </tbody>
                            </table>
 
                            </div>
                        </div>
                 
                </div>
            </section>