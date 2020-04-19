<?php

include_once(get_stylesheet_directory() . '/classes/Homepage.php');
$Homepage = new Homepage\Homepage();

/** Page specific js*/
$jsFile = 'homepage';
get_header();

?>
   <div id="content">
     <center><h1>Oh no! This page doesn't work.</h1>
	 <h2>But...we have plenty of great stuff on this website.</h2>
	 	 <p>&nbsp;</p>
	 <p>Learn more about our rehabs:</p>
	 <a href="/locations/tennessee/" class="btn btn-primary"><i class="fas fa-map-marker-alt"></i> Tennessee</a>
	 
	  <a href="/locations/kentucky/" class="btn btn-primary"><i class="fas fa-map-marker-alt"></i> Kentucky</a>
	  
	  	  <a href="/locations/florida/" class="btn btn-primary"><i class="fas fa-map-marker-alt"></i> Florida</a>
		  <p>&nbsp;</p>
	 <p>Or, maybe you're interested in our <a href="/suboxone-clinics/">outpatient clincs</a> instead? </p>
	 <iframe width="560" height="315" src="https://www.youtube.com/embed/Gd1Dza355X8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	  <p>&nbsp;</p>
	 </center>
   </div>
<?php get_footer(); ?>



