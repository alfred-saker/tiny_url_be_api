<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wp_tinyurl' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

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
define('WP_DEBUG_LOG', true);
define( 'AUTH_KEY',         'h=Ji[wpQtSN[MXvUd#p|/ZAba!:6hUV@lG {EsL!OgW~51(vn+O7= v1LBdud.>B' );
define( 'SECURE_AUTH_KEY',  'p6XR7U,wTO*R}E4E5J2wIcAwODQr-UGTN:x>0-g]N1&U^NRHQV58?~vY3 (z3yS=' );
define( 'LOGGED_IN_KEY',    '_Q[iD>*Uh^Y(>oO9.yOWPW7T[~<qWE9$oaJ~8ZBqs<[?/]cn)aqkm6DAFe+1JlYr' );
define( 'NONCE_KEY',        'Ra6c#p@EiH=);:XL(R+[#i!!Eu#jmt%.c;sw7OpY6}9lk;y=9$|xNGE0Ia*5T{DK' );
define( 'AUTH_SALT',        'q`B<!,}OZjB>s.;pQeMdp=C{m{(Qe91%?n&vC1^pQK7)^^Ox;8{1sC.%i!EdC|0Q' );
define( 'SECURE_AUTH_SALT', '!;+Pf>{UQ47jc0V6X=Wq-fUqc`3ks*G9TkBOvDPD]Gzvoy668H$Wt()oFggkTQSw' );
define( 'LOGGED_IN_SALT',   'DTy=a9)b6NGWxP9@waV#TMD~-!dTEs-&ySC-i8r~l|UoFw}i%nPl+nA%I~+PHSH1' );
define( 'NONCE_SALT',       'itK*Ofji`Ty4Y1; W$!Tv An/aSBfi_0iW6Dd):$q$pUM)( q#?^kPq_YEe%T5$g' );
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
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
