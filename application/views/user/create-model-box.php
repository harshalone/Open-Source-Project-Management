<div class="modal fade" id="preventClick" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bgm-blue">
                    <h4 class="modal-title" style="color:#fff;">Create Issue</h4>
                </div>
                
                <div id="responce" class="alert alert-danger" style="display:none;" role="alert"></div>
                <div class="modal-body">
                    <form class="ajaxform" role="form" method="post" action="<?php echo site_url('dashboard/create_issue');?>">
                       <div class="row">
                            <div class="col-xs-3">
                                <h4 class="pull-right">Project</h4>
                            </div>
                            <div class="col-xs-9">
                                <select name="category" class="form-control">
                                        <option>Category</option>
                                        <option value="Web development">
                                            Web development</option>
                                        <option value="Web Design">
                                            Web Design</option>
                                        <option value="Writing &amp; Translation">
                                            Writing &amp; Translation</option>
                                        <option value="Sales &amp; Marketing">
                                            Sales &amp; Marketing</option>
                                        <option value="Admin Support">
                                            Admin Support</option>
                                        <option value="Data Entry">
                                            Data Entry</option>
                                        <option value="Programming">
                                            Programming</option>
                                        <option value="Other">
                                            Other</option> 
                                    </select>
                            </div>
                         </div>
                        
                        
                        <div class="row">
                            <div class="col-xs-3">
                                <h4 class="pull-right">Issue type</h4>
                            </div>
                            <div class="col-xs-9">
                                <select name="issuetype" class="form-control">
                                        <option value="">Select one</option>
                                        <option value="100">
                                            Bug</option>
                                        <option value="101">
                                            Story</option>
                                        <option value="102">
                                            Technical Story</option> 
                                    </select>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-xs-3">
                                <h4 class="pull-right">Title</h4>
                            </div>
                            <div class="col-xs-9">
                                <input type="text" name="title" value="" class="input-lg form-control fg-input" placeholder="Enter Title">
                            </div>
                         </div> 
                        
                        <div class="row">
                            <div class="col-xs-3">
                                <h4 class="pull-right">Description</h4>
                            </div>
                            <div class="col-xs-9">
                                <textarea name="description" class="form-control" style="resize: vertical;" rows="10" placeholder="Please type some project summary here..."></textarea>
                            </div>
                         </div>  
                         
                        <div class="clearfix"></div>
                   
                </div>
                <div class="modal-footer">
                    <button type="submit" type="button" class="btn btn-link">Save changes</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>