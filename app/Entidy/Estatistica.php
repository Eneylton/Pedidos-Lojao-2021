<?php 

namespace App\Entidy;

use \App\Db\Database;

use \PDO;


class Estatistica{
    
    
    public $id;
    
    public $codigo;

    public $barra;

    public $nome;

    public $qtd;

    public $valor_compra;

    public $subtotal;

    public $produtos_id;

    public $usuarios_id;
    
    public $status;

    
    public function cadastar(){

        $this-> data = date('Y-m-d H:i:s');

        $obdataBase = new Database('estatisticas');  
        
        $this->id = $obdataBase->insert([
          
            'codigo'          => $this->codigo, 
            'barra'           => $this->barra, 
            'nome'            => $this->nome, 
            'qtd'             => $this->qtd, 
            'valor_compra'    => $this->valor_compra, 
            'subtotal'        => $this->subtotal, 
            'produtos_id'     => $this->produtos_id, 
            'usuarios_id'     => $this->usuarios_id, 
            'status'          => $this->status

        ]);

        return true;

    }

    public function atualizar(){
        return (new Database ('estatisticas'))->update('id = ' .$this-> id, [
    
                                                   
                                                'status'         => $this->status 
    
        ]);
      
    }

public static function getList($where = null, $order = null, $limit = null){

    return (new Database ('estatisticas'))->select($where,$order,$limit)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}


public static function getRank($where = null, $order = null, $limit = null){

    return (new Database ('estatisticas'))->rank($where,$order,$limit)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}

public static function getDespesas($where = null, $order = null, $limit = null){

    return (new Database ('estatisticas'))->despesas($where,$order,$limit)
                                          ->fetchObject();

}


public static function getReceber($where = null, $order = null, $limit = null){

    return (new Database ('estatisticas'))->receber($where,$order,$limit)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}

public static function getUsuarios($where = null, $order = null, $limit = null){

    return (new Database ('usuarios'))->select($where,$order,$limit)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}

public static function getQtd($where = null){

    return (new Database ('estatisticas'))->select($where,null,null,'COUNT(*) as qtd')
                                   ->fetchObject()
                                   ->qtd;

}


public static function getID($id){
    return (new Database ('estatisticas'))->select('id = ' .$id)
                                   ->fetchObject(self::class);
 
}

public static function getITem($id){
    return (new Database ('estatisticas'))->select('produtos_id = ' .$id)
                                   ->fetchObject(self::class);
 
}


public function excluir(){
    return (new Database ('estatisticas'))->delete('id = ' .$this->id);
  
}




}