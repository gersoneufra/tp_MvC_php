<?php 
/**
 * 
 */
class Passinger extends BaseModel
{
	protected $table = 'pasajeros';


	public function find_by_tours($code)
	{
		$query = "SELECT * FROM pasajeros AS p
							INNER JOIN VIAJE AS v
							ON p.VIANRO = v.VIANRO
							WHERE
							v.VIANRO = '$code'";
		return $this->db->getAll($query); 
	}

	public function register($params){
		$params['pago'] = floatval($params['pago']) - $this->discount($params['pago'], $params['tipo']);
		$params['BOLNRO'] = $this->generate_code();
		return $this->create($params);
	}

	private function discount($mount, $type){
		if($type == 'E')
		{
			return (floatval($mount) * 0.3);
		}
		if($type == 'N'){
			return (floatval($mount) * 0.5);
		}
		return $mount;
	}

	private function generate_code(){
		$query = "SELECT MAX(`BOLNRO`) AS max_code FROM `pasajeros` WHERE 1";
		$max_code = $this->db->getAll($query);
		$code = strval(intval($max_code[0]['max_code']) + 1);
		return str_pad($code, 6, "0", STR_PAD_LEFT);
	}
}