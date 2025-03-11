<?php

namespace model;

/**
 * @property int annonce_id
 * @property string binary
 */
class Image extends Model
{
    private int $annonce_id;
    private string $binary; // Contenu binaire de l'image (BYTEA)

    public function __construct(int $id, int $annonce_id, string $binary)
    {
        parent::__construct($id);
        $this->annonce_id = $annonce_id;
        $this->binary = $binary;
    }
}
