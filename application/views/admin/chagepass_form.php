<?php $this->load->view('admin/common/header'); ?>
<div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3> 
                   Change Password

                </h3>
            </div>
           </div>
        <div class="clearfix"></div>


      <div class="row">
  <div style="height:10px; display:block;"></div>
<div class="form_parent">
  <form action="<?php echo site_url($this->PANEL.'/'.$this->CONTROLLER.'/'.$this->CHANGE_PASSWORD); ?>" class="form-horizontal form-label-left" method="POST" >
   <span class="login_error" style="display:block;text-align:center"><?php if(isset($error)) { echo $error; } ?></span>
    <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name"> Old Password :<span class="error">*</span></label> 
     <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="password" class="form-control col-md-7 col-xs-12" name="oldPassword" id="oldPassword" value="<?php echo $oldPassword; ?>"/>
          <br/><br/>
     </div>
        <font color="#FF0000"><?php echo form_error('oldPassword');?></font>
     </div> 
     <div class="form-group">
       <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name">  New Password : <span class="error">*</span></label>
       <div class="col-md-6 col-sm-6 col-xs-12">
       <input type="password" class="form-control col-md-7 col-xs-12" id="newPassword" name="newPassword" value="<?php echo $newPassword; ?>"/>
        <br/><br/>
       </div>
        <font color="#FF0000"><?php echo form_error('newPassword');?></font>
       </div>
       <div class="form-group">
       <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name"> Retype Password : <span class="error">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="password" class="form-control col-md-7 col-xs-12"  id="retypePassword" name="retypePassword" value="<?php echo $retypePassword; ?>"/>
      <br /><br />
      </div>
      
        <font color="#FF0000"><?php echo form_error('retypePassword');?></font>
      </div>
         <div class="ln_solid"></div>
          <div class="form-group">
             <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <input type="button" value="Back" class="btn btn-primary"  onclick="javascript:history.go(-1);"/>
           <input type="Submit" name="submit" class="btn btn-success" value="Submit" />
           </div>
        </div>
       </form>
  </form>
</div>
</div>
</div>
<?php echo $this->load->view('admin/common/footer'); ?>