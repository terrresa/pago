<?php

namespace Application\Repository ;
use Zend\Db\Adapter\AdapterInterface; 
use Zend\Db\Sql\Sql; 

class MarcaRepository{
    
    /**
     * @var AdapterInterface
     */
    protected $adapter;
    /**
     * MarcaRepository constructor.
     * @param AdapterInterface $adapter
     */    

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
    public function listar()
    {
        $adapter = $this->adapter;

        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->from('marca');
        $select->where(['id' => 2]);

        $statement = $sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        return iterator_to_array($results, true);
    }
    
}
