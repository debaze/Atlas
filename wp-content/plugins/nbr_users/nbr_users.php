<?php 

/*
Plugin Name: Nombre de visiteurs du site
Plugin URI: https://www.AtlasDijimanic.com/
Description: Un simple plugin pour afficher le Nombre de visiteur du site
Author: AtlasDijimanic
Version: 1.0.0

*/

add_action( 'widgets_init' , 'articleRecents_init' ); 

function articleRecents_init() { 
	register_widget("widgetArticleRecents"); 
}


class widgetArticleRecents extends WP_Widget { 

// Constructeur du widgets 
function __construct() { 
	parent::__construct('widgetArticleRecents', 'Nombre de visiteur du site', array('description' => 'Affichage des Nombre de visiteur du site')); 
}

//  Mise en forme 
function widget($args,$instance) { 
	
	extract($args); 
	$bdd = new PDO("mysql:host=mysql-atlasdiginamic.alwaysdata.net;dbname=atlasdiginamic_base", "253752", "moul_976");
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$ip_users= $_SERVER['REMOTE_ADDR'];
	
	$getip=$bdd->query("SELECT ip FROM `users` where ip = '$ip_users' ; "); //::1
	//$value = $getip->fetch();
	$count = $getip->rowCount();
	if ($count == 0) {
		$setusers =$bdd->prepare("INSERT INTO `users` (ip) VALUES (?)");
		$setusers->execute(array($ip_users));
	}
	



	echo $before_widget;

	echo '<p>'; 
       
		$getvisiteur=$bdd->query("SELECT ip FROM `users`");
		$count_ip = $getvisiteur->rowCount();

        echo "Nombre de visiteurs : ".$count_ip;

	echo '</p>'; 


	echo $after_widget; 
}

}

?>