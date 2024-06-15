<?php
add_action('admin_menu', 'my_menu_page_user_data');

function my_menu_page_user_data()
{
    // Your menu page content code goes here
    add_menu_page(
        'ثبت نام',
        'فرم ثبت نام',
        'manage_options',
        'my-menu',
        'add_user_data_form_ajax',
    );
}
function add_user_data_form_ajax()
{
    include  WPA_PLUGIN_VIEW . 'admin/users-list.php';
}
