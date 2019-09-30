<?php
add_action('admin_menu', 'add_global_custom_options');

function add_global_custom_options()
{
	add_options_page(
		'Global Custom Options',
		'Global Custom Options',
		'manage_options',
		'functions',
		'global_custom_options'
	);
}

function global_custom_options()
{
?>
    <div class="wrap">
        <h2>Global Custom Options</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
            <p><strong>Default Phone Number:</strong><br />
                <input type="text" name="defaultPhone" size="45" value="<?php echo get_option('defaultPhone'); ?>" />
            </p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="defaultPhone" />

			<p><input type="submit" name="Submit" value="Store Options" /></p>
        </form>
    </div>
<?php
}
?>

