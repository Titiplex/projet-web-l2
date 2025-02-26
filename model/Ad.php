<?php

namespace model;
final class Ad extends Model {
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


}