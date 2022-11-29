<?php

add_action('admin_init', 'my_general_section'); 
function my_general_section() {  
    add_settings_section(  
        'my_settings_section', // Section ID 
        'Wooomcerce New Order Email content', // Section Title
        'my_section_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Option 1
        'option_1', // Option ID
        'Option 1', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'option_1' // Should match Option ID
        )  
    ); 
    register_setting('general','option_1', 'esc_attr');
}


function my_section_options_callback() { // Section Callback
    echo '<p>A little message on editing info</p>';  
}

function my_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    $_campaign_description = get_option('woomcececusotmeremail');
    echo wp_editor( $_campaign_description, 'woomcececusotmeremail',array('textarea_name' => 'woomcececusotmeremail','media_buttons' => false,'editor_height' => 350,'teeny' => true)  );;
}

?>
