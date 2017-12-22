

<div class="profile">

    <div class="profile_pic">

        <img src="<?php echo base_url() ?>images/admin.png" alt="..." class="img-circle profile_img">

    </div>

    <div class="profile_info">

        <span>Welcome</span>

        <h2><?php echo $this->session->userdata('admin_username') ?></h2>

    </div>

</div>

<!-- /menu prile quick info -->



<br />



<!-- sidebar menu -->

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

 

    <div class="menu_section">

        <h3>&nbsp;</h3>

        <ul class="nav side-menu">

   
             <li class="<?php echo ($this->CONTROLLER == 'appusers' ? ' current-page ' : ''  ) ?>"><a href="<?php echo site_url('admin/appusers/index/s') ?>" ><i class="fa fa-user"></i> Users</a></li>
             <li class="<?php echo ($this->CONTROLLER == 'Contactus' ? ' current-page ' : ''  ) ?>"><a href="<?php echo site_url('admin/contactus/index/s') ?>" ><i class="fa fa-phone"></i> Contact Request</a></li>
             <li class="<?php echo ($this->CONTROLLER == 'Faq' ? ' current-page ' : ''  ) ?>"><a href="<?php echo site_url('admin/faq/index/s') ?>" ><i class="fa fa-question "></i> FAQ</a></li>
            <li class="<?php echo ($this->CONTROLLER == 'Helpcenter' ? ' current-page ' : ''  ) ?>"><a href="<?php echo site_url('admin/helpcenter/index/s') ?>" ><i class="fa fa-comment "></i> Help Request</a></li>
            <li class="<?php echo ($this->CONTROLLER == 'SecurityQuestion' ? ' current-page ' : ''  ) ?>"><a href="<?php echo site_url('admin/securityQuestion/index/s') ?>" ><i class="fa fa-question-circle "></i> Security Question</a></li>

           
            <li><a href="<?php echo site_url('admin/admin/logout') ?>"><i class="fa fa-power-off"></i> Logout <span class="fa"></span></a>

            </li>



        </ul>

        </ul>

    </div>

    <div class="menu_section">

        <ul class="nav side-menu">

        </ul>

    </div>



</div>

<!-- /sidebar menu -->