<?php
// homepage settings
function theme_customizer($wp_customize) {
    $wp_customize->add_section(
        'sec_front_page', array(
            'title'         => 'Products Settings',
            'description'   => 'Front page section'
        )
    );
        //Product qty number
        $wp_customize->add_setting(
            'set_popular_prod_max_num', array (
                'type'              => 'theme_mod',
                'default'            => '',
                'sanitize_callback' => 'absint'
            )
        );

        $wp_customize->add_control(
            'set_popular_prod_max_num', array (
                'label'         => 'Max number of popular products',
                'descrption'    => 'How many popular products you want to display',
                'section'       => 'sec_front_page',
                'type'          => 'number'
            )
        );

        //Product column number
        $wp_customize->add_setting(
            'sec_column_max_num', array (
                'type'              => 'theme_mod',
                'default'            => '',
                'sanitize_callback' => 'absint'
            )
        );

        $wp_customize->add_control(
            'sec_column_max_num', array (
                'label'         => 'Max number of columns',
                'descrption'    => 'How many columns you want to display',
                'section'       => 'sec_front_page',
                'type'          => 'number'
            )
        );

    // Deal of the week customizer
    $wp_customize->add_section(
        'sec_deal_of_the_week', array(
            'title'         => 'Deal of the Week Settings',
            'description'   => 'Front page section'
        )
    );
            // Checkbox to unmark the deal of the week section
            $wp_customize->add_setting(
                'set_deal_checkbox', array (
                    'type'              => 'theme_mod',
                    'default'            => '',
                    'sanitize_callback' => 'checkbox_sanitizer'
                )
            );
    
            $wp_customize->add_control(
                'set_deal_checkbox', array (
                    'label'         => 'Show Section',
                    'section'       => 'sec_deal_of_the_week',
                    'type'          => 'checkbox'
                )
            );    


            // Deal of the week settings
            $wp_customize->add_setting(
                'set_deal', array (
                    'type'              => 'theme_mod',
                    'default'            => '',
                    'sanitize_callback' => 'absint'
                )
            );
    
            $wp_customize->add_control(
                'set_deal', array (
                    'label'         => 'Product ID',
                    'descrption'    => 'put product ID',
                    'section'       => 'sec_deal_of_the_week',
                    'type'          => 'number'
                )
            );
}

add_action('customize_register', 'theme_customizer');

function checkbox_sanitizer($checked) {
    return ((isset($checked) && true == $checked ? true : false));
}