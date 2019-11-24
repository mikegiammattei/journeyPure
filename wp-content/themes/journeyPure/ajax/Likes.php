<?php

/** Loads the WordPress Environment and Template */
require ($_SERVER['DOCUMENT_ROOT'] . " /wp-load.php");

require_once(get_stylesheet_directory() . '/classes/Likes.php');
$Likes = new \Likes();

/** The identifier is the path of the bio image
 * Returns total likes
 */
$objIdentifier = $_POST['data'];
echo $Likes->updateLikeObject($objIdentifier);

