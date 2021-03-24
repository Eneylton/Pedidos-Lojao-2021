<?php 

namespace App\Entidy;

use \App\Db\Database;

use \PDO;


class Categoria{
    

    public $id;

    public $nome;

    public $foto;


    
    public function cadastar(){


        $obdataBase = new Database('categorias');  
        
        $this->id = $obdataBase->insert([
          
            'nome'         => $this->nome, 
            'foto'        => $this->foto, 

        ]);

        return true;

    }

public static function getList($where = null, $order = null, $limit = null){

    return (new Database ('categorias'))->select($where,$order,$limit)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}

public static function getQtd($where = null){

    return (new Database ('categorias'))->select($where,null,null,'COUNT(*) as qtd')
                                   ->fetchObject()
                                   ->qtd;

}


public static function getID($id){
    return (new Database ('categorias'))->select('id = ' .$id)
                                   ->fetchObject(self::class);
 
}

public function atualizar(){
    return (new Database ('categorias'))->update('id = ' .$this-> id, [

                                               
                                            'nome'         => $this->nome, 
                                            'foto'        => $this->foto

    ]);
  
}

public function excluir(){
    return (new Database ('categorias'))->delete('id = ' .$this->id);
  
}


public static function getEmail($foto){

    return (new Database ('categorias'))->select('foto = "'.$foto.'"')-> fetchObject(self::class);

}

public static function getPdf(){

    return (new Database ('categorias'))->pdf($where = null)
                                   ->fetchAll(PDO::FETCH_CLASS, self::class);

}


}