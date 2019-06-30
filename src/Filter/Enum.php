<?php

namespace Terranet\Administrator\Filter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Terranet\Administrator\Contracts\Filter\Searchable;

class Enum extends Filter implements Searchable
{
    /** @var string  */
    protected $component = 'enum';

    /** @var array */
    protected $options = [];

    /**
     * @param mixed array|\Closure $options
     *
     * @return self
     */
    public function setOptions($options): self
    {
        if (!(\is_array($options) || $options instanceof \Closure)) {
            throw new \Exception('Enum accepts only `array` or `Closure` as options.');
        }

        if ($options instanceof \Closure) {
            $options = \call_user_func_array($options, []);

            return $this->setOptions($options);
        }

        $this->options = $options;

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param Builder $query
     * @param Model $model
     *
     * @return Builder
     */
    public function searchBy(Builder $query, Model $model): Builder
    {
        if (!\is_array($value = $this->value())) {
            $value = [$value];
        }

        return $query->whereIn("{$model->getTable()}.{$this->id()}", $value);
    }

    /**
     * @return array
     */
    protected function renderWith()
    {
        return [
            'options' => $this->getOptions(),
        ];
    }
}