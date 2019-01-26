<?php 
/**
 * 
 */
class Mysql
{
	protected $conn = false;  //DB connection resources
	protected $sql;           //sql statement
  /**
  * Set @param $options array
  * @return connection data base
  * 
  **/
	function __construct($options = array())
	{
		$host = isset($options['host'])? $options['host'] : 'localhost';
    $username = isset($options['username'])? $options['username'] : 'root';
    $password = isset($options['password'])? $options['password'] : '';
    $database = isset($options['database'])? $options['database'] : 'database';
    $this->conn = mysqli_connect($host, $username, $password, $database) or die('Database connection error');
    mysqli_select_db($this->conn, $database) or die('Database selection error');
	}

  /**
    *@param $sql string
    *@return if sentences SQL is valid
  **/
	public function query($sql){     

    $this->sql = $sql;
    // Write SQL statement into log

    $str = $sql . "  [". date("Y-m-d H:i:s") ."]" . PHP_EOL;

    file_put_contents("log.txt", $str, FILE_APPEND);

    $result = mysqli_query($this->conn, $this->sql);
    if (!$result) {
      die($this->errno().':'.$this->error().'<br />Error SQL statement is '.$this->sql.'<br />');
    }

    return $result;
  }
 
  /**
   *@param $sql string sentences SQL
   *@return mixed if succeed return one row, else return false
  **/
  public function getOne($sql){
    $result = $this->query($sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      return $row;
    } else {
      return false;
    }
  }
  /**
   *@param $sql string sentences SQL
   *@return mixed if succeed return all rows to array, else return false
  **/
  public function getAll($sql){
    $result = $this->query($sql);
    $list = array();

    while ($row = mysqli_fetch_assoc($result)){
      $list[] = $row;
    }
    return $list;
	}

	public function errno(){
    return mysqli_errno($this->conn);
  }

  public function error(){
    return mysqli_error($this->conn);
  }
}
