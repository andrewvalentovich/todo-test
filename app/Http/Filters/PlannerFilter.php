<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PlannerFilter extends AbstractFilter
{
    const ID = 'id';
    const TITLE = 'title';
    const TAGS = 'tags';

    protected function getCallbacks(): array
    {
        return [
            self::ID => [$this, 'id'],
            self::TAGS => [$this, 'tags'],
            self::TITLE => [$this, 'title'],
        ];
    }

    protected function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }

        protected function title(Builder $builder, $value)
    {
        $builder->with('tasks', function ($b) use ($value) {
            $b->where('title', 'like', "%{$value}%");
        });
    }

    protected function tags(Builder $builder, $value)
    {
        $builder->with('tasks', function ($b) use ($value) {
            $b->whereHas('tags', function ($q) use ($value) {
                $q->whereIn('tag_id', $value);
            });
        });
    }
}
