<?php
require_once "dbconn/dbconn.php";

if (function_exists($_GET['function'])) {
    $_GET['function']();
}
//restapi untuk register
function register()
{
    global $connect;
    $check = array('password' => '', 'nama' => '', 'email' => '');
    //check match
    $check_match = count(array_intersect_key($_POST, $check));
    if ($check_match == count($check)) {
        $result = mysqli_query($connect, "INSERT INTO tb_user SET
            password =  '$_POST[password]',
            nama = '$_POST[nama]',
            email = '$_POST[email]'
            ");
        if ($result) {
            $response = array(
                'status' => 1,
                'message' => 'Insert Success'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Insert Failed.'
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Wrong Parameter'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
