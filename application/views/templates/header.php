<body>
    <header id="header"> 
        <ul class="header-inner">
            <li class="logo">
                <a href="<?php echo site_url(); ?>"> &nbsp; <strong>JD</strong></a>
            </li>
            <?php if ($this->session->logged_in == TRUE){ ?>
            <li >
                <ul class="top-menu"> 
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="top-menu-item" href=""> Projects <span class="caret"></span></a>
                        <ul class="dropdown-menu dm-icon">
                            <li>
                                <a href="register.php"> Project 1</a>
                            </li>  
                            <li>
                                <a href="login.php"> Project 2</a>
                            </li> 
                        </ul>
                    </li> 
                    </ul>
                </li>
                <li >
                <ul class="top-menu"> 
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="top-menu-item" href=""> Agile <span class="caret"></span></a>
                        <ul class="dropdown-menu dm-icon">
                            <li>
                                <a href="register.php"> Project 1</a>
                            </li>  
                            <li>
                                <a href="login.php"> Project 2</a>
                            </li> 
                        </ul>
                    </li> 
                    </ul>
                </li>
                <li><button data-toggle="modal" href="#preventClick" class="btn btn-primary waves-effect">Create</button></li>
            <?php } ?>

            <li class="pull-right"> 
                <ul class="top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="tm-settings" href=""></a>
                        <ul class="dropdown-menu dm-icon pull-right">
                            <?php if ($this->session->logged_in == FALSE){ ?>
                            <li>
                                <a href="<?php echo site_url('user/register');?>"><i class="md md-person"></i> Register</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('user/login');?>"><i class="md md-person"></i> Login</a>
                            </li> 
                            <?php }else { ?>
                            <li>
                                <a href="<? echo site_url('dashboard');?>"><i class="md-dashboard"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="<? echo site_url('user/logout');?>"><i class="md-lock-outline"></i> Logout</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Top Search Content -->
        <div id="top-search-wrap">
            <input type="text">
            <i id="top-search-close">&times;</i>
        </div>
    </header>