<?php

//////////////////////////////////////// custom dashbord widget

function display_dashboard_widget_support()
{

    $widget_content = '
    Carol Burri<br />
    St. Alban-Vorstadt 53a<br />
    CH-4052 Basel<br />
    +41 79 824 05 97<br />
    <a href="mailto:mail@carolburri.com">mail@carolburri.com</a>
    '; // widget content here

    echo $widget_content;
}

function display_dashboard_widget_sample()
{

    $widget_content = 'This is some text with <i>optional html</i>.'; // widget content here

    // return the content you want displayed
    echo $widget_content;
}

//function to setup widget
function add_dashboard_widgets()
{
    // wp_add_dashboard_widget('import', 'Example', 'display_dashboard_widget_sample' );
    wp_add_dashboard_widget('support', 'Support', 'display_dashboard_widget_support');
}

// finally we have to hook our function into the dashboard setup using add_action
add_action('wp_dashboard_setup', 'add_dashboard_widgets');




//////////////////////////////////////// remove default dashbord widgets

function remove_dashboard_widgets()
{
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_welcome_panel']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

//remove welcome panel
function remove_welcome_panel()
{
    remove_action('welcome_panel', 'wp_welcome_panel');
    $user_id = get_current_user_id();
    if (0 !== get_user_meta($user_id, 'show_welcome_panel', true)) {
        update_user_meta($user_id, 'show_welcome_panel', 0);
    }
}
add_action('load-index.php', 'remove_welcome_panel');
