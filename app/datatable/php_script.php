<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library

include( "Editor/php/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'datatables_demo','id')
	->fields(
		Field::inst( 'first_name' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'last_name' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'email' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'position' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'office' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'salary' )->validator( 'Validate::notEmpty' ),
		Field::inst( 'extn' ),
		Field::inst( 'start_date' )
			->validator( 'Validate::dateFormat', array(
				"format"  => Format::DATE_ISO_8601,
				"message" => "Please enter a date in the format yyyy-mm-dd"
			) )
			->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
			->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 )
	)
	->process( $_POST )
	->json();

	  echo app_path();