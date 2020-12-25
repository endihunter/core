<?php

namespace Terranet\Administrator\Traits\Form;

trait SupportsTypes
{
    /** @var string */
    public $type = 'select';

    /**
     * @return $this
     */
    public function setType(string $type = 'datalist'): self
    {
        if (!in_array($type, ['datalist', 'select'])) {
            throw new Exception("Invalid type {$type}");
        }
        $this->type = $type;

        return $this;
    }
}
