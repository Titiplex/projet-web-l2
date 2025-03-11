<?php

namespace model;

require_once __DIR__ . "/Model.php";

use Exception;

/**
 * @property string title
 * @property string description
 * @property string localisation
 * @property int price
 * @property int id_user
 */
final class Ad extends Model
{
    private string $title;
    private string $description;
    private string $localisation;
    private int $price;
    private int $id_user;
    public function __construct(int $id, string $title, string $localisation, string $description, int $price, $id_user) {
        parent::__construct($id);
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->id_user = $id_user;
        $this->localisation = $localisation;
    }

}