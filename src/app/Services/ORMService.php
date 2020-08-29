<?php

namespace API\Platform\Services;

use \DB;
use API\Platform\Models\Table;
use Artisan;
use Doctrine\Inflector\InflectorFactory;
use Doctrine\Inflector\Language;

class ORMService
{
    private $inflector;

    private $dutchInflector;

    public function __construct()
    {
        $this->inflector = InflectorFactory::create()->build();
        $this->dutchInflector = InflectorFactory::createForLanguage(Language::DUTCH)->build();
    }

    public function tableToClass($table, string $tableName): string
    {
        $language = 'en';
        if ($table) {
            $language = $table->language;
            $tableName = $table->name;
        }
        switch ($language) {
            case 'nl':
                $modelName = $this->inflect($this->dutchInflector, $tableName);
                break;
            default:
                $modelName = $this->inflect($this->inflector, $tableName);
        }
        return $modelName;
    }

    private function inflect($inflector, string $name)
    {
        return $inflector->singularize($inflector->classify($name));
    }
}
