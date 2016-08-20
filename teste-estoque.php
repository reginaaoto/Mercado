<pre>
<?php

require_once './Produtos/Produto.php';
require_once './Produtos/Estoque.php';
require_once './DB/Table.php';
require_once './DB/ProdutosTable.php';

require_once './vendor/autoload.php'; /*chama uma unica vez todos os pacotes baixados pelo composer*/

use \Elaborata\Mercado\Produtos\Produto;
use \Elaborata\Mercado\Produtos\Estoque;

$prod1 = new Produto();
$prod1->setCodigo('123456');
$prod1->setNome('Arroz Tiao');
$prod1->setQuantidade(10);
$prod1->setPrecoUnitario(4.23);
$prod1->setDesconto(0);

$prod2 = new Produto();
$prod2->setCodigo('76321');
$prod2->setNome('Lasanha Sadia');
$prod2->setQuantidade(8);
$prod2->setPrecoUnitario(9.78);
$prod2->setDesconto(5.3);

 
/* Adicionado produto na base */
//$estoque = new Estoque();
$estoque =  Estoque::getInstance();
$estoque->addEstoque($prod1);
$estoque->addEstoque($prod2);
print_r($estoque);

/* pesquisa e retorna se houver ou false */
$estoque->procuraProduto('76321'); //Lasanha
$estoque->procuraProduto('99888'); //nenhum

try{
    /* altera o estoque do produto e retorna a quantidade atual */
     $estoque->deletaEstoque($prod2, 2);
     $estoque->deletaEstoque($prod2, 20); //não pode deixar remover mais que o estoque
} catch (\Exception $e)
{
    echo 'Ocorreu um problema: '.$e->getMessage();
}

/*atualiza o estoque */
 $prod3 = new Produto();
 $prod3->setCodigo('76321');
 $prod3->setQuantidade(1);

 $estoque = Estoque::getInstance();
 $estoque->addEstoque($prod3);
 var_dump($estoque);

echo '<br><br>';
//var_dump($prod1);
//var_dump($prod2);
//var_dump($prod3);

foreach($estoque->getEstoque() as $produto)
{
   print_r('<br>Produto: '.$produto->getCodigo().', '.$produto->getNome().', '.$produto->getQuantidade().', '.$produto->getPrecoUnitario().', '.$produto->getDesconto());  
}            

echo "<br> Fim do Teste.";
