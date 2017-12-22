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
                    <div class="x_content">
                        <br />

                        <form  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url($this->PANEL . '/' . $this->CONTROLLER . '/' . $this->EDIT_CONTROLLER_NAME . '/' . $id) ?>" name="myform"  method="post" enctype="multipart/form-data" onsubmit="if(mobilevalidate()<?php if ($id) {echo '&& confirmation()';} ?> ){return true;}else{return false;}">
							
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div class="col-md-3 col-sm-3 col-xs-12"> 
                                    <label>  </label>                      
                                </div>
                            </div>  
                            
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name">Email Address<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" readonly=""name="form[contact_email]" value="<?php echo $contact_email ?>"  class="form-control col-md-7 col-xs-12">
                                    <br/><br/>
                                </div>
                                <font color="#FF0000"><?php echo form_error('form[contact_email]');?></font>
                            </div> 
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" for="first-name">Contact Query<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea readonly="" class="form-control col-md-7 col-xs-12"><?php echo $contact_query ?></textarea> 
                                    
                                    
<!--                                    <input type="text" readonly="" name="form[contact_query]" value="<?php echo $contact_query ?>"  class="form-control col-md-7 col-xs-12">-->
                                    <br/><br/>
                                </div>
                                <font color="#FF0000"><?php echo form_error('form[contact_query]');?></font>
                            </div>
                            
                              
                           
                             
                            
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="<?php echo site_url($this->PANEL . '/' . $this->CONTROLLER . '/index/s') ?>" class="btn btn-primary">Back</a>
<!--                                    <button type="submit" class="btn btn-success">Submit</button>-->
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