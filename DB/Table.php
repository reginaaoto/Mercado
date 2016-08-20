<?php
namespace Elaborata\Mercado\DB;
/**
 * Description of Table
 *
 * @author aluno
 */
abstract class Table 
{
    private $dbcon;
    
    public function __construct(\PDO $dbcon)
    {
        $this->dbcon = $dbcon;
    }
    
    /**
     * Retorna a conexao com o DB
     * @return \PDO
     */
    protected function getDBCon()
    {
        return $this->dbcon;
    }
    
    public function inserir()
    {
        
    }        
    
    public function atualizar()
    {
        
    }   
    
    public function deletar()
    {
        
    }   
    
    public function buscar()
    {
        
    }   
}
