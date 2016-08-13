<?php


namespace Elaborata\Mercado\Produtos;

use Elaborata\Mercado\Produtos\Produto;


class Estoque {
    
    static private $instance = null;
    private $produtos = array();
    
    private function __construct() 
    {
       
    }

    // Acessa a funcao sem precisar criar o objeto
    static public function getInstance()
    {
        if(self::$instance == NULL)
        {
            self::$instance = new self();
        }    
        return self::$instance;
    }
            

    /**
     * Adiciona o produto no gerenciador do estoque
     * @param Produto $produto
     * @return Estoque
     */
        
    public function addEstoque(Produto $produto)
    {
        $prodEstoque = $this->retornaProduto($produto);
       
        if ($prodEstoque==null)
        {
            array_push($this->produtos, $produto);
        }
        else
        {
            $nome = ($produto->getNome() != null)? $produto->getNome() : $prodEstoque->getNome();
            $prodEstoque->setNome($nome);
            
            $desconto = ($produto->getDesconto() != null)? $produto->getDesconto() : $prodEstoque->getDesconto();
            $prodEstoque->setDesconto($desconto);
            
            $quant = ($produto->getQuantidade()>0)? $produto->getQuantidade()+$prodEstoque->getQuantidade() : $prodEstoque->getQuantidade();
            $prodEstoque->setQuantidade($quant);
            
            $preco = ($produto->getPrecoUnitario() != null)? $produto->getPrecoUnitario() : $prodEstoque->getPrecoUnitario();
            $prodEstoque->setPrecoUnitario($preco);
        }
        
        return $this;
     }
       
    public function getEstoque()
    {
        return $this->produtos;
    }
    
    /**
     * Remove a quantidade do estoque do produto selecioado
     * @param Produto $produto
     * @param int $quantidade
     * @return Estoque
     */
    
    public function deletaEstoque($produto,$quantidade)
    {
        $quantAnterior = $produto->getQuantidade();
        
        if (($quantAnterior - $quantidade)<0)
        {
            throw new \Exception("Nao existe em estoque a quantidade informada."); //O programa finaliza
        }    
        
        $prodEstoque =$this->retornaProduto($produto);
        $prodEstoque->setQuantidade($quantAnterior - $quantidade);
        return $this;                
    }        
    
    public function deletaEstoqueEx1($produto,$quantidade)
    {  
       echo '<br><br>Remover do estoque: '.$produto->getNome().' quantidade:'.$quantidade ;
       foreach($this->produtos as $item)
        {
           if($produto== $item)
           {
               
               echo '<br>'.$produto->getNome().' tem em estoque: '.$produto->getQuantidade();
               $totalEstoque = $produto->getQuantidade()-$quantidade;
               
               if ($totalEstoque<0)
               {
                    echo '<br>Alerta: '.$produto->getNome().' nao tem estoque suficiente para a quantidade solicitada.'; 
               } 
               else
               {
                    $produto->setQuantidade($totalEstoque);
                    echo '<br>'.$produto->getNome().' teve o estoque atualizado: '.$produto->getQuantidade();
               }
           }
        }    
    }
    
    /**
     * Retorna o produto com o codigo informado ou null se nao achar
     * @param string $codigo
     * @return Produto | null
     */
    
    public function procuraProduto($codigo)
    {
        foreach($this->produtos as $produto)
        {
            if($produto->getCodigo() == $codigo)
            {    
                return $produto;
            }    
        }    
        return null;        
    }        
    
    public function procuraProdutoEx1($codigo)
    { 
       $bAchou = false; 
       $nomeProduto = '';
        
       echo '<br><br>Realizar busca de produto com o codigo '.$codigo.':';
         
        foreach($this->produtos as $produto)
        {
           if($produto->getCodigo() == $codigo)
           {
               $nomeProduto = '<br>Produto localizado: '.$produto->getNome();
               $bAchou = true;
           }
        }    
        
        if ($bAchou)
        {
           echo $nomeProduto;
        }
        else
        {
            echo '<br>Nenhum produto foi localizado com o codigo '.$codigo;
        }
    }    
    
    /**
     * 
     * @param Produto $produto
     * @return Produto | null
     */
   
    private function retornaProduto(Produto $produto)
    {
        foreach($this->produtos as $prodEstoque)
        {
            if($prodEstoque->getCodigo() == $produto->getCodigo())
            {   
                return $prodEstoque;                
            }
        }       
        
        return null;
    }        
    
    
}