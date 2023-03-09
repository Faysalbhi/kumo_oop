<?php
namespace pondit\crud;
class Crud{

    function create($sessionName,$data){
      session_start();
      $_SESSION[$sessionName]=$data;
      $_SESSION['add']="Successfully added";
      
    }

    function update($data){
      session_start();
      $_SESSION[$sessionName]=$data;
      $_SESSION['update']="Successfully Update";
    }
    
    function delete($sessionName){
        session_start();
        unset($_SESSION[$sessionName]);
        $_SESSION['delete']="Successfully deleted";
    }


}
?>