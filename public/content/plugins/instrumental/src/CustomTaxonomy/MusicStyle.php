<?php

namespace Instrumental\CustomTaxonomy;


class MusicStyle
{
    public function __construct()
    {

        // IMPORTANT TAXONOMY création d'une taxonomy custom
        // DOC register_taxonomy https://developer.wordpress.org/reference/functions/register_taxonomy/

        register_taxonomy(
            'music-style',   // idenfiant de la taxonomy
            ['profile-teacher', 'profile-student'],   // la taxonomy technologie peut s'appliquer sur les CPT developer-profile et project
            [
                'show_in_rest' => true, // la taxonomy est accessible en mode API ; nécessaire pour l'éditeur de bloc (Gutemberg)
                'label' => 'Style de musique',
                'hierarchical' => true, // les technologies peuvent avoir des "technologies enfantes"
                'public' => true // la taxonomy est administrable depuis le backoffice de wp
            ]
        );

    }
}
