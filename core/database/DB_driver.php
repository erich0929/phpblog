<?php if (!defined ('BASEPATH')) exit ('Direct access is not allowed!');

// DB_driver is a abstract class.
// It's designed by template method.

// someDB_driver should override these methods.
// function db_connect ()
// function db_select ()
// function _execute ()
// function trans_begin ()
// function trans_commit ()
// function trans_rollback ()
// function affected_rows ()
// function _close ()

class HG_db_driver {

	var $username;
	var $password;
	var $hostname;
	var $database;
	var $dbdriver		= 'mysql';
	var $dbprefix		= '';
	var $char_set		= 'utf8';
	var $dbcollat		= 'utf8_general_ci';

	var $_trans_depth	= 0;
	var $trans_status	= TRUE;

	function __construct ($params) {
		if (is_array ($params)) {
			foreach ($params as $key => $value) {
				$this -> $key = $value;
			}
		} else {
			console_log ('[Runtime ERROR] Failed to create DB_driver.', __FILE__ , __LINE__ );
		}
	}

	function initialize () {

		// if connection is already estabilshed, return true;
		if (is_resource ($this -> conn_id) OR is_object ($this -> conn_id)) {
			console_log ('[WARNING] Connection is already estabilshed', __FILE__, __LINE__);
			return TRUE;
		}

		// Connect to database;
		$this -> conn_id = $this -> db_connect ();

		if (! $this -> conn_id ) {
			console_log ('[Runtime ERROR] Failed to connect to DB', __FILE__, __LINE__);
		}
	}

	function query ($sql) {
		if ($sql == '') {
			console_log ('[Runtime ERROR] Request query string is empty.', __FILE__, __LINE__);
			return FALSE;
		}

		//TODO : cache execution .

		// Run the query .
		if (FALSE === ($result_id = $this -> simple_query ($sql))) {
			console_log ('[Runtime ERROR] Failed to execute the query.'. 'SQL : ' . $sql, __FILE__, __LINE__);
			$this -> trans_status = FALSE;
			return FALSE;
		}

		if ($this -> is_write_type ($sql)) {
			return TRUE;
		} else {
			return $result_id;
		}

	}

	function fetch_row ($result_id) {
		return $this -> _fetch_row ($result_id);	
	}

	function fetch_assoc ($result_id) {
		return $this -> _fetch_assoc ($result_id);
	}

	function simple_query ($sql) {
		if ( ! $this -> conn_id ) {
			$this -> initialize ();
		}
		return $this -> _execute ($sql);
	}

	function is_write_type($sql)
	{
		if ( ! preg_match('/^\s*"?(SET|INSERT|UPDATE|DELETE|REPLACE|CREATE|DROP|TRUNCATE|LOAD DATA|COPY|ALTER|GRANT|REVOKE|LOCK|UNLOCK)\s+/i', $sql))
		{
			return FALSE;
		}
		return TRUE;
	}

	function trans_start () {
		if ($this->_trans_depth > 0)
		{
			$this->_trans_depth += 1;
			return;
		}
		console_log ("[DB DRIVER] Transaction start.", __FILE__, __LINE__, FALSE);
		$this->trans_begin();
	}

	function trans_complete () {
		if ($this->_trans_depth > 0)
		{
			$this->_trans_depth -= 1;
			return;
		}

		if ($this -> trans_status == FALSE) {
			console_log ("[DB DRIVER] Transaction status is false. So call rollback!", __FILE__, __LINE__, FALSE);
			$this -> trans_rollback ();
			return FALSE;
		}
		console_log ("[DB DRIVER] Transaction status is true. So call commit!", __FILE__, __LINE__, FALSE);
		$this-> trans_commit ();
		return TRUE;
	}


	function platform () {
		return $this -> dbdriver;
	}
} 


?>