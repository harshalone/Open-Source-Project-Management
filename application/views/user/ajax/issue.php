 <div class="card">
                <div class="card-header ch-alt">
                    <h2>Project Name / <a ><?php echo $issue_details['issueid']; ?></a> / <?php echo $issue_details['title']; ?>
                                    <small>Status:	<?php if($issue_details['status']==0) echo "OPEN"; ?> | Component/s:	None | Labels:	PuB | Affects Version/s:	None | Fix | Version/s:	None | Epic: None | Story Points: #5 | Estimation: 6h</small>
                                    
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
                        <p><?php //print_r($issue_details); ?>
                         <?php echo $issue_details['details']; ?>
                        </p>
                    </blockquote>

                    <blockquote class="m-b-10">
                        <p class="lead">Attachment</p>
                        <ul class="clist clist-angle">
                            <li><span class="badge">PPT</span>Lorem ipsum dolor sit amet</li>
                            <li>Consectetur adipiscing elit</li>
                        </ul>
                    </blockquote>
                    <!--
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
                                        Submit
                                    </button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </blockquote>
                    -->
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
                                <td><span class="badge">open</span>
                                </td>
                                <td>Ducky</td>
                                <td>Edit</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Madeleine</td>
                                <td>Hollaway</td>
                                <td><span class="badge">open</span>
                                </td>
                                <td>Cheese</td>
                                <td>Edit</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
