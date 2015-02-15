<?php

class CXpageIblockElementAddXform extends CBitrixComponent
{
    private $rules = array();
    private $errors = array();

    const DEFAULT_ERROR_MESSAGE = '#PROPERTY# не заполнено или заполнено неверно';
    
    public function executeComponent() {
        $this->set_rules($this->arParams['RULES']);
        parent::executeComponent();
    }
    
    private function set_rules($rules) {
        $this->rules = $rules;
    }

    public function get_errors($prop_id) {
        return $this->errors[$prop_id];
    }
    
    public function validate_property($property, $value) {
        if (!empty($this->rules) && array_key_exists($property['CODE'], $this->rules)) {
            foreach ($this->rules[$property['CODE']] as $rule) {
                if ($rule['CONDITION'] instanceof \Closure) {
                    if(!$rule['CONDITION']($value)) {
                        $this->errors[$property['ID']][] = str_replace('#PROPERTY#', $property['NAME'], $rule['MESSAGE'] ?: self::DEFAULT_ERROR_MESSAGE);
                    }
                }
            }
        }
        return empty($this->errors[$property['ID']]);
    }
}