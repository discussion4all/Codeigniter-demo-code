<?php $this->load->view('admin/common/header'); ?>

<!-- page content -->

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> <?php echo $this->TITLE ?> Listing </h3>
      </div>
      <div class="title_right">
        <form name="search_form" id="search_form" action="<?php echo site_url($this->PANEL . '/' . $this->CONTROLLER . '/index/s/'); ?>" method="post">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control"  value="<?php echo $searchKey ?>" name="searchText"  placeholder="Search for...">
              <span class="input-group-btn">
              <button class="btn btn-default" type="button" id="search_btn">Go!</button>
              </span> </div>
          </div>
        </form>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <form name="delete_form" id="delete_form" action="<?php echo site_url($this->PANEL . '/' . $this->CONTROLLER . '/deleteData'); ?>" method="post" onsubmit="return admin.giveNotation();" >
      <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
      <div class="x_content">
      <form name="delete_form" id="delete_form" action="<?php echo site_url($this->PANEL.'/'.$this->CONTROLLER.'/deleteData'); ?>" method="post" onsubmit="return admin.giveNotation();" >
      <div style="float:left"><?php echo getMessage(); ?></div>
        <div style="float:right">
    <!--            <a href="<?php echo site_url($this->PANEL . '/' . $this->CONTROLLER . '/' . $this->EDIT_CONTROLLER_NAME); ?>" type="submit" class="btn btn-primary">Add <?php echo $this->TITLE ?></a>-->
            <a href="javascript:$('#del_btn').trigger('click');" class="btn btn-danger">Delete Selected <?php echo $this->TITLE ?></a>
          <input type="submit" name="submit" id="del_btn" value="Delete" style="display:none;" />
        </div>
      </form>
      <table class="table table-striped responsive-utilities jambo_table bulk_action">
        <thead>
          <tr class="headings">
            <th> <input type="checkbox"  id="check-all" class="flat">
            </th>
            
            
            <th class="column-title">Email Address</th>           
            <th class="column-title">Contact Query </th>
            <th class="column-title">Created on</th>
            <th class="column-title no-link last"><span class="nobr">Action</span> </th>
            <th class="bulk-actions" colspan="8"> <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a> </th>
          </tr>
        </thead>
        <tbody>
          <?php
			foreach($listArr as $list ) { 
			$id = $list[$this->PK] ;  
			
		  ?>
          <tr class="even pointer" id="row_<?php echo $id ?>">
            <td class="a-center "><input type="checkbox" value="<?php echo $id ?>"   class="flat" name="deletes[]"></td>
            
            
            
            <td class=""><?php echo $list['contact_email']  ?></td>
            <td class=""><?php echo mb_strimwidth($list['contact_query'], 0, 80, "...")  ?></td>
            
            <td class=""><?php echo date('d-m-Y',strtotime($list['created_on']))  ?></td>
            <td class=" last"><a class="btn btn-info btn-xs" href="<?php echo site_url($this->PANEL.'/'.$this->CONTROLLER.'/'.$this->EDIT_CONTROLLER_NAME.'/'.$id) ?>" title="Edit <?php echo $this->TITLE ?>" ><i class="fa fa-edit fa-2x"></i> </a> <a class="btn btn-danger btn-xs" href="javascript:admin.deleteData('<?php echo $id ?>')" title="Delete <?php echo $this->TITLE ?>"> <i class="fa fa-trash-o fa-2x"></i> </a></td>
          
          </tr>
          <?php  }  ?>
        </tbody>
      </table>
      
      <!--Start [ Right Nav Part 3 ]-->
      <div id="pager" class="pager">
        <form name="paging_form" action="" method="post">
          <?php echo $links; ?>
          <?php
                                    $per_page_drop = $this->mdl_common->per_page_drop();
                                    //echo form_dropdown('per_page',$per_page_drop,set_value('per_page',$this->session->userdata('per_page')),' class="pagesize" id="pageValue" onchange="javascript:updatePerPage(this.value);"'); 
                                    ?>
        </form>
        <div class="clear"></div>
      </div>
      <!--End [ Right Nav Part 3 ]-->
      
      <div class="btn-group" style="display: none">
        <button class="btn btn-primary" type="button">1</button>
        <button class="btn btn-primary active" type="button">2</button>
        <button class="btn btn-primary" type="button">3</button>
        <button class="btn btn-primary" type="button">4</button>
      </div>
    </div>
  </div>
</div>
</form>
</div>
</div>
</div>
<!-- /page content --> 
<script type="text/javascript">
$(document).ready(function(e) {
	admin.init('<?php echo $this->PANEL ?>','<?php echo $this->CONTROLLER ?>');    
});
</script> 

<!-- footer content --> 
<?php echo $this->load->view('admin/common/footer'); ?> 
<!-- /footer content -->