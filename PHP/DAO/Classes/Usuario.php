<?php

namespace Classes;
use DB\Sql;

class Usuario {
    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;
    
    function getIdusuario() {
        return $this->idusuario;
    }

    function getDeslogin() {
        return $this->deslogin;
    }

    function getDessenha() {
        return $this->dessenha;
    }

    function getDtcadastro() {
        return $this->dtcadastro;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setDeslogin($deslogin) {
        $this->deslogin = $deslogin;
    }

    function setDessenha($dessenha) {
        $this->dessenha = $dessenha;
    }

    function setDtcadastro($dtcadastro) {
        $this->dtcadastro = $dtcadastro;
    }

    public function loadById($id){
        $sql = new Sql();
        
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :idusuario", array(
            ":idusuario"=>$id
        ));
        
        if(count($results) > 0){
            $this->setData($results[0]);
        }
    }
    
    private function setData($data){
        $this->setIdusuario($data['idusuario']);
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);
        $this->setDtcadastro($data['dtcadastro']);
    }
    
    public function insert(){
        $sql = new Sql();
        
        $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
            ":LOGIN"=>$this->getDeslogin(),
            ":PASSWORD"=>$this->getDessenha()
        ));
        
        if(count($results) > 0){
            $this->setData($results[0]);
        }
    }
    
    public static function getList(){
        $sql = new Sql();
        
        return $sql->select("SELECT * FROM tb_usuarios");
    }
    
    public function __toString(){
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getDtcadastro()
        ));
    }
}
