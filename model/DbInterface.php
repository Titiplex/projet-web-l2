<?php

namespace model;

interface DbInterface {

    /**
     * @param int $id
     * @return Model
     */
    function selectById(int $id) : Model;

    /**
     * @return array
     */
    function selectAll() : array;

    /**
     * @param Model $data
     * @return bool
     */
    function insert(Model $data) : bool;

    /**
     * @param Model $data
     * @return bool
     */
    function update(Model $data) : bool;

    /**
     * @param int $id
     * @return bool
     */
    function delete(int $id) : bool;
}