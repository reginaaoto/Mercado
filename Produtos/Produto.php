<?php

namespace Elaborata\Mercado\Produtos;

class Produto 
{
    private $codigo=0;
    private $nome='';
    private $preco_unitario=0.0;
    private $qtd_estoque=0;
    private $desconto=0.0;
    
    public function getCodigo() 
    {
        return $this->codigo;
    }

    public function getNome() 
    {
        return $this->nome;
    }

    public function getPreco_unitario() 
    {
        return $this->preco_unitario;
    }

    public function getQtd_estoque() 
    {
        return $this->qtd_estoque;
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

    public function setPreco_unitario($preco_unitario) 
    {
        $this->preco_unitario = $preco_unitario;
    }

    public function setQtd_estoque($qtd_estoque) 
    {
        $this->qtd_estoque = $qtd_estoque;
    }

    public function setDesconto($desconto) 
    {
        $this->desconto = $desconto;
    }

}
