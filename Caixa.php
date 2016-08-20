<?php

namespace Elaborata\Mercado;

use Produtos\Produto;

class Caixa {
    private $totalPagar = 0;
    private $carrinho = array();
    
    /**
     * Adiciona no carrinho o produto selecionado e remove do estoque
     *
     * @param Produto $produto
     * @param int $quant
     */
    public function addProduto(Produto $produto, $quant)
    {
        
    }        
    
    /**
     * Calcula o total a ser pago
     * @return float
     */
    public function getTotalPagar()
    {
        
    }        
}