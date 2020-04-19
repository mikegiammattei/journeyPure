<?php

// Dependencies
global $wpdb;
$table_name = $wpdb->prefix.'uml_handler';
$charset_collate = $wpdb->get_charset_collate();

if(!empty($_POST['utm_campaign'])){

	if($_POST['utm_campaign']&& !empty($_POST['utm_logo_path'])&& !empty($_POST['utm_logo_alt'])){
		// Post Data
		$utm_param = $_POST['utm_campaign'];
		$utm_logo_path = $_POST['utm_logo_path'];

		// Check if utm_campaign exists
		$utmExists = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE utm_campaign = '$utm_param'");

		// Check if table exists
		$query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );

		/** If table exists store new uml record | else create table */
		if ($wpdb->get_var( $query ) == $table_name ) {

			/** add record if not exist | else return error */
			if(!$utmExists){
				$data = array('utm_campaign' => $_POST['utm_campaign'], 'utm_logo_path' => $_POST['utm_logo_path']
				, 'utm_logo_alt' => $_POST['utm_logo_alt']);
				$format = array('%s','%s');
				$wpdb->insert($table_name,$data,$format);
			}else{
				$errors[] = 'No submission. The UTM Parameters Exists';
			}


		}else{
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

			//* Create the table
			$sql = "CREATE TABLE $table_name (
		 id INTEGER NOT NULL AUTO_INCREMENT,
		 utm_campaign TEXT NOT NULL,
		 utm_logo_path TEXT NOT NULL,
		 utm_logo_alt TEXT NOT NULL,
		 create_on timestamp NOT NULL default current_timestamp ,
  
		 PRIMARY KEY (id)
		 ) $charset_collate;";
			dbDelta($sql);

		}
	}else{
		$errors[] = 'All fields are required';
	}


}
?>
<style>

	h1{
		margin-bottom: 40px;
	}
	.container{
		display: flex;
	}
	.input-form{
		background: lightgray;
		box-sizing: border-box;
		padding: 15px 15px 10px;
		display: inline-block;
	}
	.form-box{
		padding: 5px;
		box-sizing: border-box;
	}
	.form-item{
		font-weight: bold;
		margin-top: 5px;
	}
	.form-item input{
		font-weight: normal;
		outline: none;
		border:none;
		padding: 5px 10px;
		margin-top: 1px;
	}
	small{
		color: gray;
		font-weight: normal;
	}
	h2{
		margin-top: 0;
	}
	.results{
		margin-left: 20px;
	}
	div.error{
		margin: 5px;
	}
	.notice-success{
		margin: 5px 2px 2px;
	}
	.truncate{
		display: block;
		width: 250px;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
	}
</style>
<h1>UML Tracking Handler</h1>
<div class="container">
	<div>
		<h2>Record Form</h2>

		<div class="input-form">
			<?php if(!empty($errors)): ?>
				<div class="error">
					<?php foreach ($errors as $error): ?>
						<?php echo $error; ?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<form method="post">
				<div class="form-box">
					<div class="form-item">
						<div>
							UTM Parameter: <input id="utm_campaign" name="utm_campaign">
						</div>
						<small><i>Enter the campaign parameter</i></small>
					</div>
					<div class="form-item">
						<div>
							Logo URL: <input id="utm_logo_path" name="utm_logo_path">
						</div>

						<small><i>ie: http://journeypure.net/wp-content/themes/journeyPure/assets/img/loc-logos/suboxone-clinic-logo.png </i></small>
					</div>
					<div class="form-item">
						<div>
							Logo Alt Value: <input id="utm_logo_alt" name="utm_logo_alt">
						</div>

						<small><i>Enter the alt attribute value</i></small>
					</div>
					<div class="form-item">
						<button style="block" type="submit" class="button-primary ">Add Record</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="results">
		<h2>Existing Records</h2>
		<?php if(isset($_POST['delete-utm-id'])): ?>
			<?php
			function deleteUTMRecord(){

			}

				$utmId = $_POST['delete-utm-id'];
				$wpdb->delete( $table_name, array( 'id' => $utmId ) );

			?>
			<div class="notice notice-success is-dismissible">
				<p>UTM record successfully deleted</p>
			</div>
		<?php endif; ?>
		<table class="wp-list-table widefat fixed striped tags">
			<thead>
				<tr>
					<th><strong>UTM Campaign</strong></th>
					<th><strong>UTM Logo Path</strong></th>
					<th><strong>UTM Logo Alt</strong></th>
					<th><strong>Action</strong></th>
				</tr>
			</thead>
			<tbody>

			<?php
			// Check if table exists
			$query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );

			/** If table exists store new uml record | else create table */
			if ($wpdb->get_var( $query ) == $table_name ) :
				$uml_records = $wpdb->get_results( "SELECT * FROM $table_name");

				foreach ($uml_records as $uml_record) : ?>
					<tr>
						<td><?php echo $uml_record->utm_campaign; ?></td>
						<td><span title="<?php echo $uml_record->utm_logo_path; ?>" class="truncate"><?php echo $uml_record->utm_logo_path; ?></span></td>
						<td><?php echo $uml_record->utm_logo_alt; ?></td>
						<td>
							<form method="post" onsubmit="return confirm('Are you sure you want to delete:\nUTM Campaign record <?php echo $uml_record->utm_campaign; ?>?');">
								<input type="hidden" value="<?php echo $uml_record->id; ?>" name="delete-utm-id" />
								<input type="submit" class="btn button-primary btn-sm" value="Delete"  />
							</form>
						</td>
					</tr>

				<?php endforeach; ?>

			<?php endif; ?>


			</tbody>

		</table>

	</div>
</div>
