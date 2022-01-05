<?php 

/*
Plugin Name: Nonbre de visieteurs du site
Plugin URI: https://www.AtlasDijimanic.com/
Description: Un simple plugin pour afficher le Nonbre de visieteurs du site
Author: AtlasDijimanic
Version: 1.0.0
*/

add_action( 'widgets_init' , 'articleRecents_init' ); 

function articleRecents_init() { 
	register_widget("widgetArticleRecents"); 
}


class widgetArticleRecents extends WP_Widget { 

// Constructeur du widgets 
function widgetArticleRecents() { 
parent::WP_Widget('AAF', $name = 'Nonbre de visieteurs du site', array('description' => 'Affichage des Nonbre de visieteurs du site')); 
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
	echo '<ul>'; 

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

	echo '</ul>'; 


// HTML APRES WIDGET 
	echo $after_widget; 
}

/*
// Récupération des paramètres 
function update($new_instance, $old_instance) { 

	
		$instance = $old_instance; 

//Récupération des paramètres envoyés 
		$instance['title'] = strip_tags($new_instance['title']); 
		$instance['nb_posts'] = $new_instance['nb_posts']; return $instance; 


} 


// Paramètres dans l’administration 
function form($instance) { 

// Etape 1 - Définition des variables titre et nombre de post 
$title = esc_attr($instance['title']); 
$nb_posts = esc_attr($instance['nb_posts']); 

// Etape 2 - Ajout des deux champs
?> 

	<p> 
		<label for="<?php echo $this->get_field_id('title'); ?>"> 
			<?php echo 'Titre:'; ?> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /> 
		</label> 
	</p> 

	<p> 
		<label for="<?php echo $this->get_field_id('nb_posts'); ?>"> 
			<?php echo 'Nombre d\'articles:'; ?> <input class="widefat" id="<?php echo $this->get_field_id('nb_posts'); ?>" name="<?php echo $this->get_field_name('nb_posts'); ?>" type="text" value="<?php echo $nb_posts; ?>" /> 
		</label> 
	</p> 

<?php 

}
*/

// Fin du widget 
}

?>