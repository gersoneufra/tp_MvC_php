<?php
/**
 * 
 */
class Driver extends BaseModel
{
	protected $table = 'CHOFER';

	public function tours($code)
	{
		$query = "SELECT * 
							FROM CHOFER AS C
		          INNER JOIN VIAJE AS V
		          ON C.IDCOD = V.IDCOD
		          INNER JOIN RUTA AS R
		          ON R.RUTCOD = V.RUTCOD
		          WHERE 
		          V.IDCOD = '$code'";
		return $this->db->getAll($query);
	}
}