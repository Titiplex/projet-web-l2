<?php

namespace model;

final class Ad extends Model implements DbInterface {
    private string $name {
        get => $this->name;
        set(string $value) => $this->name = $value;
    }
    private string $imageData {
        get => $this->imageData;
        set(string $value) => $this->imageData = $value;
    }
    private string $description {
        get => $this->description;
        set(string $value) => $this->description = $value;
    }
    private int $price {
        get => $this->price;
        set(int $value) => $this->price = $value;
    }
    public function __construct(int $id, string $name, string $imageData, string $description, int $price) {
        parent::__construct($id);
        $this->name = $name;
        $this->imageData = $imageData;
        $this->description = $description;
        $this->price = $price;
    }

    function selectById(int $id) : Ad
    {
        // TODO: Implement selectById() method.
    }

    function selectAll() : array
    {
        // TODO: Implement selectAll() method.
    }

    function insert(Ad|Model $data) : bool
    {
        // TODO: Implement insert() method.
    }

    function update(Ad|Model $data): bool
    {
        // TODO: Implement update() method.
    }

    function delete(int $id) : bool
    {
        // TODO: Implement delete() method.
    }
}