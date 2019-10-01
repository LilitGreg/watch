<style type="text/css" media="screen">
	.dod_container h2{
		margin:  5px 0;
	}
	.dod-nav-tab-wrapper{
		margin-bottom: 0px;
	}
</style>
<div class="" id="icon">
    <br>
</div>
<h2 class="nav-tab-wrapper dod-nav-tab-wrapper">
    <a href="admin.php?page=deal-of-the-day&amp;tab=deals" class="nav-tab  <?php DD_Admin_Views::get_active('deals')?>"><?php esc_html_e('Deals','dod'); ?></a>
    <a href="admin.php?page=deal-of-the-day&amp;tab=general-settings" class="nav-tab <?php DD_Admin_Views::get_active('general-settings')?>"><?php esc_html_e('General Settings','dod'); ?></a>
    <a href="admin.php?page=deal-of-the-day&amp;tab=how-to-use" class="nav-tab <?php DD_Admin_Views::get_active('how-to-use')?>"><?php esc_html_e('How To Use','dod'); ?></a>
</h2>
<br class="clear">