<?php
require_once "dbconn/dbconn.php";

if (function_exists($_GET['function'])) {
    $_GET['function']();
}


//Insert Pesanan
function insert_pesanan()
{
    global $connect;
    $check = array('total' => '', 'detail' => '', 'status' => '', 'id_pasien' => '');
    $check_match = count(array_intersect_key($_POST, $check));
    if ($check_match == count($check)) {
        $result = mysqli_query($connect, "INSERT INTO tb_pengiriman SET
        total = '$_POST[total]',
        detail = '$_POST[detail]',
        status = '$_POST[status]',
        id_pasien = '$_POST[id_pasien]'
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
//select pesanan belum selesai berdasarkan id_pasien
function select_pesanan_belum_selesai()
{

    global $connect;
    $id_pasien = $_GET['id_pasien'];
    $query = $connect->query("SELECT * FROM tb_pengiriman WHERE `id_pasien`='$id_pasien' AND status = '0'");
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

//select pesanan selesai berdasarkan id_pasien
function select_pesanan_selesai()
{

    global $connect;
    $id_pasien = $_GET['id_pasien'];
    $query = $connect->query("SELECT * FROM tb_pengiriman WHERE `id_pasien`='$id_pasien' AND status = '1'");
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
function selesaiPesanan()
{
    global $connect;
    $check = array('id_pengiriman' => '');
    $check_match = count(array_intersect_key($_POST, $check));
    if ($check_match == count($check)) {
        $result = mysqli_query($connect, "UPDATE tb_pengiriman SET status = '1' WHERE id_pengiriman = '$_POST[id_pengiriman]'");
        if ($result) {
            $response = array(
                'status' => 1,
                'message' => 'Update Success'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Update Failed.'
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