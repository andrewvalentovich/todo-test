<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class TaskFilter extends AbstractFilter
{
    const TITLE = 'title';
    const TAGS = 'tags';

    protected function getCallbacks(): array
    {
        return [
            self::TAGS => [$this, 'tags'],
            self::TITLE => [$this, 'title'],
        ];
    }

    protected function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    protected function tags(Builder $builder, $value)
    {
        $builder->whereHas('tags', function ($b) use ($value) {
            $b->whereIn('tag_id', $value);
        });
    }
}
