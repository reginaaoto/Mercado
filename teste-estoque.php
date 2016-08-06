<?php

require_once './Produtos/Produto.php';
require_once './Produtos/Estoque.php';

use \Elaborata\Mercado\Produtos\Produto;
use \Elaborata\Mercado\Produtos\Estoque;

$prod1= new Produto();
$prod1->setCodigo('1');
$prod1->setNome('Arroz');
$prod1->setPreco_unitario('20');
$prod1->getQtd_estoque('10');


$prod2= new Produto();
$prod2->setCodigo('2');

$estoque = new Estoque();
$estoque->addEstoque($prod1);
$estoque->addEstoque($prod2);





        

