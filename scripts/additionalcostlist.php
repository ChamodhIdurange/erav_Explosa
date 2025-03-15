

<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
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
$table = 'tbl_additional_cost';

// Table's primary key
$primaryKey = 'idtbl_additional_cost';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => '`u`.`idtbl_additional_cost`', 'dt' => 'idtbl_additional_cost', 'field' => 'idtbl_additional_cost'),
    array('db' => '`u`.`costtype`', 'dt' => 'costtype', 'field' => 'costtype'),
    array('db' => '`u`.`description`', 'dt' => 'description', 'field' => 'description'),
    array('db' => '`u`.`status`', 'dt' => 'status', 'field' => 'status') // Include status for the action column
);

// SQL server connection information
require('config.php');
$sql_details = array(
    'user' => $this->db->username,
    'pass' => $this->db->password,
    'db'   => $this->db->database,
    'host' => $this->db->hostname
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

// require( 'ssp.class.php' );
require('ssp.customized.class.php' );

$joinQuery = "FROM `tbl_additional_cost` AS `u`";
$extraWhere = "`u`.`status` != 3";

echo json_encode(
    SSP::simple($_POST, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere));
