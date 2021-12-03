<?php
/*
PLugin Name: Instrumental
Description: Wonderland plugin starter kit
*/

use Instrumental\Plugin;

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
