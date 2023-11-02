<?php

require 'data_creator.php';

class DataGenerator extends DataCreator
{
    /** O nome da coluna como chave e o tipo do dado como valor */
    protected $insert = [
        'nome'        => 'name',
        'sobrenome'   => 'surname',
        'email'       => 'email',
        // 'descricao'   => 'text',
        // 'endereco'    => 'text',
        // 'numero'      => 'number',
        'criado_em'   => 'time',
    ];

    protected $qtd = 200;

    public function __construct(int $qtd)
    {
        $this->setQtd($qtd);
    }

    public function getInsertData(): array
    {
        $finalData = [];
        $this->formatInsertData($finalData);
        return $finalData;
    }

    private function formatInsertData(&$finalData)
    {

        $insert = $this->getInsert();
        for ($i = 1; $i <= $this->getQtd(); $i++) {
            $data = [];
            foreach ($insert as $column => $key) {
                $method = 'get' . ucfirst($key);
                if (method_exists($this, $method)) {
                    $data[$column] = $this->$method();
                }
            }
            array_push($finalData, $data);
        }
    }

    private function getInsert()
    {
        return $this->insert;
    }

    private function setQtd($qtd)
    {
        $this->qtd = $qtd;
    }

    private function getQtd()
    {
        return $this->qtd;
    }
}
