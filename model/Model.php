<?php

namespace model;

class Model {
    private int $id {
        get {
            return $this->id;
        }
    }
    protected function __construct(int $id) {
        $this->id = $id;
    }
}