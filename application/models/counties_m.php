<?php 
class Counties_m extends  CI_Model{
    
    private $table_name= 'counties_m';
 
    public function __construct(){
        parent::__construct();
    }
    
    public function count_all(){
        return $this->db->count_all($this->table_name);
    }
    
    public function get_paged_list($limit = 10, $offset = 0){
        $this->db->order_by('id','asc');
        return $this->db->get($this->table_name, $limit, $offset);
    }
    
    public function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->table_name);
    }
    
    public function save($county){
        $this->db->insert($this->table_name, $county);
        return $this->db->insert_id();
    }
    
    public function update($id, $county){
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $county);
    }
    
    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
    }
    
    public function showColumns(){
        //return $this->db->
        return $this->db->field_data($this->table_name);
    }
}
?>