<?php

$table = 'datatables_demo';

// Table's primary key
$primaryKey = 'id';

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
	array( 'db' => 'first_name', 'dt' => 'first_name' ),
	array( 'db' => 'last_name',  'dt' => 'last_name' ),
	array( 'db' => 'position',   'dt' => 'position' ),
	array( 'db' => 'office',     'dt' => 'office' ),
	array(
		'db'        => 'start_date',
		'dt'        => 'start_date',
		'formatter' => function( $d, $row ) {
			return date( 'jS M y', strtotime($d));
		}
	),
	array(
		'db'        => 'salary',
		'dt'        => 'salary',
		'formatter' => function( $d, $row ) {
			return '$'.number_format($d);
		}
	)
);

$sql_details = array(
	'user' => '',
	'pass' => '',
	'db'   => '',
	'host' => ''
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);

