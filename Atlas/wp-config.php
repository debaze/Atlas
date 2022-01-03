<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'atlasdiginamic_pouet' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', '253752' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'moul_976' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'mysql-atlasdiginamic.alwaysdata.net' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '/YxHDt1{ ZcW@:%Gy%X+303IKfagbvvM$.Bz`bk4j0]FZ:rfzIJCg~z& Cd}+7mg' );
define( 'SECURE_AUTH_KEY',  'RMQtF n1=TcExUBMZ)naNk@+PTK}^9Bn>S:<BB;[{){;PF9&VZIYA]#Pm{RO &wS' );
define( 'LOGGED_IN_KEY',    'I,]+H`#6>]w,Tnlyp~CUjs[gXS*wJuw*],lI7ia^Jq.wQM3Z;`Cc49z>Oocnpog@' );
define( 'NONCE_KEY',        'P+=Wl[+;oA;fd+iEU6)IJ3OAj+Zf)hx6k eTp>k^kdM,V_|7.=<4nXnOT%3OtL0`' );
define( 'AUTH_SALT',        '?M,*rt:5W<=2@RKE(+|T}H@[[V`[D}= E=swk]kB45,2?OW9]c5_*smY)t5Z]s9L' );
define( 'SECURE_AUTH_SALT', 'z(E8hIU~1R:D /T -oW!#9#y0ja,4Ia@jg47uu@e{m4Q%cNZs5Lqy%_<b71^+6sD' );
define( 'LOGGED_IN_SALT',   'l[p5hh00})QV_7nattjU0jg<[Y(7pwT(Rt=HX}bZ+{.7GARhW[?AIHTaCX0571/T' );
define( 'NONCE_SALT',       'M[,[+<5R6vRQDbE$uOCy~.qY.!(b&u`gtf87RcQ$XW}+D0LR_OXjbMO {p<bDTbm' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
