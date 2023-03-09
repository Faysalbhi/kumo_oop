<?php
namespace pondit; 
use PDO;
  class DB{
    public $dbname="mysql:host=localhost;dbname=pondit";
    public $username="root";
    public $password='';
    public $PDO='';
    public $conn=false;
    public $result=array();

    public function __construct(){
      if(!$this->conn){
      try{
        $this->PDO= new PDO($this->dbname,$this->username,$this->password);
        $this->conn= true;
      }catch(PDOException $e){
        die("Failed to connect with MySQL: ".$e->getMessage());

        }
      }
    }


// select single rows or multiple rows use with order by or limit
    public function getRows($table,$condition=array()){
      $sql= 'SELECT ';
      $sql .= array_key_exists('select',$condition)?$condition['select']:'*';
      $sql .=' FROM '. $table;
      if(array_key_exists('where',$condition)){
        $sql .= ' WHERE ';
        $i =0;
        foreach($condition['where'] as $key=> $value){
          $pre =($i>0)?'AND':'';
          $sql.= $pre.$key." = '".$value."'";
          $i++;
        }
      }
      if(array_key_exists('order_by',$condition)){
        $sql.=' ORDER BY '.$condition['order_by'];
      }

      if(array_key_exists("start",$condition)&& array_key_exists("limit",$condition)){
        $sql.=' LIMIT '.$condition['start'].','.$condition['limit'];
      }elseif(array_key_exists("limit",$condition)){
        $sql.=" LIMIT ".$condition['limit'];
      }
      $query=$this->PDO->prepare($sql);
      $query->execute();

      if(array_key_exists("return_type",$condition)&& $condition['return_type']!='all'){
        switch($condition['return_type']){
          case 'count':
          $data = $query->rowCount();
          break;
          case 'single':
          $data = $query->fetch(PDO::FETCH_ASSOC);
          break;
          default: 
          $data = '';
        }
      }else{
        if($query->rowCount()>0){
          $data = $query->fetchAll(PDO::FETCH_ASSOC);
        } 
      }
      return !empty($data)?$data:'false';
    }


    public function insert($table,$data){
      if(!empty($data)&& is_array($data)){
        $dataColumn='';
        $dataValue='';
        $i=0;
        $columnString= implode(',',array_keys($data));
        $valueString= ':'.implode(',:',array_keys($data));
        $sql="INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
        $query=$this->PDO->prepare($sql);
        $insert=$query->execute($data);
        return $insert?$this->PDO->lastInsertId():false;
      }
    }

    public function update($table,$data,$condition){
      if (!empty($data)&& is_array($data)){
        $colValSet='';
        $i=0;
        foreach($data as $key=>$value){
        $pre= ($i > 0)?', ':'';
        $colValSet.= $pre.$key." = '".$value."' ";
        $i++;
      }
      
        if(!empty($condition)&& is_array($condition)){
        $whereSql = ' WHERE ';
        $i =0;
        foreach($condition['where'] as $key=> $value){
          $pre =($i>0)?' AND ':'';
          $whereSql.= $pre.$key." = '".$value."'";
          $i++;
        }
      }
        $sql= "UPDATE $table SET ".$colValSet.$whereSql;
        $query=$this->PDO->prepare($sql);
        $update=$query->execute();
        return $update?$query->rowCount():false;
      }else{
        return false;
      }

    }

    public function destroy($table,$condition){
        if(!empty($condition)&& is_array($condition)){
            $whereSql = ' WHERE ';
            $i =0;
            foreach($condition['where'] as $key=> $value){
              $pre =($i>0)?' AND ':'';
              $whereSql.= $pre.$key." = '".$value."'";
              $i++;
            }
            $sql= "DELETE FROM $table ".$whereSql;
            $query=$this->PDO->prepare($sql);
            $destroy=$query->execute();
            return $destroy?$destroy:false;  
          }
        

    }













 public function getAll($table){
  $sql="SELECT * FROM $table";
  $sql=$this->PDO->prepare($sql);
  $sql->execute();
  $this->result=$sql->fetchAll(PDO::FETCH_ASSOC);
  return true;
 }



public function sqlAll($query){

  $sql=$this->PDO->prepare($query);
  $sql->execute();
  $this->result=$sql->fetchAll(PDO::FETCH_ASSOC);
  return true;
 }

public function sql($query){

  $sql=$this->PDO->prepare($query);
  $sql->execute();
  $this->result=$sql->fetch(PDO::FETCH_ASSOC);
  return true;
 }



}


?>