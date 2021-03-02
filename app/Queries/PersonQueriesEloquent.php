<?php


namespace App\Queries;


use App\Models\Group;
use App\Models\Person;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class PersonQueriesEloquent implements PersonQueries
{

    public function getActiveByGroupId(int $groupId): Collection
    {
        $res = new Collection([]);
        $group = Group::where(['archive' => false, 'id' => $groupId])->first();
        if (null === $group) {
            return $res;
        }

        return Person::where(['active' => true, 'group_id' => $groupId])->get();
        // можно сделать так, но мне больше нравится способ выше, т.к. запросы проще
//        return Person::where(['active' => true])
//            ->whereHas('group', function (Builder $query) use ($groupId){
//                $query->where(['archive' => false, 'id' => $groupId]);
//            })
//            ->get();
    }
}
