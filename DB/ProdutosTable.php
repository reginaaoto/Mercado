<?php

namespace Elaborata\Mercado\DB;

use Elaborata\Mercado\Produtos\Produto;
/**
 * Retorna o produto pelo codigo informado
 * @param string $codigo
 * @retunr Produto | false
 */
class ProdutosTable extends Table
{
    public function buscar($codigo) 
    {
        $sql = "SELECT * 
                FROM produtos 
                WHERE codigo = $codigo;";
        
        $return = $this->getDBCon()->query($sql);
        $return->setFetchMode(\PDO::FETCH_CLASS, 'Elaborata\Mercado\Produtos\Produto');
        return $return->fetch();
        
    }
    
    /**
     * Insere o objeto do BD
     * @param Produto $produto
     * @return int | false
     */
    public function inserir(Produto $produto) 
    {
        $sql = " INSERT INTO produtos (codigo, nome, quantidade, precoUnitario, desconto)
                 VALUES (
                 '".$produto->getCodigo()."',
                 '".$produto->getNome()."',
                 '".$produto->getQuantidade()."',
                 '".$produto->getPrecoUnitario()."',
                 '".$produto->getDesconto()."') ";
        $return = $this->getDBCon()->exec($sql);
        return $return;
    }

    /**
     * Atualiza o objeto do BD
     * @param Produto $produto
     * @return type
     */
    public function atualizar(Produto $produto) 
    {
        $sql = " UPDATE produtos 
                 SET quantidade = '".$produto->getQuantidade()."',
                 desconto  = '".$produto->getDesconto()."',
                 preco = '".$produto->getPrecoUnitario()."',    
                 WHERE codigo = '".$produto->getCodigo()."'";
        
        try{
            $return = $this->getDBCon()->exec($sql);
        } catch (\PDOException $e) {
                
        }
        
        return $return;
    }

}
