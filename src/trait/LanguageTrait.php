<?php

namespace Libs\trait;

use Libs\config\IoException;

trait LanguageTrait
{
    private $printArr = ['json', 'xml'];

    protected $rows = [];

    public function parseLanguage(string $print = 'json', array $rows = [])
    {
        $this->rows = $rows;
        switch ($print) {
            case 'json':
                return $this->setJson();

            case 'xml':
                return $this->setXml();

            default: throw new IoException("无效的打印模式", 1002);
        }
    }

    private function setJson(): string
    {
        return json_encode($this->rows, JSON_UNESCAPED_UNICODE);
    }

    private function setXml()
    {
        return convertMes($this->rows);
    }
}
