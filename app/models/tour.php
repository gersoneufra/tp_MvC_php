<?php 
/**
 * 
 */
class Tour extends BaseModel
{
	protected $table = 'VIAJE';

	public function find_by_tour($id){
		$sql = "SELECT * FROM VIAJE AS v
							INNER JOIN RUTA AS r
							ON r.RUTCOD = v.RUTCOD
							WHERE
							r.RUTCOD = '$id'";
    return $this->db->getAll($sql);
	}

	public function seating_active($code){
		$seating = range(1, 20);
		$query = "SELECT `Nro_asi` 
							FROM `pasajeros` 
							WHERE `VIANRO` = '$code'";
		$t_seating = array_map(function($p){ return $p['Nro_asi']; }, $this->db->getAll($query));
		return array_diff($seating, $t_seating);
	}
}