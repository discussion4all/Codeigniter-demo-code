<?php $this->load->view('admin/common/header'); ?>

<!-- page content -->
<div class="right_col" role="main">

    <div class="">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?php echo ($id == '' ? 'Add' : 'Edit' ) ?> <?php echo $this->TITLE ?>  </h2>                   
                        <div class="clearfix"></div>
                    </div>
                    
                        <br />

                        <form  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url($this->PANEL . '/' . $this->CONTROLLER . '/' . $this->EDIT_CONTROLLER_NAME . '/' . $id) ?>" name="myform"  method="post" enctype="multipart/form-data" onsubmit="if(mobilevalidate()<?php if ($id) {echo '&& confirmation()';} ?> ){return true;}else{return false;}">
							<!--- General Activities Information Start here --->
                             <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <a class="collapse-link"><h2>General Activities Information</h2></a>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div class="col-md-3 col-sm-3 col-xs-12"> 
                                    <label>  </label>                      
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name">Full Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="form[user_name]" value="<?php echo $user_name ?>"  class="form-control col-md-7 col-xs-12">
                                    <br/><br/>
                                </div>
                                <font color="#FF0000"><?php echo form_error('form[user_name]');?></font>
                            </div> 
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name">Email<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="form[user_email]" value="<?php echo $user_email ?>"  class="form-control col-md-7 col-xs-12">
                                    <br/><br/>
                                </div>
                                <font color="#FF0000"><?php echo form_error('form[user_email]');?></font>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name">Password
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" name="user_password" class="form-control col-md-7 col-xs-12">
                                    <?php if($id !=''){ ?>
                                    <font color="#666666" >( Add a new password if you want to change current password )</font>
                                    <?php } ?>
                                    <br/><br/>
                                </div>
                                <font color="#FF0000" ><?php echo form_error('form[user_password]');?></font>
                                
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name">User Service Type
                                </label>
                                <?php 
									$srchUserTypeArr = array();
									array_push($srchUserTypeArr,array('backend'=>'0','frontend'=>'Service Provider'));
									array_push($srchUserTypeArr,array('backend'=>'1','frontend'=>'Service Seeker'));
								?>
                                <div class="col-md-6 col-sm-6 col-xs-12 ">
        						<select name="form[user_service_type]" class="form-control">
            					<?php
									foreach($srchUserTypeArr as $srchUserType){
										echo '<option value="'.$srchUserType['backend'].'"  '.($user_service_type == $srchUserType['backend'] ? 'selected' : '' ).'>'.$srchUserType['frontend'].'</option>';
									}
								?>
            					</select>
            					</div>
                                <font color="#FF0000"><?php echo form_error('form[user_service_type]');?></font>
                                <font color="#FF0000" id="resultc"></font>  
                            </div>
                           <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name">Image Upload
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" name="imageUpload" class="form-control col-md-7 col-xs-12">
                                    <br/><br/>
                                </div>
                            </div>-->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name">Service Category
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 ">
        						<select name="form2[up_sc_id]" class="form-control">
            					<?php
									foreach($srchUserTypeArr as $srchUserType){
										echo '<option value="'.$srchUserType['backend'].'"  '.($up_sc_id == $srchUserType['backend'] ? 'selected' : '' ).'>'.$srchUserType['frontend'].'</option>';
									}
								?>
            					</select>
            					</div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name">Phone Number
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="form2[up_phone_number]" value="<?php echo $userProfile['up_phone_number'] ?>"  class="form-control col-md-7 col-xs-12">
                                    <br/><br/>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name">About
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="form2[up_about]" value="<?php echo $userProfile['up_about'] ?>"  class="form-control col-md-7 col-xs-12">
                                    <br/><br/>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name">Skill
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="tags_1" name="form2[up_skills]" value="<?php echo $userProfile['up_skills'] ?>"  class="form-control col-md-7 col-xs-12">
                                      <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;">( Press tab to add skill )</div>
                          </div>
                                    <br/><br/>
                                </div>
                            </div> 
                             </div>
                    </div>
                  <!--- General Activities Information End here --->
                  <!--- Location Start here --->
                   <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <a class="collapse-link"><h2>Location</h2></a>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                       <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Address
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="form2[up_address]" value="<?php echo $userProfile['up_address'] ?>"  class="form-control col-md-7 col-xs-12">
                                    <br/><br/>
                                </div>
                            </div> 
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">City
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="form2[up_city]" value="<?php echo $userProfile['up_city'] ?>"  class="form-control col-md-7 col-xs-12">
                                    <br/><br/>
                                </div>
                            </div> 
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Country
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="form2[up_country]" value="<?php echo $userProfile['up_country'] ?>"  class="form-control col-md-7 col-xs-12">
                                    <br/><br/>
                                </div>
                            </div> 
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Postal Code
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="form2[up_postal_code]" value="<?php echo $userProfile['up_postal_code'] ?>"  class="form-control col-md-7 col-xs-12">
                                    <br/><br/>
                                </div>
                            </div> 
                       </div>
                  </div>
                  </div>
                  <!--- Location End here --->
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="<?php echo site_url($this->PANEL . '/' . $this->CONTROLLER . '/index/s') ?>" class="btn btn-primary">Cancel</a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div> 
    <!-- /page content -->

    <script>
        $(document).ready(function(){
            $('#bussiness_country').trigger('change');
        })
    </script>
    
    <!-- footer content -->
    <?php echo $this->load->view('admin/common/footer'); ?>
    <!-- /footer content -->
    <!-- editor -->
  <script>
    $(document).ready(function() {
      $('#demo-form2').submit(function() {

        $('#descr').val($('#editor').html());
	 
      });

    });

    $(function() {
      function initToolbarBootstrapBindings() {
        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'
          ],
          fontTarget = $('[title=Font]').siblings('.dropdown-menu');
        $.each(fonts, function(idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
        });
        $('a[title]').tooltip({
          container: 'body'
        });
        $('.dropdown-menu input').click(function() {
            return false;
          })
          .change(function() {
            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
          })
          .keydown('esc', function() {
            this.value = '';
            $(this).change();
          });

        $('[data-role=magic-overlay]').each(function() {
          var overlay = $(this),
            target = $(overlay.data('target'));
          overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
        });
        if ("onwebkitspeechchange" in document.createElement("input")) {
          var editorOffset = $('#editor').offset();
          $('#voiceBtn').css('position', 'absolute').offset({
            top: editorOffset.top,
            left: editorOffset.left + $('#editor').innerWidth() - 35
          });
        } else {
          $('#voiceBtn').hide();
        }
      };

      function showErrorAlert(reason, detail) {
        var msg = '';
        if (reason === 'unsupported-file-type') {
          msg = "Unsupported format " + detail;
        } else {
          console.log("error uploading file", reason, detail);
        }
        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
          '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
      };
      initToolbarBootstrapBindings();
      $('#editor').wysiwyg({
        fileUploadError: showErrorAlert
      });
      window.prettyPrint && prettyPrint();
    });
  </script>
   <!-- Input tag -->
    <script>
    function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }

    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input, tag) {
      alert("Changed a tag: " + tag);
    }

    $(function() {
      $('#tags_1').tagsInput({
        width: 'auto'
      });
    });
	 $(function() {
      $('#tags_2').tagsInput({
        width: 'auto'
      });
    });
  </script>
       <!-- close Inputt -->