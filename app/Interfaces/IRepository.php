<?php

namespace App\Interfaces;

interface IRepository
{
    function findAll(array $queries = []);
    function findById($id);
    function create(array $params = []);
    function update($id, array $params = []);
    function delete($id);
}
