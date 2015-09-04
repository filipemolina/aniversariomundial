<?php

if (!class_exists('wpmlSubscribersList')) {
class wpmlSubscribersList extends wpMailPlugin {

	var $subscriber_id = 0;
	var $list_id = 0;
	
	var $errors = array();
	
	var $model = 'SubscribersList';
	var $controller = 'subscriberslists';
	var $table;
	
	var $fields = array(
		'rel_id'				=>	"INT(11) NOT NULL AUTO_INCREMENT",
		'subscriber_id'			=>	"INT(11) NOT NULL DEFAULT '0'",
		'list_id'				=>	"INT(11) NOT NULL DEFAULT '0'",
		'active'				=>	"ENUM('Y','N') NOT NULL DEFAULT 'N'",
		'paid'					=>	"ENUM('Y','N') NOT NULL DEFAULT 'N'",
		'authkey'				=>	"VARCHAR(32) NOT NULL DEFAULT ''",
		'authinprog'			=>	"ENUM('Y','N') NOT NULL DEFAULT 'N'",
		'paid_date'				=>	"DATETIME NOT NULL DEFAULT '0000-00-00'",
		'ppsubscription'		=>	"ENUM('Y','N') NOT NULL DEFAULT 'N'",
		'paid_sent'				=>	"INT(11) NOT NULL DEFAULT '0'",
		'reminded'				=>	"INT(11) NOT NULL DEFAULT '0'",
		'created'				=>	"DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'",
		'modified'				=>	"DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'",
		'key'					=>	"PRIMARY KEY (`rel_id`), INDEX(`subscriber_id`), INDEX(`list_id`)",
	);
	
	var $tv_fields = array(
		'rel_id'				=>	array("INT(11)", "NOT NULL AUTO_INCREMENT"),
		'subscriber_id'			=>	array("INT(11)", "NOT NULL DEFAULT '0'"),
		'list_id'				=>	array("INT(11)", "NOT NULL DEFAULT '0'"),
		'active'				=>	array("ENUM('Y','N')", "NOT NULL DEFAULT 'N'"),
		'paid'					=>	array("ENUM('Y','N')", "NOT NULL DEFAULT 'N'"),
		'authkey'				=>	array("VARCHAR(32)", "NOT NULL DEFAULT ''"),
		'authinprog'			=>	array("ENUM('Y','N')", "NOT NULL DEFAULT 'N'"),
		'paid_date'				=>	array("DATETIME", "NOT NULL DEFAULT '0000-00-00'"),
		'ppsubscription'		=>	array("ENUM('Y','N')", "NOT NULL DEFAULT 'N'"),
		'paid_sent'				=>	array("INT(11)", "NOT NULL DEFAULT '0'"),
		'reminded'				=>	array("INT(11)", "NOT NULL DEFAULT '0'"),
		'created'				=>	array("DATETIME", "NOT NULL DEFAULT '0000-00-00 00:00:00'"),
		'modified'				=>	array("DATETIME", "NOT NULL DEFAULT '0000-00-00 00:00:00'"),
		'key'					=>	"PRIMARY KEY (`rel_id`), INDEX(`subscriber_id`), INDEX(`list_id`)",				
	);
	
	var $indexes = array('subscriber_id', 'list_id');
	
	function wpmlSubscribersList($data = array()) {
		global $Db, $Subscriber, $Mailinglist;
		
		$this -> table = $this -> pre . $this -> controller;	
		
		if (!empty($data)) {		
			foreach ($data as $dkey => $dval) {				
				$this -> {$dkey} = $dval;
				
				switch ($dkey) {
					case 'list_id'		:
						$Db -> model = 'Mailinglist';
						$this -> mailinglist = $Db -> find(array('id' => $dval));
						break;
				}
			}
		}
		
		$Db -> model = $this -> model;
	}
	
	function count($conditions = array()) {
		global $wpdb, $Subscriber;
		
		$query = "SELECT COUNT(*) FROM `" . $wpdb -> prefix . "" . $this -> table . "`";
		
		if (!empty($conditions)) {
			$c = 1;
			$query .= " WHERE";
			
			foreach ($conditions as $ckey => $cval) {
				$query .= " `" . $ckey . "` = '" . $cval . "'";
				
				if ($c < count($conditions)) {
					$query .= " AND";
				}
				
				$c++;
			}
			
			$query_hash = md5($query);
			if ($ob_count = $this -> get_cache($query_hash)) {
				return $ob_count;
			}
			
			if ($count = $wpdb -> get_var($query)) {
				$this -> set_cache($query_hash, $count);
				return $count;
			}
		}
		
		return 0;
	}
	
	function field($field = null, $conditions = array()) {
		global $wpdb;
		
		if (!empty($field) && !empty($conditions)) {
			$query = "SELECT `" . $field . "` FROM `" . $wpdb -> prefix . "" . $this -> table . "` WHERE";
			$c = 1;
			
			foreach ($conditions as $ckey => $cval) {
				$query .= " `" . $ckey . "` = '" . $cval . "'";
				
				if ($c < count($conditions)) {
					$query .= " AND";
				}
				
				$c++;
			}
			
			$query_hash = md5($query);
			if ($ob_value = $this -> get_cache($query_hash)) {
				$value = $ob_value;
			} else {
				$value = $wpdb -> get_var($query);
				$this -> set_cache($query_hash, $value);
			}
			
			if (!empty($value)) {
				return $value;
			}
		}
	
		return false;
	}
	
	function find($conditions = array(), $fields = array(), $order = array()) {
		global $wpdb;
	
		$fields = (!empty($fields) && is_array($fields)) ? implode(", ", $fields) : '*';	
		$query = "SELECT " . $fields . " FROM `" . $wpdb -> prefix . "" . $this -> table . "`";
		
		if (!empty($conditions)) {
			$c = 1;
			$query .= " WHERE";
			
			foreach ($conditions as $ckey => $cval) {
				$query .= " `" . $ckey . "` = '" . $cval . "'";
				
				if ($c < count($conditions)) {
					$query .= " AND";
				}
				
				$c++;
			}
		}
		
		if (!empty($order)) {
			$query .= " ORDER BY";
		
			foreach ($order as $okey => $oval) {
				$query .= " `" . $okey . "` " . $oval . "";
			}
		}
		
		$query .= " LIMIT 1";
		
		$query_hash = md5($query);
		if ($ob_subscriberslist = $this -> get_cache($query_hash)) {
			return $ob_subscriberslist;
		}
		
		if ($subscriberslist = $wpdb -> get_row($query)) {
			$return = $this -> init_class($this -> model, $subscriberslist);
			$this -> set_cache($query_hash, $return);
			return $return;
		}
		
		return false;
	}
	
	function find_all($conditions = array()) {
		global $wpdb, $Subscriber;
		
		$query = "SELECT * FROM `" . $wpdb -> prefix . "" . $this -> table . "`";
		
		if (!empty($conditions)) {
			$c = 1;
			$query .= " WHERE";
			
			foreach ($conditions as $ckey => $cval) {
				if (!empty($cval)) {
					$query .= " `" . $ckey . "` = '" . $cval . "'";
					
					if ($c < count($conditions)) {
						$query .= " AND";
					}
				}
				
				$c++;
			}
		}
		
		$query_hash = md5($query);
		if ($ob_subscriberslists = $this -> get_cache($query_hash)) {
			return $ob_subscriberslists;
		}
		
		if ($subscriberslists = $wpdb -> get_results($query)) {
			$data = array();
			
			foreach ($subscriberslists as $sl) {
				$data[] = $this -> init_class($this -> model, $sl);
			}
			
			$this -> set_cache($query_hash, $data);
			return $data;
		}
	
		return false;
	}
	
	function delete_all($conditions = array()) {
		global $wpdb;
		$continue = true;
	
		if (!empty($conditions)) {
			$c = 1;
			$query = "DELETE FROM `" . $wpdb -> prefix . $this -> table . "`";
			$query .= " WHERE";
			
			foreach ($conditions as $ckey => $cval) {
				if (!empty($cval)) {
					$query .= " `" . $ckey . "` = '" . $cval . "'";
					
					if ($c < count($conditions)) {
						$query .= " AND";
					}
				} else {
					$continue = false;
				}
				
				$c++;
			}
			
			if ($continue == true) {
				if ($wpdb -> query($query)) {
					return true;
				}
			}
		}
		
		return false;
	}
	
	function check_maxperinterval() {
		global $wpdb, $Mailinglist, $Subscriber, $SubscribersList;
		$updated = 0;
		$mailinglists_table = $wpdb -> prefix . $Mailinglist -> table;
		$subscribers_table = $wpdb -> prefix . $Subscriber -> table;
		$subscriberslists_table = $wpdb -> prefix . $SubscribersList -> table;
		
		$query = "UPDATE " . $subscriberslists_table . " AS sl LEFT JOIN " . $mailinglists_table . " AS m ON sl.list_id = m.id SET sl.active = 'N' WHERE (sl.paid_sent >= m.maxperinterval AND m.maxperinterval != '') AND sl.active = 'Y'";
		$updated = $wpdb -> query($query);
		
		return $updated;
	}
	
	function check_expirations($field = null, $value = null, $single = false, $subsriber_id = false) {
		global $wpdb, $Db, $SubscribersList, $Subscriber, $Mailinglist;
		$conditions = array('paid' => "Y");
		
		$updated = 0;		
		
		if (!empty($single) && $single == true && !empty($subscriber_id)) {
			$conditions['subscriber_id'] = $subscriber_id;	
		}
		
		$subscriberslists = $SubscribersList -> find_all(array('paid' => "Y"));
		
		if (!empty($subscriberslists)) {
			foreach ($subscriberslists as $sl) {
				if ($sl -> paid == "Y" && $sl -> active == "Y") {
					$mailinglist = $Mailinglist -> get($sl -> list_id, false);
					$expiry = $Mailinglist -> gen_expiration_date($sl -> subscriber_id, $sl -> list_id);
					
					if ($mailinglist -> interval == "once" || time() >= strtotime($expiry)) {					
						$conditions = array('subscriber_id' => $sl -> subscriber_id, 'list_id' => $sl -> list_id);
						$this -> save_field('paid', "N", $conditions);
						$this -> save_field('active', "N", $conditions);
						$updated++;
						
						$mailinglist = $Mailinglist -> get($sl -> list_id, false);
						if ($mailinglist -> paid == "Y") {						
							$subscriber = $Subscriber -> get($sl -> subscriber_id, false);
							$subscriber -> mailinglist_id = $sl -> list_id;
							$subscriber -> mailinglists = array($sl -> list_id);
							$subject = $this -> et_subject('expire');
							$fullbody = $this -> et_message('expire');
							$message = $this -> render_email(false, array('subscriber' => $subscriber, 'mailinglist' => $mailinglist), false, $this -> htmltf($subscriber -> format), true, $this -> et_template('expire'), false, $fullbody);
							$this -> execute_mail($subscriber, false, $subject, $message, false, false, false, false);
						}
					}
				}
			}	
		}
		
		$updated += $this -> check_maxperinterval();		
		return $updated;
	}
	
	function save_field($field = null, $value = null, $conditions = array()) {
		global $wpdb;
	
		if (!empty($field) && !empty($conditions)) {
			$query = "UPDATE `" . $wpdb -> prefix . "" . $this -> table . "` SET `" . $field . "` = '" . $value . "'";
			$query .= " WHERE";
			$c = 1;
			
			foreach ($conditions as $ckey => $cval) {
				$query .= " `" . $ckey . "` = '" . $cval . "'";
				
				if ($c < count($conditions)) {
					$query .= " AND";
				}
				
				$c++;
			}
			
			$wpdb -> query($query);
			return true;
		}
		
		return false;
	}
	
	function save($data = array(), $validate = true, $return_query = false) {
		global $wpdb;
		
		$defaults = array(
			'authkey'			=>		"",
			'authinprog'		=>		"N",
			'ppsubscription'	=>		"N",
			'created' 			=> 		$this -> gen_date(), 
			'modified' 			=> 		$this -> gen_date(),
			'active'			=>		"N",
			'paid'				=>		"N",
			'paid_date'			=>		$this -> gen_date("Y-m-d"),
		);
		
		$data = (empty($data[$this -> model])) ? $data : $data[$this -> model];
		$r = wp_parse_args($data, $defaults);
		$this -> data = (array) $this -> data;
		$this -> data[$this -> model] = (object) $data;
		extract($r, EXTR_SKIP);
		
		if ($validate == true) {
			if (empty($subscriber_id)) { $this -> errors['subscriber_id'] = __('No subscriber was specified', $this -> plugin_name); }
			if (empty($list_id)) { $this -> errors['list_id'] = __('No mailing list was specified', $this -> plugin_name); }
		}
		
		if (empty($this -> errors)) {
			if (!$this -> find(array('subscriber_id' => $subscriber_id, 'list_id' => $list_id))) {				
				$c = 1;
				$query1 = "INSERT INTO `" . $wpdb -> prefix . "" . $this -> table . "` (";
				unset($this -> fields['key']);
				unset($this -> fields['id']);
				unset($this -> fields['rel_id']);
				
				foreach (array_keys($this -> fields) as $field) {
					$value = (!empty(${$field})) ? esc_sql(${$field}) : '';
					
					$query1 .= "`" . $field . "`";
					$query2 .= "'" . $value . "'";
					
					if ($c < count($this -> fields)) {
						$query1 .= ", ";
						$query2 .= ", ";
					}
					
					$c++;
				}
				
				$query1 .= ") VALUES (";
				$query = $query1 . $query2 . ");";
				
				if (empty($return_query) || $return_query == false) {
					if ($wpdb -> query($query)) {
						return true;
					}
				} else {
					return $query;	
				}
			}
		}
		
		return false;
	}
}
}

?>