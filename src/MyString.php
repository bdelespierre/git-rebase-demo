<?php

namespace GitRebaseDemo;

use GitRebaseDemo\Interfaces\WrapperInterface;

class MyString implements WrapperInterface
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
        if ($this->isMetricMassUnit($suffix)) {
            $suffix = " " . $this->sanitizeMetricMassUnit($suffix);
        }

        $this->value .= $suffix;
    }

    public function prepend(string $prefix): void
    {
        $this->value = "{$prefix}{$this->value}";
    }

    public function unbox(): string
    {
        return $this->value;
    }

    protected function isMetricMassUnit(string $suffix): bool
    {
        // 1 gigatonne (Gt)    =1 000 000 000 000 000 g
        // 1 megatonne (Mt)    =1 000 000 000 000 g
        // 1 tonne     (t)     =1 000 000 g
        // 1 kilogram  (kg)    =1 000 g
        // 1 gram      (g)     =1 g
        // 1 milligram (mg)    =0.001 g
        // 1 microgram (µg)    =0.000 001 g
        // 1 nanogram  (ng)    =0.000 000 001 g
        // 1 picogram  (pg)    =0.000 000 000 001g

        return preg_match('/^([GM]?t|[kmµnp]?g)$/ui', $suffix);
    }

    protected function sanitizeMetricMassUnit(string $suffix): string
    {
        $suffix = strtolower($suffix);

        if (str_ends_with($suffix, 'g')) {
            return $suffix;
        }

        if (str_ends_with($suffix, 't')) {
            return $suffix == 't' ? $suffix : strtoupper($suffix[0]) . $suffix[1];
        }

        // extremely defensive programming
        throw new \UnexpectedValueException("invalid metric mass unit: {$suffix}");
    }
}
