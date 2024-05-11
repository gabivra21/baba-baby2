<?php
namespace Sts\Controllers;

class Usuario
{
    private ?int $idUsuario;
    private string $email;
    private string $senha;
    private string $cpf;
    private string $nome;
    private string $sobrenome;
    private int $dtaNascimento;
    private int $telefone;
    private string $cidade;
    private string $endereco;
    private string $foto;
    private bool $adm;

    public function __construct(?int $idUsuario, string $email, string $senha, string $cpf, string $nome, string $sobrenome, int $dtaNascimento,int $telefone, string $cidade, string $endereco, string $foto, bool $adm)
    {
        $this->idUsuario=$idUsuario;
        $this->email=$email;
        $this->senha=$senha;
        $this->cpf=$cpf;
        $this->nome=$nome;
        $this->sobrenome=$sobrenome;
        $this->dtaNascimento=$dtaNascimento;
        $this->telefone=$telefone;
        $this->cidade=$cidade;
        $this->endereco=$endereco;
        $this->foto=$foto;
        $this->adm=$adm;


    }
    public function getId(): ?int
    {
        return $this->idUsuario;
    }

    public function setId(?int $id): void
    {
        $this->idUsuario = $id;

    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }


    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }
    
    
    
    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function setSobrenome(string $sobrenome): void
    {
        $this->sobrenome = $sobrenome;
    }

    public function getDtaNascimento(): int
    {
        return $this->sobrenome;
    }

    public function setDtaNascimento(int $dtaNascimento): void
    {
        $this->dtaNascimento = $dtaNascimento;
    }

    public function getTelefone(): int
    {
        return $this->telefone;
    }

    public function setTelefone(int $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): void
    {
        $this->endereco = $endereco;
    }

    public function getFoto(): string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): void
    {
        $this->foto = $foto;
    }

    public function getAdm(): bool
    {
        return $this->adm;
    }

    public function setAdm(bool $adm): void
    {
        $this->adm = $adm;
    }














}


    





?>