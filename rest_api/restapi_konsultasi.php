<?php



require_once "dbconn/dbconn.php";
if (function_exists($_GET['function'])) {
    $_GET['function']();
}
//SignUp Pasien
function insert_konsultasi()
{
    global $connect;
    $check = array('id_jadwal' => '', 'status' => '', 'id_pasien' => '');
    $check_match = count(array_intersect_key($_POST, $check));

    //Mengecek Antriannya
    $id_jadwal = $_POST['id_jadwal'];
    //count data antrian
    $query = "SELECT COUNT(*) AS total FROM tb_konsultasi WHERE id_jadwal = '$id_jadwal'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];

    //inisialisasi
    $antrian = 0;
    if ($total == 0) {
        $antrian = 1;
    } else {
        $query = "SELECT MAX(antrian) AS antrian FROM tb_konsultasi WHERE id_jadwal = '$id_jadwal'";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_array($result);
        $antrian = $row['antrian'] + 1;
    }
    //Maksimal 10 Antrian Jika sudah 10 Otomatis TOLAK!
    if ($antrian > 10) {
        $response["success"] = 0;
        $response["message"] = "Antrian Penuh";
        echo json_encode($response);
    } else {
        if ($check_match == count($check)) {
            $result = mysqli_query($connect, "INSERT INTO tb_konsultasi SET
id_jadwal = '$_POST[id_jadwal]',
status = '$_POST[status]',
id_pasien= '$_POST[id_pasien]',
antrian = '$antrian'
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
}
function batalkan()
{
    global $connect;
    $check = array('id_konsultasi' => '');
    $check_match = count(array_intersect_key($_POST, $check));
    if ($check_match == count($check)) {
        $result = mysqli_query($connect, "DELETE FROM tb_konsultasi WHERE id_konsultasi = '$_POST[id_konsultasi]'");
        if ($result) {
            $response = array(
                'status' => 1,
                'message' => 'Delete Success'
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'Delete Failed.'
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
function selesai()
{
    global $connect;
    $check = array('id_konsultasi' => '');
    $check_match = count(array_intersect_key($_POST, $check));
    if ($check_match == count($check)) {
        $result = mysqli_query($connect, "UPDATE tb_konsultasi SET status = '1' WHERE id_konsultasi = '$_POST[id_konsultasi]'");
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
function  konfirmasi()
{
    global $connect;
    $id_pasien = $_GET['id_pasien'];
    $id_jadwal = $_GET['id_jadwal'];

    $query = $connect->query("SELECT * FROM tb_konsultasi WHERE id_jadwal = '$id_jadwal' AND id_pasien = '$id_pasien' ORDER BY id_konsultasi DESC LIMIT 1");
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
function getData_byidKonsultasi()
{
    global $connect;
    $id_konsultasi = $_GET['id_konsultasi'];

    $query = $connect->query("SELECT * FROM tb_konsultasi WHERE id_konsultasi = '$id_konsultasi'");
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

//mendapatkan data konsultasi yang belum selesai
function getKonsultasiBelum()
{
    global $connect;
    $id_pasien = $_GET['id_pasien'];
    $query = $connect->query("SELECT * FROM tb_konsultasi JOIN tb_jadwal ON tb_konsultasi.id_jadwal = tb_jadwal.id_jadwal JOIN tb_dokter ON tb_jadwal.id_dokter = tb_dokter.id_dokter WHERE id_pasien = '$id_pasien' AND status = '0'");
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
//mendapatkan data konsultasi yang sudah selesai
function getKonsultasiSudah()
{
    global $connect;
    $id_pasien = $_GET['id_pasien'];
    //mendapatkan jadwal dan nama dokter
    //join table tb_jadwal dan tb_dokter
    $query = $connect->query("SELECT * FROM tb_konsultasi JOIN tb_jadwal ON tb_konsultasi.id_jadwal = tb_jadwal.id_jadwal JOIN tb_dokter ON tb_jadwal.id_dokter = tb_dokter.id_dokter WHERE id_pasien = '$id_pasien' AND status = '1'");

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
//mendapatkan data konsultasi yang sudah selesai di masa lampau
function getKonsultasiSudahLampau()
{
    global $connect;
    $id_pasien = $_GET['id_pasien'];
    $query = $connect->query("SELECT * FROM tb_konsultasiselesai WHERE id_pasien = '$id_pasien'");
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
