<?php
add_action('wp_ajax_add_students', 'add_students');
add_action('wp_ajax_delete_student', 'delete_student');
add_action('wp_ajax_select_student', 'select_student');
add_action('wp_ajax_update_students', 'update_students');
function all_users()
{
    global $wpdb;

    $table = $wpdb->prefix . 'yas_students';
    $stmt = $wpdb->get_results("SELECT*FROM $table");

    if ($stmt) {
        return $stmt;
    }
    return false;
}
function add_students()
{
    global $wpdb;

    $table = $wpdb->prefix . 'yas_students';
    $name = sanitize_text_field($_POST['firstname']);
    $lastname = sanitize_text_field($_POST['lastname']);
    $mobile = sanitize_text_field($_POST['mobile']);
    $email = sanitize_text_field($_POST['email']);
    $level = intval($_POST['level']);
    $data = [
        'name' => $name,
        'family' => $lastname,
        'mobile' => $mobile,
        'email' => $email,
        'level' => $level

    ];
    $format = ['%s', '%s', '%s', '%s', '%d'];
    $wpdb->insert(
        $table,
        $data,
        $format
    );
}
function update_students()
{
    global $wpdb;

    $table = $wpdb->prefix . 'yas_students';
    $ID = intval($_POST['id']);
    $name = sanitize_text_field($_POST['name']);
    $lastname = sanitize_text_field($_POST['family']);
    $mobile = sanitize_text_field($_POST['mobile']);
    $email = sanitize_text_field($_POST['email']);
    $level = intval($_POST['level']);
    $data = [
        'ID' => $ID,
        'name' => $name,
        'family' => $lastname,
        'mobile' => $mobile,
        'email' => $email,
        'level' => $level

    ];
    $format = ['%d', '%s', '%s', '%s', '%s', '%d'];
    $where = ['ID' => $ID];
    $where_format = ['%d'];
    $stmt = $wpdb->update(
        $table,
        $data,
        $where,
        $format,
        $where_format
    );
    if ($stmt) {
        wp_send_json(['success' => true, 'message' => 'اطلاعات کاربر با موفقیت ویرایش شد'], 200);
    } else {
        wp_send_json(['error' => true, 'message' => 'اطلاعات کاربر  ویرایش نشد'], 403);
    }
}
function delete_student()
{
    global $wpdb;

    $table = $wpdb->prefix . 'yas_students';
    $where = ['ID' => intval($_POST['el'])];
    $where_format = ['%d'];
    $stmt = $wpdb->delete($table, $where, $where_format = null);;
    if ($stmt) {
        wp_send_json(['success' => true, 'message' => 'اطلاعات کاربر با موفقیت حذف شد'], 200);
    } else {
        wp_send_json(['error' => true, 'message' => 'اطلاعات کاربر  ویرایش نشد'], 403);
    }
}
function select_student()
{
    global $wpdb;

    $table = $wpdb->prefix . 'yas_students';
    $ID = intval($_POST['el']);

    $stmt = $wpdb->get_row($wpdb->prepare("SELECT ID,name,family,mobile,email,level FROM $table WHERE ID=%d", $ID));
    $output = [
        'ID' => $stmt->ID,
        'name' => $stmt->name,
        'family' => $stmt->family,
        'mobile' => $stmt->mobile,
        'level' => $stmt->level,
        'email' => $stmt->email,
    ];
    echo json_encode($output);
    wp_die();
}
