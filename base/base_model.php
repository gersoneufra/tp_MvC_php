<?php 
/**
 * 
 */
require BASE_PATH . 'mysql.php';

class BaseModel
{
	protected $db; //database connection object

  protected $table; //table name

  protected $columns = array();  //columns list

  public function __construct(){
  	$dbconfig = [];
   	$dbconfig['host'] = 'localhost';
    
    $dbconfig['username'] = '';
    $dbconfig['password'] = "";
    $dbconfig['database'] = '';
       
    $this->db = new Mysql($dbconfig);
    
    $this->getColumns();
  }

  /**
   * Get the list of table columns
   *
  */
  private function getColumns(){
    $sql = "DESC ". $this->table;
    $result = $this->db->getAll($sql);

    foreach ($result as $v) {
      $this->columns[] = $v['Field'];
      if ($v['Key'] == 'PRI') {
        // If there is PK, save it in $pk
        $pk = $v['Field'];
      }
    }

    // If there is PK, add it into columns list
    if (isset($pk)) {
      $this->columns['pk'] = $pk;
    }
  }


  public function all(){
  	$sql = "SELECT * from `{$this->table}`";
    $rows = $this->db->getAll($sql);
    return $rows;
  }

  public function find($id){
  	$sql = "SELECT * from `{$this->table}` WHERE `{$this->columns['pk']}`= '$id'";
    $row = $this->db->getOne($sql);
    return $row;	
  }

  /**
    * Insert records
    * @access public
    * @param $list array associative array
    * @return mixed If succeed return inserted record id, else return false
   */

  public function create($list){
    $field_list = '';  //field list string

    $value_list = '';  //value list string

    foreach ($list as $k => $v) {
      if (in_array($k, $this->columns)) {
        $field_list .= "`".$k."`" . ',';
        $value_list .= "'".$v."'" . ',';
      }
    }

    // Trim the comma on the right
    $field_list = rtrim($field_list,',');
    $value_list = rtrim($value_list,',');
    // Construct sql statement
    $sql = "INSERT INTO `{$this->table}` ({$field_list}) VALUES ($value_list)";

    if ($this->db->query($sql)) {
      return true;
    } else {
      return false;
    }   
  }

  /**
    * Update records
    * @access public
    * @param $list array associative array needs to be updated
    * @return mixed If succeed return the count of affected rows, else return false
   */

  public function update($list){
    $uplist = ''; //update columns
    $where = 0;   //update condition, default is 0

    foreach ($list as $k => $v) {
      if (in_array($k, $this->columns)) {
        if ($k == $this->columns['pk']) {
          // If it’s PK, construct where condition
          $where = "`$k`=$v";
        } else {
          // If not PK, construct update list
          $uplist .= "`$k`='$v'".",";
        }
      }
    }

    // Trim comma on the right of update list
    $uplist = rtrim($uplist,',');
    // Construct SQL statement
    $sql = "UPDATE `{$this->table}` SET {$uplist} WHERE {$where}";
    if ($this->db->query($sql)) {
        // If succeed, return the count of affected rows
        if ($rows = mysqli_affected_rows()) {
          // Has count of affected rows  
          return $rows;
        } else {
          // No count of affected rows, hence no update operation
          return false;
        }    
    } else {
      // If fail, return false
      return false;
    }
  }
  /**
    * Delete records
    * @access public
    * @param $pk mixed could be an int or an array
    * @return mixed If succeed, return the count of deleted records, if fail, return false
   */
  public function delete($pk){
    $where = 0; //condition string
    
    //Check if $pk is a single value or array, and construct where condition accordingly
    if (is_array($pk)) {
      // array
      $where = "`{$this->columns['pk']}` IN (".implode(',', $pk).")";
    } else {
      // single value
      $where = "`{$this->columns['pk']}`=$pk";
    }

    // Construct SQL statement
    $sql = "DELETE FROM `{$this->table}` WHERE $where";

    if ($this->db->query($sql)) {
      // If succeed,return true
      return true;
    } else {
      // If fail, return false
      return false;
    }
  }
  /**
    * Get the count of all records
    *
   */
  public function total(){
    $sql = "select count(*) from {$this->table}";
    return $this->db->getOne($sql);
  }
  /**
    * Get info of pagination
    * @param $offset int offset value
    * @param $limit int number of records of each fetch
    * @param $where string where condition,default is empty
   */
  public function pageRows($offset, $limit, $where = ''){
    if (empty($where)){
        $sql = "select * from {$this->table} limit $offset, $limit";
    } else {
        $sql = "select * from {$this->table}  where $where limit $offset, $limit";
    }
    return $this->db->getAll($sql);
  }
}