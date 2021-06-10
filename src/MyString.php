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

    public function append(string $suffix): void
    {
        $this->value .= $suffix;
    }

    public function prepend(string $prefix): void
    {
        $this->value = "{$prefix}{$this->value}";
    }
}
