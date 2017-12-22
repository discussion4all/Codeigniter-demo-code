<ul class="nav navbar-nav navbar-right">
    <li class="">
        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo base_url() ?>images/admin.png" alt="">
            <span class=" fa fa-angle-down"></span>
        </a>
        <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
              <li><a href="<?php echo base_url(); ?>admin/admin/changePassword"><i class="fa fa-key pull-right"></i> Change Password</a>
            <li><a href="<?php echo site_url('admin/admin/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
            </li>
        </ul>
    </li>

    <li role="presentation" class="dropdown" style="display:none">
        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">6</span>
        </a>
        <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
            <li>
                <a>
                    <span class="image">
                        <img src="<?php echo base_url() ?>images/admin.png" alt="Profile Image" />
                    </span>
                    <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                </a>
            </li>
            <li>
                <a>
                    <span class="image">
                        <img src="<?php echo base_url() ?>images/img.jpg" alt="Profile Image" />
                    </span>
                    <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                    </span>
                    <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                    </span>
                </a>
            </li>
             
            <li>
                <div class="text-center">
                    <a href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </li>
        </ul>
    </li>

</ul>