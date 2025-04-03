<?php

namespace model;

require_once "Model.php";

/**
 * @property int annonce_id
 * @property string binary
 */
class Image extends Model
{
    protected int $annonce_id;
    protected string $url;

    public function __construct(int $id, int $annonce_id, string $url)
    {
        parent::__construct($id);
        $this->annonce_id = $annonce_id;
        $this->url = $url;
    }
}
