<?php

namespace model;

require_once "Image.php";

/**
 * @property int annonce_id
 * @property string binary
 */
class Image extends Model
{
    protected int $annonce_id;
    protected string $binary; // Contenu binaire de l'image (BYTEA)

    public function __construct(int $id, int $annonce_id, string $binary)
    {
        parent::__construct($id);
        $this->annonce_id = $annonce_id;
        $this->binary = $binary;
    }
}
