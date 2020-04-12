<!-- <?php

if (class_exists('CSF')) {
    $theme_options_prefix = 'silon_theme_options';

    CSF::createOptions($theme_options_prefix, [
        'menu_title' => 'Theme Options',
        'framework_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
    ]);

    CSF::createSection($theme_options_prefix, [
        'title' => 'General',
        'fields' => [

            [
                'id' => 'socials',
                'type' => 'group',
                'title' => 'Social Links',
                'button_title' => 'Add New Link',
                'accordion_title' => 'Add New',
                'fields' => [
                    [
                        'id' => 'icon',
                        'type' => 'icon',
                        'title' => 'Select icon',
                    ],
                    [
                        'id' => 'link',
                        'type' => 'text',
                        'title' => 'Link',
                        'desc' => esc_html__('Type social link', 'silon-quickstart'),
                    ],
                ],
            ],

            [
                'id' => 'phone',
                'type' => 'text',
                'title' => 'Phone number',
            ],

        ],
    ]);

    CSF::createSection($theme_options_prefix, [
        'title' => 'Backup',
        'fields' => [
            [
                'id' => 'backup',
                'type' => 'backup',
                'title' => 'Backup',
            ],
        ],
    ]);

    // Metaboxes

    // Page metabox
    $page_metabox_prefix = 'silon_meta';
    CSF::createMetabox($page_metabox_prefix, [
        'title' => 'Options',
        'post_type' => 'page',
        'data_type' => 'serialize',
    ]);

    CSF::createSection($page_metabox_prefix, [
        'fields' => [
            [
                'id' => 'enable_page_title',
                'type' => 'switcher',
                'title' => 'Enable page title?',
                'default' => true,
            ],
            [
                'id' => 'default_padding',
                'type' => 'switcher',
                'title' => 'Enable default padding?',
                'default' => true,
            ],
        ],
    ]);
} else {
    function silon_codestar_install_notice()
    {
        ?>
         <div class="notice notice-warning">
            <p><strong><?php// echo wp_get_theme(); ?></strong> required <strong>Codestar Framework</strong> plugin to be installed and activated on your site.</p>
         </div>
        <?php
}

     add_action('admin_notices', 'silon_codestar_install_notice');
}


include_once 'codestar-framework-master/cs-framework.php';