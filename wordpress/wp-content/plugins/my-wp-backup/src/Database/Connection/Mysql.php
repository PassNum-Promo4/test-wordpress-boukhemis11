<?php
namespace MyWPBackup\Database\Connection;

class Mysql extends Connection {
	function connect() {
		$this->connection = @mysql_connect( $this->raw_host, $this->username, $this->password );
		if ( ! $this->connection ) {
			error_log( 'Couldn\'t connect to the database: ' . mysql_error() );
		}
		$select_db_res = mysql_select_db( $this->name, $this->connection );
		if ( ! $select_db_res ) {
			error_log( "Couldn't select database: " . mysql_error( $this->connection ) );
		}

		return true;
	}

	function query( $q ) {
		if ( ! $this->connection ) {
			$this->connect();
		}
		$res = mysql_query( $q );
		if ( ! $res ) {
			error_log( 'SQL error: ' . mysql_error( $this->connection ) );
		}

		return $res;
	}

	function fetch_numeric( $query ) {
		return $this->fetch( $query, MYSQL_NUM );
	}

	function fetch( $query, $result_type = MYSQL_ASSOC ) {
		$result = $this->query( $query );
		$return = array();
		while ( $row = mysql_fetch_array( $result, $result_type ) ) {
			$return[] = $row;
		}

		return $return;
	}

	function escape( $value ) {
		if ( is_null( $value ) ) {
			return 'NULL';
		}

		return "'" . mysql_real_escape_string( $value ) . "'";
	}

	function escape_like( $search ) {
		return str_replace( array( '_', '%' ), array( '\_', '\%' ), $search );
	}

	function get_var( $sql ) {
		$result = $this->query( $sql );
		$row    = mysql_fetch_array( $result );

		return $row[0];
	}

	function fetch_row( $data ) {
		return mysql_fetch_assoc( $data );
	}
}
