<?php
class Db{
	protected $db; 

	public function __construct(){
	    
        $host='localhost';
        $username = 'root';
        $password = '';
        $dbname = 'expenses-manager';   
		$this->db = mysqli_connect($host,$username,$password,$dbname);
		mysqli_set_charset($this->db, 'utf8');
		if (!$this->db) {
		    echo 'Error establishing a DB connection';
		}
		mysqli_select_db($this->db,$dbname);
	}
	public function __desctruct(){
		mysqli_close($this->db);
	}
/**
 * @return Array from result
 */
	public function select($query){
		return  $this->toArray(mysqli_query($this->db,$query));
	}
    public function query($sql){

        return mysqli_query($this->db,$sql);
    }
	private function toArray($query){
		
		$tmp=array();
		$result=array();
		while ($row = $query->fetch_assoc()) {
			   $tmp[] = $row; 
		}
		foreach ($tmp as $key => $value) {
			   $result[] = $value;
		}
		return $result;
	}
}

