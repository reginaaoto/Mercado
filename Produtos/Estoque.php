<?php


namespace Elaborata\Mercado\Produtos;

use Elaborata\Mercado\Produtos\Produto;
use Elaborata\Mercado\DB\ProdutosTable;

class Estoque {
    
    static private $instance = null;
    private $produtos;
    
    private function __construct() 
    {
        $dsn = 'mysql:dbname=PHPII;host=127.0.0.1';
        $user = 'root';
        $password = 'elaborata';
        $pdo = new \PDO($dsn,$user,$password); 
        
        $this->produtos = new ProdutosTable($pdo);
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
       
        //var_dump($prodEstoque);die();
        
        if ($prodEstoque==null)
        {
            $this->produtos->inserir($produto);
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
            
            $this->produtos->atualizar($prodEstoque);
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
        $prodEstoque =$this->retornaProduto($produto);
        $quantAnterior = $prodEstoque->getQuantidade();
        
        if (($quantAnterior - $quantidade)<0)
        {
            throw new \Exception("Nao existe em estoque a quantidade informada."); //O programa finaliza
        }    
        
       
        $prodEstoque->setQuantidade($quantAnterior - $quantidade);
        
        $this->produtos->atualizar($prodEstoque);
        
        return $this;                
    }        
       
    /**
     * Retorna o produto com o codigo informado ou null se nao achar
     * @param string $codigo
     * @return Produto | null
     */
    
    public function procuraProduto($codigo)
    {
        $result = $this->produtos->buscar($codigo);
        return ($result != false)? $result : null;
    }        
        
    /**
     * 
     * @param Produto $produto
     * @return Produto | null
     */
   
    private function retornaProduto(Produto $produto)
    {
        return $result = $this->procuraProduto($produto->getCodigo());
    }          
}