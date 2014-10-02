<?php

class AppDB{
	private $db;

	public function connect($host = "localhost", $dbname = "keepintouch", $dbuser = "root", $dbpasswd = "mysql"){
		try{
	       $this->db = new pdo('mysql:host=' . $host . ':3306;dbname=' . $dbname, $dbuser, $dbpasswd);
	       $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    } catch(PDOException $ex){
	    	throw $ex;
			return null;
	    }

	    return $this;
	}

	public function getUserGroups($email){
		try{
			return $this->db->query('SELECT appgroup.* from appgroup, member where member.groupid=appgroup.id and member.status="joined" and member.email="' . $email . '";');
		}
		catch(PDOException $ex){
			throw $ex;
			return null;
		}

		return null;
	}

	public function getUserInvitedGroups($email){
		try{
			return $this->db->query('SELECT appgroup.* from appgroup, member where member.groupid=appgroup.id and member.status="invited" and member.email="' . $email . '";');
		}
		catch(PDOException $ex){
			throw $ex;
			return null;
		}

		return null;
	}

	public function getGroupInfo($id){
		try{
			return $this->db->query('SELECT * from appgroup where id=' . $id . ';');
		}
		catch(PDOException $ex){
			throw $ex;
			return null;
		}

		return null;
	}

	public function getGroupMembers($id){
		try{
			return $this->db->query('SELECT * from member where groupid=' . $id . ';');
		}
		catch(PDOException $ex){
			throw $ex;
			return null;
		}

		return null;
	}

	public function inviteUserToGroup($id, $email){
		try{
			return $this->db->query('insert into member values ("' . $email . '",' . $id . ',"invited");');
		}
		catch(PDOException $ex){
			throw $ex;
			return null;
		}

		return null;
	}

	public function addUserToGroup($id, $email){
		try{
			return $this->db->query('update member set status="joined" where groupid=' . $id . ' and email="' . $email . '";');
		}
		catch(PDOException $ex){
			throw $ex;
			return null;
		}

		return null;
	}

	public function addUserCheckin($checkinArgsArray){
		try{
			$statement = $this->db->prepare('insert into checkin (email, statuslastmonth, statusthosearoundyou, statuswork, newpastmonth, newnextmonth) 
				VALUES (:email, :statuslastmonth, :statusthosearoundyou, :statuswork, :newpastmonth, :newnextmonth)');
    		$statement->execute($checkinArgsArray);
    		$affected_rows = $statement->rowCount();
			return $affected_rows;
		}
		catch(PDOException $ex){
			throw $ex;
			return null;
		}

		return null;
	}
}

?>
