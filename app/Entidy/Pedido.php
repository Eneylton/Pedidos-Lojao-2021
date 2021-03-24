<?php 

namespace App\Entidy;

use \App\Db\Database;

use \PDO;


class Pedido{
    
    
    public $id;

    public $qtd;

    public $subtotal;

    public $produtos_id;

    public $usuarios_id;
    
    public $status;

    
    public function cadastar(){

        $this-> data = date('Y-m-d H:i:s');

        $obdataBase = new Database('pedidos');  
        
        $this->id = $obdataBase->insert([
          
            'nome'            => $this->nome, 
            'qtd'             => $this->qtd, 
            'subtotal'        => $this->subtotal, 
            'produtos_id'     => $this->produtos_id, 
            'usuarios_id'     => $this->usuarios_id, 
            'status'          => $this->status

        ]);

        return true;

    }

public static function getList($where = null, $order = null, $limit = null){

    return (new Database ('pedidos'))->select($where,$order,$limit)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}

public static function getUsuarios($where = null, $order = null, $limit = null){

    return (new Database ('usuarios'))->select($where,$order,$limit)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}

public static function getQuantidadeProduto($where = null){

    return (new Database ('pedidos'))->select($where,null,null,'COUNT(*) as qtd')
                                   ->fetchObject()
                                   ->qtd;

}


public static function getProdutoID($id){
    return (new Database ('pedidos'))->select('id = ' .$id)
                                   ->fetchObject(self::class);
 
}



}