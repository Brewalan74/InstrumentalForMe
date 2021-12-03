<?php

namespace InstrumentalDisplay;

use InstrumentalDisplay\Models\RatingModel;



class Plugin extends \Instrumental\Plugin
{

    public function getCPTDescriptors()
    {
        // appel de la méthode getCPTDescriptors de la classe parent : \WDL\Plugin
        parent::getCPTDescriptors();

        return [
            'pet' => [
                'label' => 'Pets',
                'menu_icon' => 'dashicons-cat'
            ],
            'holliday' => [
                'label' => 'Hollidays',
                'menu_icon' => 'dashicons-arrow-up'
            ],
        ];
    }

    protected function getTaxonomiesDescriptors()
    {
        parent::getTaxonomiesDescriptors();

        return [
            'specie' => [
                'customPostTypes' => ['pet'],
                'label' => 'Species',
                'hierarchical' => false,
                'defaultTerms' => [
                    'Dog',
                    'Cat',
                    'Bird',
                    'Fish',
                ]
            ],
            'has-disease' => [
                'customPostTypes' => ['pet'],
                'label' => 'Diseases',
                'hierarchical' => false
            ]
        ];
    }

    public function getCustomTablesNames()
    {
        return [
            RatingModel::class,
        ];
    }
}
