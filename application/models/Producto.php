<?php
  class Producto extends CI_Model
  {
    function __construct()
    {
    		parent::__construct();

    }

    public function leerProd(){
      $this->db->select('*');
      $this->db->from('productos');
      return $this->db->get()->result();
    }
    public function eliminarProd($id_prod){
      $this->db->where('id',$id_prod);
      $this->db->delete('productos');
    }
    public function crear($prod){
        $this->db->insert('productos', $prod);
    }
    public function modificar($id, $data) {
      $this->db->where('id', $id);
      return $this->db->update('productos', $data);
    }
    public function existe($id)
    {
      $this->db->where('id', $id);
      $query = $this->db->get('productos');
      return $query->num_rows() > 0;
    }
    public function existeImg($ruta){
      $this->db->where('imagen', $ruta);
      $query = $this->db->get('productos');
      return $query->num_rows();
    }
    public function contarProd(){
      $this->db->where('cantidad <=', 3);  
      $this->db->where('cantidad !=', 0);
      $countMenor3 = $this->db->count_all_results('productos');

      $this->db->where('cantidad', 0);
      $countCero = $this->db->count_all_results('productos');
      
      return array(
        'menor3' => $countMenor3,
        'cero' => $countCero
      );
    }
    public function sumar($id, $suma){
      $this->db->set('cantidad', $suma); // Aqui estoy diciendo en que columna voy a hacer el cambio, esto solo se hace con un dato
      $this->db->where('id', $id);
      $this->db->update('productos');
    }
    public function restar($id, $restar){
      $this->db->set('cantidad', $restar); // Aqui estoy diciendo en que columna voy a hacer el cambio, esto solo se hace con un dato
      $this->db->where('id', $id);
      $this->db->update('productos');
    }
}