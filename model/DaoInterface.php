<?php

namespace model;

interface DaoInterface {

    function selectById(int $id);

    function selectAll() : array;

    function insert(Model $data) : bool;

    function update(Model $data) : bool;

    function delete(int $id) : bool;
}