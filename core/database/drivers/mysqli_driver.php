<?php if (! defined ('BASEPATH')) exit ('Direct access is not allowed !');

// someDB_driver should override these methods.
// function db_connect ()
// function db_select ()
// function _execute ()
// function trans_begin ()
// function trans_commit ()
// function trans_rollback ()
// function affected_rows ()
// function _fetch_assoc ()
// function _fetch_row ()
// function _close ()

class HG_mysqli_driver extends HG_db_driver {
	
	function db_connect () {
		return mysqli_connect ($this -> hostname, $this -> username, $this -> password, $this -> database);
	}

	function _execute ($sql) {
		return mysqli_query ($this -> conn_id, $sql);
	}

	function _fetch_row ($result_id) {
		if (!$result_id) {
			console_log ('[Runtime ERROR] Result resource is not valid.');
		} else {
			return mysqli_fetch_row ($result_id);
		}
	}

	function _fetch_assoc ($result_id) {
		if (!$result_id) {
			console_log ('[Runtime ERROR] Result resource is not valid.', __FILE__, __LINE__);
		} else {
			return mysqli_fetch_assoc ($result_id);
		}
	}

	function trans_begin () {
		if ($this->_trans_depth > 0)
		{
			return TRUE;
		}

		// Reset the transaction failure flag.
		// If the $test_mode flag is set to TRUE transactions will be rolled back
		// even if the queries produce a successful result.
		

		$this->simple_query('SET AUTOCOMMIT=0');
		$this->simple_query('START TRANSACTION'); // can also be BEGIN or BEGIN WORK
		return TRUE;

	}

	function trans_commit () {
		if ($this->_trans_depth > 0)
		{
			console_log ("[DB DRIVER] trans depth > 0", __FILE__, __LINE__, FALSE);
			return TRUE;
		}

		$this->simple_query('COMMIT');
		$this->simple_query('SET AUTOCOMMIT=1');
		return TRUE;
	}

	function trans_rollback () {
		if ($this->_trans_depth > 0)
		{
			return TRUE;
		}

		$this->simple_query('ROLLBACK');
		$this->simple_query('SET AUTOCOMMIT=1');
		return TRUE;

	}

	function _close () {
		return mysqli_close ($this -> conn_id);
	}

} 

?>