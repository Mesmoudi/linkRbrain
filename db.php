<?

	$attempts = 1;
	do {
		$db = mysqli_connect("linkrbrain.iscpif.fr", "carma", "afo7ahPh", "carma_test");
	} while (!$db && $attempts--);

	if (!$db) {
		die("No database");
	}
	mysqli_query($db, "SET NAMES 'utf8'");

	function mysql_error() {
		global $db;
		return mysqli_error($db);
	}
	function mysql_query($sql) {
            global $db;
            return mysqli_query($db, $sql);
        }
	function mysql_insert_id() {
		global $db;
		return mysqli_insert_id($db);
	}
	function mysql_fetch_value($rs){
                global $db;
		$r = mysqli_fetch_row($rs);
		// echo mysqli_error($db);
		return $r ? $r[0] : $r;
	}
	function mysql_num_rows($rs){
		return mysqli_num_rows($rs);
	}
	function mysql_single_array($sql){
        global $db;
        return
			($rs = mysqli_query($db, $sql))
		?	mysqli_fetch_array($rs)
		:	false
		;
    }
	function mysql_single_row($sql){
                global $db;
		return
			($rs = mysqli_query($db, $sql))
		?	mysqli_fetch_row($rs)
		:	false
		;
    }
    function mysql_single_assoc($sql){
        global $db;
        return  
			($rs = mysqli_query($db, $sql))
		?	mysqli_fetch_assoc($rs)
		:	false
		;
    }
    function mysql_single_value($sql){
        global $db;
        return
			($r = mysql_single_row($sql))
		?	$r[0]
		:	false
		;
    }

	function mysql_array($sql){
                global $db;
		if ($rs = mysql_query($sql)){
			$array = array();
			while ($r = mysql_fetch_array($rs)){
				$array[] = $r;
			}
			return $array;
		}
		return false;
	}
	function mysql_row($sql){
                global $db;
		if ($rs = mysql_query($sql)){
			$array = array();
			while ($r = mysql_fetch_row($rs)){
				$array[] = $r;
			}
			return $array;
		}
		return false;
	}
	function mysql_assoc($sql){
                global $db;
		if ($rs = mysql_query($sql)){
			$array = array();
			while ($r = mysql_fetch_assoc($rs)){
				$array[] = $r;
			}
			return $array;
		}
		return false;
	}
	function mysql_affected_rows() {
		global $db;
		return mysqli_affected_rows($db);
	}
	function mysql_fetch_assoc($rs) {
		return mysqli_fetch_assoc($rs);
	}
        function mysql_fetch_row($rs) {
                return mysqli_fetch_row($rs);
        }

	
?>
