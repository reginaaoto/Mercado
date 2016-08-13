<?php


namespace Elaborata\Mercado\Produtos;

/**
 * class Entity
 * para DataMapper
 */

class Produto 
{
    private $codigo;
    private $nome = '';
    private $quantidade = 0;
    private $precoUnitario = 0;
    private $desconto = 0;
    
    public function getCodigo() 
    {
        return $this->codigo;
    }

    public function getNome() 
    {
        return $this->nome;
    }

    public function getPrecoUnitario() 
    {
        return $this->precoUnitario;
    }

    public function getQuantidade() 
    {
        return $this->quantidade;
    }

    public function getDesconto() 
    {
        return $this->desconto;
    }

    public function setCodigo($codigo) 
    {
        $this->codigo = $codigo;
    }

    public function setNome($nome) 
    {
        $this->nome = $nome;
    }

    public function setPrecoUnitario($precoUnitario) 
    {
        $this->precoUnitario = $precoUnitario;
    }

    public function setQuantidade($quantidade) 
    {
        $this->quantidade = $quantidade;
    }

    public function setDesconto($desconto) 
    {
        $this->desconto = $desconto;
    }

}
