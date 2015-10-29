<div class="modal fade" id="preventClick" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bgm-blue">
                    <h4 class="modal-title" style="color:#fff;">Create Issue</h4>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="/dashboard/create_issue">
                       <div class="row">
                            <div class="col-xs-3">
                                <h4 class="pull-right">Project*</h4>
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
                                <h4 class="pull-right">Title</h4>
                            </div>
                            <div class="col-xs-9">
                                <input type="text" name="title" value="" class="input-lg form-control fg-input" id="exampleInputEmail1" placeholder="Enter Title">
                            </div>
                         </div>
                        <div class="row">
                            <div class="col-xs-3">
                                <h4 class="pull-right">Issue type</h4>
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
                                <div class="fg-line form-group">
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
                            <div class="col-xs-3">
                                <div class="fg-line form-group">

                                    <select name="location" class="form-control" data-placeholder="Choose a Country...">
                                        <option>Location</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option> 
                                    </select>

                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="fg-line form-group">
                                    <select name="budget" class="form-control">
                                        <option>Budget</option>
                                        <option value="199">199</option>
                                        <option value="299">299</option>
                                        <option value="599">599</option>
                                        <option value="999">999</option>
                                        <option value="1599">1599</option>
                                        <option value="1999">1999</option>
                                        <option value="ongoing">ongoing</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="fg-line form-group">
                                    <input type="text" value="" name="skills" class="input-lg form-control fg-input" placeholder="ex. wordpress, php, drupal">
                                </div>
                            </div>



                            <div class="col-xs-12">
                                <div class="fg-line form-group">
                                    <div class="form-group">
                                        <div class="fg-line">
                                            <textarea name="description" class="form-control" style="resize: vertical;" rows="10" placeholder="Please type some project summary here..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                        <div class="clearfix"></div>
                   </div>  
                </div>
                <div class="modal-footer">
                    <button type="submit" type="button" class="btn btn-link">Save changes</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>