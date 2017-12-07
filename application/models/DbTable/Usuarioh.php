<?php
    class Application_Model_DbTable_Usuarioh extends Zend_Db_Table_Abstract
	{
	    protected $_name = 'usuario_hotelero';
		
		public function getUsuarioh($id) {
		    $id = (int)$id;
			$row = $this->fetchRow('id_u = '.$id);
			if (!$row) {
			    throw new Exception("No se encuentra la fila con el id $id");
			}
			return $row->toArray();
		}
		
		public function addUsuarioh ($nombre, $apellido, $fecha_nac, $correo) {
		    $data = array(
			    'nombre' => $nombre,
                'apellido' => $apellido,				
                'fecha_nac' => $fecha_nac,				
                'correo' => $correo				
			);
		    echo $this->insert($data);
		}
		
		public function deleteUsuarioh($id) {
			$this->delete('id_u ='. (int)$id);
		}
		
		
		public function putUsuarioh($id, $nombre, $apellido, $fecha_nac, $correo) {
		    $data = array(
			    'nombre' => $nombre,
                'apellido' => $apellido,				
                'fecha_nac' => $fecha_nac,				
                'correo' => $correo				
			);
			$this->update($data, 'id_u = '.(int)$id);
		}
	    
	}
