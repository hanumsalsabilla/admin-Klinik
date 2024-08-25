<?php
require_once "dbconn/dbconn.php";
if (function_exists($_GET['function'])) {
    $_GET['function']();
}
function get_obat()
{
    //query semua data obat
    global $connect;
    $query = $connect->query("SELECT * FROM tb_obat");
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

function getobat_byid()
{
    global $connect;
    $id_obat = $_GET['id_obat'];
    $query = $connect->query("SELECT * FROM tb_obat WHERE `id_obat`='$id_obat'");
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
