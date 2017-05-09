<?php

    /**
     *	Default dynamic Options
     */

    $cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'options' ), array(
        'header-height'                 => array(
            'input' => array(
                'type'      => 'number',
                'default'   => 900
            )
        ),
        'header-horizontal-align'       => array(
            'input' => array(
                'type'      => 'attr',
                'default'   => 'center'
            )
        ),
        'header-text-space'             => array(
            'input' => array(
                'type'      => 'number',
                'default'   => 450
            )
        ),
        'header-text-vertical-align'    => array(
            'input' => array(
                'type'      => 'attr',
                'default'   => 'bottom'
            )
        ),
        'header-btns-space'             => array(
            'input' => array(
                'type'      => 'number',
                'default'   => 450
            )
        ),
        'header-btns-vertical-align'    => array(
            'input' => array(
                'type'      => 'attr',
                'default'   => 'top'
            )
        )
    ));

    tempo_cfgs::set( 'options', $cfgs );
?>
