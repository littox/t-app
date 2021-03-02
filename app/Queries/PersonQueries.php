<?php


namespace App\Queries;


use Illuminate\Support\Collection;

interface PersonQueries
{
    public function getActiveByGroupId(int $groupId): Collection;
}
