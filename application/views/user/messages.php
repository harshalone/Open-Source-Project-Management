<section id="main"> 
<section id="content">
<div class="container">
<? //include("top-menu.php"); ?> 
                 <div class="block-header">
                        <h2>Message Center</h2> 
                    </div>
                <? //print_r($touser_details); ?>
                    <div class="card m-b-0" id="messages-main">
                        
                        
                        <div class="ms-menu">
                            <div class="ms-block">
                                <div class="ms-user">
                                <? if($user_details[0]['pic']){ ?>
				                        <img class="lv-img-lg" src="http://www.googlelance.com/upload/users/profile/<? echo $user_details[0]['id']; ?>_thumb.jpg" alt="<? echo $user_details[0]['fullname']; ?>">
				                    <? }else { ?> 
				                        <div class="lv-avatar-lg bgm-blue pull-left"><? echo substr($user_details[0]['fullname'], 0, 1); ?></div>
				                    <? } ?> 
                                    <div>Signed in as <br/> <? echo $user_details[0]['fullname']; ?></div>
                                </div>
                            </div>
                            <!--
                            <div class="ms-block">
                                <div class="dropdown" data-animation="flipInX,flipOutX">
                                    <a class="btn btn-primary btn-block" href="" data-toggle="dropdown">Messages <i class="caret m-l-5"></i></a>

                                    <ul class="dropdown-menu dm-icon w-100">
                                        <li><a href=""><i class="md md-mail"></i> Messages</a></li>
                                        <li><a href=""><i class="md md-people"></i> Contacts</a></li>
                                        <li><a href=""><i class="md md-format-list-bulleted"> </i>Todo Lists</a></li>
                                    </ul>
                                </div>
                            </div>
                            -->
                            <div class="listview lv-user m-t-20">
                                <div class="lv-item media active">
                                    <div class="lv-avatar pull-left">
                                        <? if($touser_details[0]['pic']){ ?>
				                        <img class="lv-img-lg" src="http://www.googlelance.com/upload/users/profile/<? echo $touser_details[0]['id']; ?>_thumb.jpg" alt="<? echo $touser_details[0]['fullname']; ?>">
				                    <? }else { ?> 
				                        <div class="lv-avatar-lg bgm-blue pull-left"><? echo substr($touser_details[0]['fullname'], 0, 1); ?></div>
				                    <? } ?> 
                                    </div>
                                    <div class="media-body">
                                       
                                        <div class="lv-title"><? echo $touser_details[0]['fullname']; ?></div>
                                        <div class="lv-small"><? echo $touser_details[0]['profession']; ?></div>
                                    </div>
                                </div>
                             
                                <div class="lv-item media">
                                    <div class="lv-avatar bgm-red pull-left">a</div>
                                    <div class="media-body">
                                        <div class="lv-title">Ann Watkinson</div>
                                        <div class="lv-small">Cum sociis natoque penatibus </div>
                                    </div>
                                </div>
                                 <!--
                                <div class="lv-item media">
                                    <div class="lv-avatar bgm-orange pull-left">m</div>
                                    <div class="media-body">
                                        <div class="lv-title">Marse Walter</div>
                                        <div class="lv-small">Suspendisse sapien ligula</div>
                                    </div>
                                </div>
                                
                                <div class="lv-item media">
                                    <div class="lv-avatar pull-left">
                                        <img src="img/profile-pics/2.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Jeremy Robbins</div>
                                        <div class="lv-small">Phasellus porttitor tellus nec</div>
                                    </div>
                                </div>
                                
                                <div class="lv-item media">
                                    <div class="lv-avatar pull-left">
                                        <img src="img/profile-pics/3.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">Reginald Horace</div>
                                        <div class="lv-small">Quisque consequat arcu eget</div>
                                    </div>
                                </div>
                                
                                <div class="lv-item media">
                                    <div class="lv-avatar bgm-cyan pull-left">s</div>
                                    <div class="media-body">
                                        <div class="lv-title">Shark Henry</div>
                                        <div class="lv-small">Nam lobortis odio et leo maximu</div>
                                    </div>
                                </div>
                                
                                <div class="lv-item media">
                                    <div class="lv-avatar bgm-purple pull-left">p</div>
                                    <div class="media-body">
                                        <div class="lv-title">Paul Van Dack</div>
                                        <div class="lv-small">Nam posuere purus sed velit auctor sodales</div>
                                    </div>
                                </div>
                                
                                <div class="lv-item media">
                                    <div class="lv-avatar pull-left">
                                        <div class="lv-avatar bgm-cyan pull-left">s</div>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">James Anderson</div>
                                        <div class="lv-small">Vivamus imperdiet sagittis quam</div>
                                    </div>
                                </div>
                                
                                <div class="lv-item media">
                                    <div class="lv-avatar pull-left">
                                        <div class="lv-avatar bgm-cyan pull-left">s</div>
                                                                            </div>
                                    <div class="media-body">
                                        <div class="lv-title">Kane Williams</div>
                                        <div class="lv-small">Suspendisse justo nulla luctus nec</div>
                                    </div>
                                </div>
                                -->
 
                             </div>

                            
                        </div>
                        
                        <div class="ms-body">
                            <div class="listview lv-message">
                                <div class="lv-header-alt bgm-white">
                                    <div id="ms-menu-trigger">
                                        <div class="line-wrap">
                                            <div class="line top"></div>
                                            <div class="line center"></div>
                                            <div class="line bottom"></div>
                                        </div>
                                    </div>

                                    <div class="lvh-label hidden-xs">
                                        <div class="lv-avatar pull-left">
                                        <? if($touser_details[0]['pic']){ ?>
				                        <img class="lv-img-lg" src="http://www.googlelance.com/upload/users/profile/<? echo $touser_details[0]['id']; ?>_thumb.jpg" alt="<? echo $touser_details[0]['fullname']; ?>">
				                    <? }else { ?> 
				                        <div class="lv-avatar-lg bgm-blue pull-left"><? echo substr($touser_details[0]['fullname'], 0, 1); ?></div>
				                    <? } ?>  
                                        </div>
                                        <span class="c-black"><? echo $touser_details[0]['fullname']; ?></span> 
                                    </div>
                                    
                                    <ul class="lv-actions actions">
                                        <li>
                                            <a href="">
                                                <i class="md md-delete"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <i class="md md-check"></i>
                                            </a>
                                        </li>
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
                                                    <a href="">Latest</a>
                                                </li>
                                                <li>
                                                    <a href="">Oldest</a>
                                                </li>
                                            </ul>
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
                                                    <a href="">Message Settings</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                
                                <div class="lv-body">    
                                
                                <? for($o=0;$o<5;$o++){ ?>                                
                                    <div class="lv-item media">
                                        <div class="lv-avatar pull-left">
                                            <div class="lv-avatar bgm-cyan pull-left">s</div>
                                        </div>
                                        <div class="media-body">
                                            <div class="ms-item">
                                                Quisque consequat arcu eget odio cursus, ut tempor arcu vestibulum. Etiam ex arcu, porta a urna non, lacinia pellentesque orci. Proin semper sagittis erat, eget condimentum sapien viverra et. Mauris volutpat magna nibh, et condimentum est rutrum a. Nunc sed turpis mi. In eu massa a sem pulvinar lobortis.
                                            </div>
                                            <small class="ms-date"><i class="md md-access-time"></i> 20/02/2015 at 09:00</small>
                                        </div>
                                    </div>
                                    
                                    <div class="lv-item media right">
                                        <div class="lv-avatar pull-right">
                                            <div class="lv-avatar bgm-cyan pull-right">s</div>
                                        </div>
                                        <div class="media-body">
                                            <div class="ms-item">
                                                Mauris volutpat magna nibh, et condimentum est rutrum a. Nunc sed turpis mi. In eu massa a sem pulvinar lobortis.
                                            </div>
                                            <small class="ms-date"><i class="md md-access-time"></i> 20/02/2015 at 09:30</small>
                                        </div>
                                    </div>
                                  <? } ?>  
                                     
                                </div>
                                
                                <div class="lv-footer ms-reply">
                                    <textarea placeholder="What's on your mind..."></textarea>
                                    
                                    <button><i class="md md-send"></i></button>
                                </div>
                            </div>
                        </div></div><br/>
                    