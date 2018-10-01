<?php


class myfirstclass{

    private $user="root";
    private $pass="";
    private $dsn="mysql:host=localhost;dbname=shopping";
    private $attr="set names UTF8";
    public $db;

    public function __construct()
    {
        try{
            $this->db=new PDO($this->dsn,$this->user,$this->pass,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $this->db->exec('set names UTF8');
    }catch (PDOException $error){
           echo 'Conection field';
        }

    }

    public function conection(){
        $db=new PDO($this->dsn,$this->user,$this->pass);
        $db->exec('set names UTF8');
        return $db;
    }

    public function select($sql,$array=array(),$style=PDO::FETCH_ASSOC){
        $stat=$this->db->prepare($sql);

        foreach ($array as $key=>$value){
            $stat->bindValue($key+1,$value);
        }

        $stat->execute();
        $result=$stat->fetchAll($style);
        return$result;
    }

    public function query($sql,$array=array(),$style=PDO::FETCH_ASSOC){

        $stat=$this->db->prepare($sql);

        foreach ($array as $key=>$value){
            $stat->bindValue($key+1,$value);
        }

        $stat->execute();
    }

    public function num($sql,$array=array(),$style=PDO::FETCH_ASSOC){

        $stat=$this->db->prepare($sql);

        foreach ($array as $key=>$value){
            $stat->bindValue($key+1,$value);
        }

        $stat->execute();
        $number=$stat->rowCount();

        return $number;
    }



}

//$object=new myfirstclass();
////
////
////$sql="select * from newproducts_tbl where  slidsstatus=? ";
////
//////$sql="update newproducts_tbl set numberofproduct=? where id=? and slidsstatus=? ";
////$status=1;
////$id=2;
////$numberofproduct=0;
////$newarray=array($status);
////
////$res=$object->num($sql,$newarray);
////
////print_r($res);