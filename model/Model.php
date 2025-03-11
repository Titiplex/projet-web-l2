<?php

namespace model;

use Exception;

/**
 * @property int id
 */
class Model {
    private int $id;
    protected function __construct(int $id) {
        $this->id = $id;
    }

    /**
     * @throws Exception
     */
    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new Exception("Property '$name' does not exist");
    }

    /**
     * @throws Exception
     */
    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            throw new Exception("Property '$name' does not exist");
        }
    }

}