<?php

namespace Terranet\Administrator\Field\Traits;

trait IsArray
{
    protected $isArray = false;

    public function isArray(): self
    {
        $this->isArray = true;

        return $this;
    }
}
