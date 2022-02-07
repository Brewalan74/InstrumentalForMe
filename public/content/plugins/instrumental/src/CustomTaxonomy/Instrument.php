<?php

namespace Instrumental\CustomTaxonomy;

class Instrument
{
    public function __construct()
    {
        register_taxonomy(
            'instrument',   // idenfiant de la taxonomy

            'teacher-profile',

            [
                'show_in_rest' => true,
                'label' => 'Instrument',
                'hierarchical' => true,
                'public' => true
            ]
        );
    }
}
