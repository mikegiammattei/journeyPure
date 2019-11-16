<?php
class OutpatientLocation{

	public  static function add_outpatient_location() {
		add_submenu_page(
			'edit.php?post_type=locations',
			'Outpatient', 'Outpatient',
			'manage_options',
			'edit.php?post_type=outpatient-locations'
		);
	}
}
