<?php

namespace App\Entidy;

use \App\Db\Database;

use \PDO;


class Galeria
{


    public $id;

    public $foto;

    public $produtos_id;



    public function cadastar()
    {


        $obdataBase = new Database('galerias');

        $this->id = $obdataBase->insert([

            'foto'         => $this->foto,
            'produtos_id'   => $this->produtos_id
        ]);

        return true;
    }

    public static function getGalerias($where = null, $order = null, $limit = null)
    {

        return (new Database('galerias'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getQtdGalerias($where = null)
    {

        return (new Database('galerias'))->select($where, null, null, 'COUNT(*) as qtd')
            ->fetchObject()
            ->qtd;
    }


    public static function getGaleriaID($id)
    {
        return (new Database('galerias'))->select('id = ' . $id)
            ->fetchObject(self::class);
    }

    public static function getGaleriaImg($id)
    {
        return (new Database('galerias'))->select('produtos_id = ' . $id)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getBuscarID($id)
    {
        return (new Database('galerias'))->consultar('produtos_id = ' . $id)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function atualizar()
    {
        return (new Database('galerias'))->update('id = ' . $this->id, [


            'foto'         => $this->foto,
            'produtos_id'   => $this->produtos_id
        ]);
    }

    public function excluir()
    {
        return (new Database('galerias'))->delete('id = ' . $this->id);
    }
}
