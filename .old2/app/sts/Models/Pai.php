<?php
namespace Sts\Controllers;

class Baba{

    private int $qtdeCrianca;
    private string $descricao;

    public function __construct(int $qtdeCrianca, string $descricao)
    {
        
        $this->qtdeCrianca = $qtdeCrianca;
        $this->descricao = $descricao;
        
    }

    public function getQtdeCrianca(): int
    {
        return $this->qtdeCrianca;
    }

    public function setQtdeCrianaca(int $qtdeCrianca): void
    {
        $this->qtdeCrianca = $qtdeCrianca;

    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }




 }