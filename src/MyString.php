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
        if ($this->isMetricByteUnit($suffix)) {
            $suffix = " " . $this->sanitizeMetricByteUnit($suffix);
        }

        $this->value .= $suffix;
    }

    protected function isMetricByteUnit(string $suffix): bool
    {
        // 1000     kB  kilobyte
        // 1000^2   MB  megabyte
        // 1000^3   GB  gigabyte
        // 1000^4   TB  terabyte
        // 1000^5   PB  petabyte
        // 1000^6   EB  exabyte
        // 1000^7   ZB  zettabyte
        // 1000^8   YB  yottabyte

        return preg_match('/^[kMGTPEZY]B$/ui', $suffix);
    }

    protected function sanitizeMetricByteUnit(string $suffix): string
    {
        if (strtolower($suffix[0]) == 'k') {
            return "kB";
        }

        return strtoupper($suffix);
    }
}
