<?php
namespace Sts\Repositorio;
use Sts\Models\Usuario;
use \PDO;

Class PdoRepositorioUsuario{
    private PDO $conexaoDB;

    public function __construct(PDO $connection) {
        $this->conexaoDB = $connection;
    }

    

    public function cadastrar($idUsuario, $email, $senha, $cpf,$nome,  $sobrenome,  $dtaNascimento,$telefone, $cidade,$endereco,$foto,$adm){

        global $pdo;
        $sql = $pdo->prepare("INSERT INTO usuario(idUsuario, email, senha, cpf, nome, sobrenome, dtaNascimento, telefone, cidade, enedereco, foto, adm) VALUES (:i, :e, :s, :c, :n, :so, :d, :t, :ci, :en, :f, :a )");
        $sql->bindValue(":i",$idUsuario);
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->bindValue(":c",$cpf);
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":so",$sobrenome);
        $sql->bindValue(":d",$dtaNascimento);
        $sql->bindValue(":t",$telefone);
        $sql->bindValue(":ci",$cidade);
        $sql->bindValue(":en",$endereco);
        $sql->bindValue(":f",$foto);
        $sql->bindValue(":a",$adm);
        
    }


}
?>