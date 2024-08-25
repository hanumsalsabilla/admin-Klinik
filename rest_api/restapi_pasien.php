<?php
require_once "dbconn/dbconn.php";

if (function_exists($_GET['function'])) {
    $_GET['function']();
}

//Login Pasien
function login_pasien()
{
    global $connect;
    $username = $_GET['username'];
    $password = $_GET['password'];
    $loginqry = $connect->query("SELECT * FROM `tb_pasien` WHERE `username`='$username' AND `password`='$password'");
    while ($row = mysqli_fetch_object($loginqry)) {
        $data[] = $row;
    }
    $response = array(
        'status' => 1,
        'message' => 'success',
        'data' => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}

function pasienById()
{
    global $connect;
    $username = $_GET['id_pasien'];
    $loginqry = $connect->query("SELECT * FROM `tb_pasien` WHERE `id_pasien`='$id_pasien'");
    while ($row = mysqli_fetch_object($loginqry)) {
        $data[] = $row;
    }
    $response = array(
        'status' => 1,
        'message' => 'success',
        'data' => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}


//Mendapat semua data Pasien
function get_pasien()
{
    global $connect;
    $query = $connect->query("SELECT * FROM tb_pasien");
    while ($row = mysqli_fetch_object($query)) {
        $data[] = $row;
    }
    $response = array(
        'status' => 1,
        'message' => 'success',
        'data' => $data
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}

//SignUp Pasien
function insert_pasien()
{
    global $connect;
    $check = array('username' => '', 'password' => '', 'nama' => '', 'tgl_lahir' => '', 'jenkel' => '', 'no_hp' => '', 'alamat' => '');
    $check_match = count(array_intersect_key($_POST, $check));
    //cek apakah si user sudah ada atau belum
    $cekuser = mysqli_query($connect, "SELECT * FROM tb_pasien WHERE username = '$_POST[username]'");

    if (mysqli_num_rows($cekuser) > 0) {
        $response = array(
            'status' => 0,
            'message' => 'Username Sudah Ada'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    if ($check_match == count($check)) {
        $result = mysqli_query($connect, "INSERT INTO tb_pasien  SET
            username = '$_POST[username]',
            password = '$_POST[password]',
            nama = '$_POST[nama]',
            tgl_lahir = '$_POST[tgl_lahir]',
            jenkel = '$_POST[jenkel]',
            no_hp = '$_POST[no_hp]',
            alamat = '$_POST[alamat]'");

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

//update Pasien
function update_pasien()
{
    global $connect;
    if (!empty($_GET["id"])) {
        $id = $_GET["id"];
    }
    if (!empty($_GET['usernamelama'])) {
        $usernamelama = $_GET['usernamelama'];
    }
    $check = array('username' => '', 'password' => '', 'nama' => '', 'tgl_lahir' => '', 'jenkel' => '', 'no_hp' => '', 'alamat' => '');
    $check_match = count(array_intersect_key($_POST, $check));
    //cek apakah si user sudah ada atau belum
    $cekuser = mysqli_query($connect, "SELECT * FROM tb_pasien WHERE username = '$_POST[username]'");

    if (mysqli_num_rows($cekuser) > 0 && $usernamelama != $_POST['username']) {
        $response = array(
            'status' => 0,
            'message' => 'Username Sudah Ada'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    if ($check_match == count($check)) {

        $result = mysqli_query($connect, "UPDATE tb_pasien SET   
        username = '$_POST[username]',
            password = '$_POST[password]',
            nama = '$_POST[nama]',
            tgl_lahir = '$_POST[tgl_lahir]',
            jenkel = '$_POST[jenkel]',
            no_hp = '$_POST[no_hp]',
            alamat = '$_POST[alamat]'            
        WHERE id_pasien = $id");

        if ($result) {
            $response = array(
                'status' => 1,
                'message' => 'Update Success'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Update Failed'
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Wrong Parameter',
            'data' => $id
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}



//delete Pasien
function delete_pasien()
{
    global $connect;
    $id = $_GET['id'];
    $query = "DELETE FROM tb_pasien WHERE id_pasien=" . $id;
    if (mysqli_query($connect, $query)) {
        $response = array(
            'status' => 1,
            'message' => 'Delete Success'
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Delete Fail.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
