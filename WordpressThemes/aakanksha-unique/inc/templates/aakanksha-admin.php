<h1>Aakanksha Theme Options</h1>
<?php settings_errors();?>
<?php 
$firstName = esc_attrt(get_option('first_name'));
<div class="aakanksha-sidebar-preview">
<div class="aakanksha-sidebar">
    <h1 class="aakanksha-username">
    <h2 class="aakanksha-description">
        <div class="icons-wrapper">
        </div>
        </h2>
    </h1>
    </div>
</div>
<form method="post" action="options.php">
	<?php settings_fields('aakanksha-settings-group');?>
	<?php do_settings_sections('aakanksha_law'); ?>
	<?php submit_button(); ?><?php //(text,type, name,wrap,other_attributes) ?>
	</form>