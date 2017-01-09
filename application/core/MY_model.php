<?php
class MY_Model extends CI_Model{
	
	protected $table_name;
	private $fields = array();

	public function __construct(){
		parent::__construct();
		$this->columns();
	}

	public function update($id = 0, $data = array()){
		if(empty($data))
			return false;
		if((int)$id > 0)
        	$this->db->where('id', $id);
        $this->db->update($this->table_name, $data);
    }
    
    public function delete($id = 0){
    	if((int)$id > 0)
        	$this->db->where('id', $id);
        return $this->db->delete($this->table_name);
    }
    
    public function get($where = array()){
    	if(is_array($where) && !empty($where))
    		$this->db->where($where);
        return $this->db->get($this->table_name);
    }

    public function save($data = array()){
    	$this->dataClear($data);
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }

    private function showColumns(){
        return $this->db->field_data($this->table_name);
    }

    private function dataClear($data = array()){
    	if(empty($data))
    		return false;
    	foreach ($data as $key => $value) {
    		if(!array_key_exists($key,$this->fields)){
    			unset($data[$key]);
    		}
    	}
    }

    private function columns(){
    	foreach($this->showColumns() as $column){
    		$this->fields[$column->name] = $column;
    	}
    }

}
?>