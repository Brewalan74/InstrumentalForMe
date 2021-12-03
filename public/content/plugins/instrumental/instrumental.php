<?php
/*
Plugin Name:Instrumental
*/

use Instrumental\Plugin;

require __DIR__ .'/vendor-instrumental/autoload.php';

// STEP E9 ROUTER chargement du fichier d'initialisation du router custom
require __DIR__ .'/router-initialize.php';

$pluginInstrumental = new Plugin();


// DOC WP PLUGININ activation "hook" : https://developer.wordpress.org/reference/functions/register_activation_hook/
// au moment de l'activation du plugin, nous demandons au plugin de lancer les traitements dont il a besoin
register_activation_hook(
    // premier argument, le chemin vers le fichier de déclaration du plugin
    __FILE__,// calcule le chemin absolu ver le fichier oprofile.php
    // appel de la méthode activate sur l'objet $plugin
   // En js la syntaxe serait addEventListener('plugin-activate', pluginOprofile.activate);
    [$pluginInstrumental, 'activate']
 );
 
 
 register_deactivation_hook(
    __FILE__,
    [$pluginInstrumental, 'deactivate']
 );



