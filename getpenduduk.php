<?php
#Build SQL SELECT statement and return the geometry as a GeoJSON element
// $host = 'localhost';
// $dbname = 'suratseksipem';
// $user = 'root';
// $pass = '';
// $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
// //$db = new PDO('sqlite:leaflet.sqlite');
// $sql = "SELECT * FROM t_penduduk;";
//
// $rs = $db->query($sql);
// if (!$rs) {
//     echo "An SQL error occured.\n";
//     exit;
// }
//
// $rows = array();
// while($r = $rs->fetch(PDO::FETCH_ASSOC)) {
//     $rows[] = $r;
// }
// print json_encode($rows);
// $db = NULL;



/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'v_kk';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier - in this case object
// parameter names
$columns = array(
    array(
        'db' => 'id',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
            // Technically a DOM id cannot start with an integer, so we prefix
            // a string. This can also be useful if you have multiple tables
            // to ensure that the id is unique with a different prefix
            return 'row_'.$d;
        }
    ),
    array( 'db' => 'nokk', 'dt' => 'nokk' ),
    array( 'db' => 'nik_kepala_keluarga',  'dt' => 'nik_kepala_keluarga' ),
    array( 'db' => 'nama',   'dt' => 'nama' ),
    array( 'db' => 'tempat_lhr',     'dt' => 'tempat_lhr' ),
    array( 'db' => 'tgl_lhr',     'dt' => 'tgl_lhr' ),
    array( 'db' => 'alamat',     'dt' => 'alamat' ),
    array( 'db' => 'rt_rw',     'dt' => 'rt_rw' ),
    // array(
    //     'db'        => 'start_date',
    //     'dt'        => 'start_date',
    //     'formatter' => function( $d, $row ) {
    //         return date( 'jS M y', strtotime($d));
    //     }
    // ),
    //suami
    array(
        'db'        => 'Suami',
        'dt'        => 'Suami',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'nik_suami',
        'dt'        => 'nik_suami',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'tempat_lhr_suami',
        'dt'        => 'tempat_lhr_suami',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'tgl_lhr_suami',
        'dt'        => 'tgl_lhr_suami',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    //isteri
    array(
        'db'        => 'Isteri',
        'dt'        => 'Isteri',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'nik_isteri',
        'dt'        => 'nik_isteri',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'tempat_lhr_isteri',
        'dt'        => 'tempat_lhr_isteri',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'tgl_lhr_isteri',
        'dt'        => 'tgl_lhr_isteri',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    //anak1
    array(
        'db'        => 'anak_pertama',
        'dt'        => 'anak_pertama',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'nik_anak1',
        'dt'        => 'nik_anak1',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'tempat_lhr_anak1',
        'dt'        => 'tempat_lhr_anak1',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'tgl_lhr_anak1',
        'dt'        => 'tgl_lhr_anak1',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    //anak2
    array(
        'db'        => 'anak_kedua',
        'dt'        => 'anak_kedua',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'nik_anak2',
        'dt'        => 'nik_anak2',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'tempat_lhr_anak2',
        'dt'        => 'tempat_lhr_anak2',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'tgl_lhr_anak2',
        'dt'        => 'tgl_lhr_anak2',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    //anak3
    array(
        'db'        => 'anak_ketiga',
        'dt'        => 'anak_ketiga',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'nik_anak3',
        'dt'        => 'nik_anak3',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'tempat_lhr_anak3',
        'dt'        => 'tempat_lhr_anak3',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'tgl_lhr_anak3',
        'dt'        => 'tgl_lhr_anak3',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    //famili
    array(
        'db'        => 'famili',
        'dt'        => 'famili',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'nik_famili',
        'dt'        => 'nik_famili',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'tempat_lhr_famili',
        'dt'        => 'tempat_lhr_famili',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
    array(
        'db'        => 'tgl_lhr_famili',
        'dt'        => 'tgl_lhr_famili',
        'formatter' => function( $d, $row ) {
            return ($d);
        }
    ),
);

$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'suratseksipem',
    'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>
