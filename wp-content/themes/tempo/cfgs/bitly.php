<?php
    /**
     *	Bitly Related URL Config
     */

    $cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'bitly' ), array(
        // THEMES
        'tempo'	=> array(

            // URL
            'myThem.es' => array(
                'uri-title'         => 'http://mythem.es/?tempo=admin-panel&title=1',
                'uri-description'   => 'http://mythem.es/?tempo=admin-panel&description=1',
                'contact'           => 'http://mythem.es/contact/?tempo=admin-panel',
            ),
            'Tempo'	    => array(
                'uri'               => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?tempo=admin-panel',
                'uri-version'       => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?tempo=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?tempo=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?tempo=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?tempo=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?tempo=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?tempo=admin-panel&button=1',

                'support'	        => 'http://mythem.es/forums/forum/themes/tempo/?tempo=admin-panel',
                'contact'           => 'http://mythem.es/contact/?tempo=admin-panel&item=tempo',
                'bug-report'        => 'http://mythem.es/contact/?tempo=admin-panel&item=tempo&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/tempo/?tempo=admin-panel',
            ),
            'Cronus'	=> array(
                'uri'               => 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?tempo=admin-panel',
                'uri-version'		=> 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?tempo=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?tempo=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?tempo=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?tempo=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?tempo=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?tempo=admin-panel&button=1',

                'support'           => 'http://mythem.es/forums/forum/themes/cronus/?tempo=admin-panel',
                'contact'           => 'http://mythem.es/contact/?tempo=admin-panel&item=cronus',
                'bug-report'        => 'http://mythem.es/contact/?tempo=admin-panel&item=cronus&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/cronus/?tempo=admin-panel',

            ),
            'Sarmys'	=> array(
                'uri'               => 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?tempo=admin-panel',
                'uri-version'		=> 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?tempo=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?tempo=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?tempo=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?tempo=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?tempo=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?tempo=admin-panel&button=1',

                'support'           => 'http://mythem.es/forums/forum/themes/sarmys/?tempo=admin-panel',
                'contact'           => 'http://mythem.es/contact/?tempo=admin-panel&item=sarmys',
                'bug-report'        => 'http://mythem.es/contact/?tempo=admin-panel&item=sarmys&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/sarmys/?tempo=admin-panel',
            ),
        ),

        'cronus'	=> array(

            // URL
            'myThem.es' => array(
                'uri-title'         => 'http://mythem.es/?cronus=admin-panel&title=1',
                'uri-description'   => 'http://mythem.es/?cronus=admin-panel&description=1',
                'contact'           => 'http://mythem.es/contact/?cronus=admin-panel',
            ),
            'Zeon'      => array(
                'uri-childs'        => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?cronus=admin-panel&childs=1',
                'uri-description'   => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?cronus=admin-panel&description=1',
                'uri-image'         => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?cronus=admin-panel&image=1',

            ),
            'Tempo'	    => array(
                'uri'               => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?cronus=admin-panel',
                'uri-version'       => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?cronus=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?cronus=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?cronus=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?cronus=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?cronus=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?cronus=admin-panel&button=1',

                'support'	        => 'http://mythem.es/forums/forum/themes/tempo/?cronus=admin-panel',
                'contact'           => 'http://mythem.es/contact/?cronus=admin-panel&item=tempo',
                'bug-report'        => 'http://mythem.es/contact/?cronus=admin-panel&item=tempo&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/tempo/?cronus=admin-panel',

            ),
            'Cronus'	=> array(
                'uri'               => 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?cronus=admin-panel',
                'uri-version'		=> 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?cronus=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?cronus=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?cronus=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?cronus=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?cronus=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?cronus=admin-panel&button=1',

                'support'           => 'http://mythem.es/forums/forum/themes/cronus/?cronus=admin-panel',
                'contact'           => 'http://mythem.es/contact/?cronus=admin-panel&item=cronus',
                'bug-report'        => 'http://mythem.es/contact/?cronus=admin-panel&item=cronus&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/cronus/?cronus=admin-panel',



            ),
            'Sarmys'	=> array(
                'uri'               => 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?cronus=admin-panel',
                'uri-version'		=> 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?cronus=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?cronus=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?cronus=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?cronus=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?cronus=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?cronus=admin-panel&button=1',

                'support'           => 'http://mythem.es/forums/forum/themes/sarmys/?cronus=admin-panel',
                'contact'           => 'http://mythem.es/contact/?cronus=admin-panel&item=sarmys',
                'bug-report'        => 'http://mythem.es/contact/?cronus=admin-panel&item=sarmys&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/sarmys/?cronus=admin-panel',
            ),
        ),

        'sarmys'	=> array(

            // URL
            'myThem.es' => array(
                'uri-title'         => 'http://mythem.es/?sarmys=admin-panel&title=1',
                'uri-description'   => 'http://mythem.es/?sarmys=admin-panel&description=1',
                'contact'           => 'http://mythem.es/contact/?sarmys=admin-panel',
            ),
            'Zeon'      => array(
                'uri-childs'        => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?sarmys=admin-panel&childs=1',
                'uri-description'   => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?sarmys=admin-panel&description=1',
                'uri-image'         => 'http://mythem.es/item/zeon-wordpress-plugin-extends-tempo-free-wordpress-theme/?sarmys=admin-panel&image=1',
            ),
            'Tempo'	    => array(
                'uri'               => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?sarmys=admin-panel',
                'uri-version'       => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?sarmys=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/tempo-is-the-best-blogging-wordpress-theme/?sarmys=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?sarmys=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?sarmys=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?sarmys=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/tempo-premium-your-best-wordpress-solution/?sarmys=admin-panel&button=1',

                'support'	        => 'http://mythem.es/forums/forum/themes/tempo/?sarmys=admin-panel',
                'contact'           => 'http://mythem.es/contact/?sarmys=admin-panel&item=tempo',
                'bug-report'        => 'http://mythem.es/contact/?sarmys=admin-panel&item=tempo&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/tempo/?sarmys=admin-panel',
            ),
            'Cronus'	=> array(
                'uri'               => 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?sarmys=admin-panel',
                'uri-version'		=> 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?sarmys=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/cronus-free-wordpress-child-theme-of-tempo/?sarmys=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?sarmys=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?sarmys=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?sarmys=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/cronus-premium-wordpress-theme-a-child-theme-of-tempo/?sarmys=admin-panel&button=1',

                'support'           => 'http://mythem.es/forums/forum/themes/cronus/?sarmys=admin-panel',
                'contact'           => 'http://mythem.es/contact/?sarmys=admin-panel&item=cronus',
                'bug-report'        => 'http://mythem.es/contact/?sarmys=admin-panel&item=cronus&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/cronus/?sarmys=admin-panel',
            ),
            'Sarmys'	=> array(
                'uri'               => 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?sarmys=admin-panel',
                'uri-version'		=> 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?sarmys=admin-panel&version=1',
                'uri-image'         => 'http://mythem.es/item/sarmys-is-a-simple-clean-and-creative-free-wordpress-tempo-child-theme/?sarmys=admin-panel&image=1',

                'premium'           => 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?sarmys=admin-panel',
                'premium-faq'       => 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?sarmys=admin-panel&faq=1',
                'premium-features'	=> 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?sarmys=admin-panel&features=1',
                'premium-button'	=> 'http://mythem.es/item/sarmys-premium-creative-futuristic-design-with-powerful-features/?sarmys=admin-panel&button=1',

                'support'           => 'http://mythem.es/forums/forum/themes/sarmys/?sarmys=admin-panel',
                'contact'           => 'http://mythem.es/contact/?sarmys=admin-panel&item=sarmys',
                'bug-report'        => 'http://mythem.es/contact/?sarmys=admin-panel&item=sarmys&bug-report=1',

                'wordpress'	        => 'https://wordpress.org/themes/sarmys/?sarmys=admin-panel',
            ),
        ),
    ));

    tempo_cfgs::set( 'bitly', $cfgs );
?>
