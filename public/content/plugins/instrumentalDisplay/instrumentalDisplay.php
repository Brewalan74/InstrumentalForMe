<?php
/*
PLugin Name: Instrumental Display
Description: Wonderland plugin
*/

use InstrumentalDisplay\Plugin;

// IMPORTANT ne pas oublier de charger l'autoloader du "starter kit"
require __DIR__ . '/../instrumental/vendor-instrumental/autoload.php';
require __DIR__ . '/vendor-instrumental/autoload.php';

$plugin = new Plugin();

register_activation_hook(
   __FILE__,
   [$plugin, 'activate']
);


register_deactivation_hook(
   __FILE__,
   [$plugin, 'deactivate']
);
