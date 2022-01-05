<?php

/*
Plugin Name: nonbre de visiteurs 
Plugin URI: https://www.ATLASdijinamic.com/
Description: Un simple plugin pour afficher les nonbres de visiteurs du site 
Author: ATLASdijinamic
Version: 1.0.0
*/
add_action( 'widgets_init' , 'articleRecents_init' ); 

function articleRecents_init() { 
	register_widget("nbrusers"); 
}


class nbrusers extends WP_Widget { 

// Constructeur du widgets 
function nbrusers() { 
parent::WP_Widget('ATL', $name = 'nonbre de visiteurs', array('description' => 'Affiche les nonbres de visiteurs du site ')); 
}

function visiteurs(){
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
    return $compte;
    }
//  Mise en forme 
function widget($args,$instance) { 
	
	extract($args); 

	$title = apply_filters('widget_title', $instance['title']); 
	$nb_posts = $instance['nb_posts']; 
	
	//Récupération des articles 
	
	$lastposts = get_posts(array('numberposts'=>$nb_posts)); 

// HTML AVANT WIDGET 
	echo $before_widget;
 
// Titre du widget qui va s’afficher 
	echo $before_title.$title.$after_title; 

// Boucle pour afficher les articles 
	echo '<p>'; 

	echo visiteurs();

	echo '</p>'; 


// HTML APRES WIDGET 
	echo $after_widget; 
}

// Récupération des paramètres 
function update($new_instance, $old_instance) { 

	
	


} 


// Paramètres dans l’administration 
function form($instance) { 

// Etape 1 - Définition des variables titre et nombre de post 


// Etape 2 - Ajout des deux champs 

}

// Fin du widget 
}

?>