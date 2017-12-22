<!--FOOTER SECTION START-->

<div class="footer">
  <div class="footer-top">
    <div class="container">
      <div class="col-md-3 col-md-offset-3 col-sm-6">
        <div class="left-side">
          <p><a href="<?php echo base_url(); ?>contact">Contact Us</a></p>
          <p><a href="<?php echo base_url(); ?>helpCenter">Help Center </a></p>
          <p><a href="<?php echo base_url(); ?>faq">FAQs</a></p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="right-side">
          <p><a href="#">Terms of Services</a></p>
          <p><a href="#">User Agreement </a></p>
          <p><a href="#">Dispute Resolution Policy</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom"> <img src="<?php echo base_url(); ?>images/home-page-icons/footer_logo_1.png" />
    <p>© 2017 EezyBee. All Rights Reserved.</p>
  </div>
</div>
<!--FOOTER SECTION END-->
<!-- drop-down-js start-->
 <script src="<?php echo base_url(); ?>js/drop-down-css-js/js/classie.js"></script>
		<script src="<?php echo base_url(); ?>js/drop-down-css-js/js/selectFx.js"></script>
        
        <script>
			(function() {
				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx(el);
				} );
			})();
		</script>
<!-- drop-down-js end-->
<!-- accordion-js start-->
<script>
function toggleChevron(e) {
    $(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('glyphicon-minus glyphicon-plus');
}
$('#accordion').on('hidden.bs.collapse', toggleChevron);
$('#accordion').on('shown.bs.collapse', toggleChevron);
</script>
<!-- accordion-js end--> 
</body>
</html>
