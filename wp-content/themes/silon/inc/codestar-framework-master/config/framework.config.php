<?php if ( ! defined( 'ABSPATH' ) ) { die; }


/**
 *
 *FRAMEWORK SETTINGS
 * 
 */

$settings           = array(
  'menu_title'      => 'Silon  option',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'cs-framework',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => 'Silon Framework <small>by Silon</small>',
);

/**
 *
 * FRAMEWORK OPTIONS
 * 
 */
$options        = array();

/**
 *
 *Home page Promo
 * 
 */
$options[]      = array(
  'name'        => 'homepage',
  'title'       => 'Homepage',
  'icon'        => 'fa fa-home',

  // begin: fields
  'fields'      => array(

    
    array(
      'id'      => 'promo_title',
      'type'    => 'text',
      'title'   => 'Promo area Title',
      'default' => 'Well come home page',
      'help'    => 'Type your promo title',
    ),
    
    array(
      'id'      => 'promo_content',
      'type'    => 'textarea',
      'title'   => 'Promo area Comntent',
      'help'    => 'Type your promo Comntent',
    ),

  ),
);

/**
 *
 *Header Options
 * 
 */
$options[]      = array(
  'name'        => 'header',
  'title'       => 'Header Options',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

    // begin: a field
    array(
      'id'      => 'enable_header_top',
      'type'    => 'switcher',
      'title'   => 'Enable Header top?',
      'default' => 'Well come home page',
      'help'    => 'if you want to use header top arae ,turn is on',
      'default' => 'true',
    ),
    array(
      'id'             =>'header_links',
      'type'           =>'group',
      'title'          =>'header area links',
      'button_title'   => 'Add New',
      'accordion_title'=>'Add new Links',
      'dependency'     => array('enable_header_top' , '==' ,  'true'),
      'fields'         =>array(
        array(
            'id'    =>'linktext',
            'type'  =>'text',
            'title' =>'link text',
        ),
        array(

            'id'    =>'icon',
            'type'  =>'icon',
            'title' =>'Icon',
        ),
        array(
          
            'id'    =>'link',
            'type'  =>'text',
            'title' =>'Link',
        ),
        array(

            'id'    =>'link_target',
            'type'  =>'select',
            'title' =>'Link Target',
            'options' =>array(
              '_self' =>'Open in same tab',
              '_blank'=>'Open in new tab'
            )
        )
      ) 
    ),
   
   
  ), // end: fields
);
   
   /**
 *
 *Social Options
 * 
 */
$options[]      = array(
  'name'        => 'social_links',
  'title'       => 'Social Options',
  'icon'        => 'fa fa-share-alt-square',

  // begin: fields
  'fields'      => array(

    
    array(
      'id'             =>'social_links',
      'type'           =>'group',
      'title'          =>'Social area links',
      'button_title'   => 'Add New',
      'accordion_title'=>'Add new Social Links',
      'fields'         =>array(
        array(
            'id'    =>'social_link_text',
            'type'  =>'text',
            'title' =>'link text',
        ),
        array(

            'id'    =>'social_icon',
            'type'  =>'icon',
            'title' =>'Icon',
        ),
        array(
          
            'id'    =>'link',
            'type'  =>'text',
            'title' =>'Link',
        ),
        array(

            'id'    =>'link_target',
            'type'  =>'select',
            'title' =>'Link Target',
            'options' =>array(
              '_self' =>'Open in same tab',
              '_blank'=>'Open in new tab'
            )
        )
      ) 
    ),
   
   
  ), // end: fields
);
// ------------------------------
// license                      -
// ------------------------------
$options[]   = array(
  'name'     => 'license_section',
  'title'    => 'License',
  'icon'     => 'fa fa-info-circle',
  'fields'   => array(

    array(
      'type'    => 'heading',
      'content' => '100% GPL License, Yes it is free!'
    ),
    array(
      'type'    => 'content',
      'content' => 'Codestar Framework is <strong>free</strong> to use both personal and commercial. If you used commercial, <strong>please credit</strong>. Read more about <a href="http://www.gnu.org/licenses/gpl-2.0.txt" target="_blank">GNU License</a>',
    ),

  )
);

CSFramework::instance( $settings, $options );
