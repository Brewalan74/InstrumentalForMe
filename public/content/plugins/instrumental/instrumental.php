<?php

/*
PLugin Name: Instrumental
Description: Instrumental plugin 
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
