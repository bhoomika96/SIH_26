<?php



$table = 'datatables_demo';

// Table's primary key
$primaryKey = 'id';

$columns = array(
	array( 'db' => 'first_name', 'dt' => 0 ),
	array( 'db' => 'last_name',  'dt' => 1 ),
	array( 'db' => 'position',   'dt' => 2 ),
	array( 'db' => 'office',     'dt' => 3 ),
	array(
		'db'        => 'start_date',
		'dt'        => 4,
		'formatter' => function( $d, $row ) {
			return date( 'jS M y', strtotime($d));
		}
	),
	array(
		'db'        => 'salary',
		'dt'        => 5,
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


require( 'ssp.class.php' );

// Validate the JSONP to make use it is an okay Javascript function to execute
$jsonp = preg_match('/^[$A-Z_][0-9A-Z_$]*$/i', $_GET['callback']) ?
	$_GET['callback'] :
	false;

if ( $jsonp ) {
	echo $jsonp.'('.json_encode(
		SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
	).');';
}

