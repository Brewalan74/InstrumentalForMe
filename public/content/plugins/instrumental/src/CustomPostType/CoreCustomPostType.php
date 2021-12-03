<?php

namespace Instrumental\CustomPostType;

class CoreCustomPostType
{

    protected $identifier;
    protected $label;
    protected $icon = 'dashicons-cart';
    
    protected $hierarchical = false;

    protected $supports = [
        'title',
        'excerpt',
        'thumbnail',
        'editor',
        'author',
    ];

    public function __construct()
    {
        register_post_type(
            $this->identifier, // identifiant du custom post type
            [
                'label' => $this->label,
                'show_in_rest' => true,

                'public' => true,

                // Le type "Customer" n'a pas "d'enfants" ; ce choix est arbitraire (pour des questions de simplicité)
                'hierarchical' => $this->hierarchical,


                // icone qui s'affiche dans l'interface d'administration de wordpress
                'menu_icon' =>$this->icon,

                'has_archive' => true,


                // les fonctionnalités activé sur notre type de contenu custom
                'supports' => $this->supports,
        
                // ACL : Access Control List
                'capability_type' => $this->identifier,
                'map_meta_cap' => true,
            ]
        );

    }
}