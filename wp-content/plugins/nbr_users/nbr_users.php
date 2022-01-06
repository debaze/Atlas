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

	echo $before_widget;

	echo '<p>'; 

        if(file_exists('compteur_visites.txt'))
        {
                $compteur_f = fopen('compteur_visites.txt', 'r+');
                $compte = fgets($compteur_f);
        }
        else
        {
                $compteur_f = fopen('compteur_visites.txt', 'a+');
                $compte = 0;
        }
        if(!isset($_SESSION['compteur_de_visite']))
        {
                $_SESSION['compteur_de_visite'] = 'visite';
                $compte++;
                fseek($compteur_f, 0);
                fputs($compteur_f, $compte);
        }
        fclose($compteur_f);

        echo "Nonbre de visiteur du site : ".$compte;

	echo '</p>'; 


	echo $after_widget; 
}

}

?>