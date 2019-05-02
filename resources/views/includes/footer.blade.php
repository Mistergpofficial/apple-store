<script src="<?php echo config('siteconfig.site_url') ?>/public/material/js/bootstrap.min.js"></script>
<script src="<?php echo config('siteconfig.site_url') ?>/public/material/js/ripples.min.js"></script>
<script src="<?php echo config('siteconfig.site_url') ?>/public/material/js/material.min.js"></script>
<script>
$.material.init();
</script>
<script src="<?php echo config('siteconfig.site_url') ?>/public/material/js/jquery.dropdown.js"></script>
<script>
$(".navbar-form select").dropdown();
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<footer>
<div class="footcontent">
<div class="pull-left">
RG93bmxvYWRlZCBmcm9tIENPREVMSVNULkND
</div>
<div class="pull-right">
<a href="<?php echo config('siteconfig.site_url') ?>"><?php echo config('siteconfig.footnav_home') ?></a><span class="footsep"></span><a href="<?php echo config('siteconfig.site_url') ?>/privacy"><?php echo config('siteconfig.footnav_privacy') ?></a><span class="footsep"></span><a href="<?php echo config('siteconfig.site_url') ?>/dmca"><?php echo config('siteconfig.footnav_dmca') ?></a><span class="footsep"></span><a href="<?php echo config('siteconfig.site_url') ?>/contact"><?php echo config('siteconfig.footnav_contact') ?></a>
</div>
</div>
</footer>
