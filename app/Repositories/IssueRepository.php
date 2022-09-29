<?php

namespace App\Repositories;

use App\Interfaces\IRepository;
use App\Issue;

class IssueRepository implements IRepository
{
    function findAll(array $queries = [])
    {
        return Issue::query()->get();
    }

    function findById($id)
    {
        return Issue::query()->find($id);
    }

    function create(array $params = [])
    {
        return (new Issue($params))->saveOrFail();
    }

    function update($id, array $params = [])
    {
        return Issue::query()->where('id', $id)->update($params);
    }

    function delete($id)
    {
        return Issue::query()->delete($id);
    }
}
