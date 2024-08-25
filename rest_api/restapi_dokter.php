<?php

//periksa lagi apakah yang digunakan adalah dokter atau jadwal dokter yaaaaaaa


//jadwal dokter mah get_jadwaldokter() aja sedangkan kalau dokter get_dokter() aja

//kalau mau get dokter by id getdokter_byid() sedangkan kalau jadwal dokter getjadwaldokter_byid()

require_once "dbconn/dbconn.php";
if (function_exists($_GET['function'])) {
    $_GET['function']();
}
//Query semua data dokter
function get_dokter()
{
    global $connect;
    $query = $connect->query("SELECT * FROM tb_dokter");
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


function getdokter_byid()
{
    global $connect;
    $id_dokter = $_GET['id_dokter'];
    $query = $connect->query("SELECT * FROM tb_dokter WHERE `id_dokter`='$id_dokter'");
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

//Query semua data jadwal dokter
function get_jadwaldokter()
{
    global $connect;
    $query = $connect->query("SELECT * FROM tb_jadwal");
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
//Query jadwal dokter byid
function getjadwaldokter_byid()
{
    global $connect;
    $id_jadwal = $_GET['id_jadwal'];
    $query = $connect->query("SELECT * FROM tb_jadwal WHERE `id_jadwal`='$id_jadwal'");
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
function getjadwaldokter_byiddokter()
{
    global $connect;
    $id_dokter = $_GET['id_dokter'];
    $query = $connect->query("SELECT * FROM tb_jadwal WHERE `id_dokter`='$id_dokter'");
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
