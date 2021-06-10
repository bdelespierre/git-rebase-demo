<?php

namespace GitRebaseDemo;

class MyString
{
    public function __construct(
        public string $value,
    ) {
    }

    public function __toString()
    {
        return $this->value;
    }
}
