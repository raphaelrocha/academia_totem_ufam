<?php
class VerificaPatente{
    /*
    RETORNA TRUE PARA DIRETOR OU GESTOR.
    */
    function isGestorOrDiretor($tipo)
    {
        $lista=array();
        $lista = split(';',$tipo);
        foreach ($lista as $valor){
            if($valor=="diretor"){
                return true;
            }elseif($valor=="gestor"){
                return true;
            }
        }
        return false;
    }
    /*
    RETORNA SE É DIRETOR OU GESTOR OU NENHUM.
    */
    function isPatente($tipo)
    {
        $lista=array();
        $lista = split(';',$tipo);
        //$ehDiretorOuGestor=false;
        foreach ($lista as $valor){
            if($valor=="diretor"){
                return $valor;
            }elseif($valor=="gestor"){
                return $valor;
            }
        }
        return "nda";
    }
    function isFuncionario($funcionario)
    {
        $lista=array();
        $lista = split(';',$funcionario);
        //$ehDiretorOuGestor=false;
        foreach ($lista as $valor){
            if($valor=="sim"){
                return true;
            }elseif($valor=="nao"){
                return false;
            }
        }
        return false;
    }
}
