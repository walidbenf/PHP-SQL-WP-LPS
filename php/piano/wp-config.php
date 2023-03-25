<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'piano' );

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
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'h{b(s6rG/[b?3eZx{XHOkT=&TGi8d s=X|5MaEymw{Pl=)_,5<u)QC7|9*G9P5Hp' );
define( 'SECURE_AUTH_KEY',  '3]lv.RudR}NkMH<l%spViDoc5bqj9o_&X[6e1g2dciJ<fQu-eUL7sQGa]^$;7oxy' );
define( 'LOGGED_IN_KEY',    '/P{aB^nWN/OlO{r|+FR^k]M>sNx&##:z@HU3rh`9Rs/dBSHO**HE<Vsc}1e7z*Ln' );
define( 'NONCE_KEY',        'ERthj#[69%oP,3!Dqdy9lEqZjpC#!n6C3sL#b#ay =<n)ByNRi,5Ah^|9|8*q>t,' );
define( 'AUTH_SALT',        'Qx(fQYF}}a2oeQb*y|aka@?#R&-}#H`:@5iA+l&}a*aYC@PM&58>s,?@An hJy2j' );
define( 'SECURE_AUTH_SALT', 'A NDe^W]U0HFa,fH3r8f:!B_Ld@yEL5Hh]2R4gR^A{Y|`JlORd13dcn Ba^R&J2<' );
define( 'LOGGED_IN_SALT',   '/<c3C-p%V^uy7/e&64oe<x7k>o}etN3%JcE-Qud?Zp ]$af~U#DicE3(U8:5<1bg' );
define( 'NONCE_SALT',       'R.QH+AZelrV13^U.}Gm@S@?*`_Tlcjz{MF,UFBt Nw6_o jB5/w#c[*V,H<J!3D@' );
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
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
