<?php

namespace model;

class Model {
    public int $id;
    protected function __construct(int $id) {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

}