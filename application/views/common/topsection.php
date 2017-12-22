
<!--TOP SECTION  START-->

<div class="main-top_section"> 
  <!--HEADER  START-->
  <div class="container-fluid">
    <div class="header_section">
      <div class="col-md-1 col-xs-12">
        <div class="logo" onclick="location.href='<?php echo base_url(); ?>'"><img src="<?php echo base_url(); ?>images/home-page-icons/logo_white.png" class="img-responsive" /> </div>
      </div>
      <div class="col-md-11">
        <div class="main_header container">
          <div class="col-md-3 col-sm-6">
            <div class="home_search">
              <input type="text" class="easy-search" placeholder="Job or Service Near Me"/>
              <span>
              <button><img src="<?php echo base_url(); ?>images/home-page-icons/search.png" /></button>
              </span> </div>
          </div>
          <div class="signin_sign_up">
          <?php 
		  $userDetails = $this->session->userdata('eb-user');
		  $userDetails = dbQueryRow('eb_user',array('user_id'=>$userDetails['user_id']));
		  if(is_array($this->session->userdata('eb-user'))){ ?>
          	<button onClick="location.href='<?php echo base_url(); ?>home/signout'" class="sign-in-button">SIGN OUT</button>
            
          <?php }else{ ?>
          	<button onClick="location.href='<?php echo base_url(); ?>signup'" class="sign-up-button">SIGN UP</button>
            <button onClick="location.href='<?php echo base_url(); ?>signin'" class="sign-in-button">SIGN IN</button>
          <?php } ?>
            <div class="white_space"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--HEADER  START--> 