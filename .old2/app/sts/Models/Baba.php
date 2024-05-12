<?php
namespace Sts\Controllers;

class Baba{ 

    private ?int $idBaba;
    private int $tempoExp;
    private string $ref;
    private string $sobre;
    private float $valor;

    public function __construct(?int $idBaba, int $tempoExp, string $ref, string $sobre, float $valor)
    {
        $this->idBaba = $idBaba;
        $this->tempoExp = $tempoExp;
        $this->ref = $ref;
        $this->sobre = $sobre;
        $this->valor = $valor;
        
    }

    public function getIdBaba(): ?int
    {
        return $this->idBaba;
    }

    public function setId(?int $idBaba): void
    {
        $this->idBaba = $idBaba;

    }

    public function getTempoExp(): int
    {
        return $this->tempoExp;
    }

    public function setTempoExp(int $tempoExp): void
    {
        $this->tempoExp = $tempoExp;

    }

    public function getRef(): string
    {
        return $this->ref;
    }

    public function setRef(string $ref): void
    {
        $this->ref = $ref;
    }

    public function getSobre(): string
    {
        return $this->sobre;
    }

    public function setSobre(string $sobre): void
    {
        $this->sobre = $sobre;
    }

    public function getVALOR(): float
    {
        return $this->valor;
    }

    public function setValor(string $valor): void
    {
        $this->valor = $valor;
    }







    

}