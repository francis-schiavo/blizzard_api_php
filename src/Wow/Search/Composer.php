<?php

namespace BlizzardApi\Wow\Search;

class Composer
{
    private array $fields = [];

    private array $order = [];

    /**
     * @param int $page The current page
     * @param int $pageSize The amount of records per page
     */
    public function __construct(public int $page, public int $pageSize)
    {
    }

    /**
     * @param string $field The field to query
     * @param string|int|array|null $value A value or array of values
     * @param bool $inclusive When using a range determines if min and max values must be included in the result
     * @param string|int|null $min Minimum value to search for
     * @param string|int|null $max Maximum value to search for
     * @return $this The function returns the instance for chaining
     * @throws QueryException
     */
    public function where(string $field, string|int|array|null $value, bool $inclusive = true, string|int|null $min = null, string|int|null $max = null): static
    {
        if (!is_null($value) && (!is_null($min) || !is_null($max))) {
            throw new QueryException('Value must be null when using min/max values', 600);
        }

        if (isset($value)) {
            $this->fields[] = $field . '=' . rawurlencode($this->resolve_value($value));
        } else {
            $this->fields[] = $field . '=' . rawurlencode($this->resolve_range($min, $max, $inclusive));
        }

        return $this;
    }

    /**
     * @param string|int|array $value
     * @return string
     */
    private function resolve_value(string|int|array $value): string
    {
        if (is_array($value)) {
            return implode('||', $value);
        } else {
            return "$value";
        }
    }

    /**
     * @param string|int|null $min Minimum value
     * @param string|int|null $max Maximum value
     * @param bool $inclusive If true range will include min and max values
     * @return string
     */
    private function resolve_range(string|int|null $min, string|int|null $max, bool $inclusive): string
    {
        $min = $min ?: '';
        $max = $max ?: '';

        if ($inclusive) {
            return "[$min,$max]";
        } else {
            return "($min,$max)";
        }
    }

    /**
     * @param string $field The field to query
     * @param string|int|array|null $value A value or array of values
     * @param bool $inclusive When using a range determines if min and max values must be included in the result
     * @param string|int|null $min Minimum value to search for
     * @param string|int|null $max Maximum value to search for
     * @return $this The function returns the instance for chaining
     * @throws QueryException
     */
    public function where_not(string $field, string|int|array|null $value, bool $inclusive = true, string|int|null $min = null, string|int|null $max = null): static
    {
        if (!is_null($value) && (!is_null($min) || !is_null($max))) {
            throw new QueryException('Value must be null when using min/max values', 600);
        }

        if (isset($value)) {
            $this->fields[] = $field . '!=' . rawurlencode($this->resolve_value($value));
        } else {
            $this->fields[] = $field . '!=' . rawurlencode($this->resolve_range($min, $max, $inclusive));
        }

        return $this;
    }

    /**
     * @param string $field The field to sort
     * @param SortDirection $direction The direction to sort
     * @return $this The function returns the instance for chaining
     */
    public function order_by(string $field, SortDirection $direction = SortDirection::ASC): static
    {
        $this->order[] = "$field:$direction->value";
        return $this;
    }

    /**
     * @return string The API formatted search query string
     */
    public function toSearchQuery(): string
    {
        $query = "_page=$this->page&_pageSize=$this->pageSize";

        if (count($this->fields)) {
            $query .= '&' . implode('&', $this->fields);
        }

        if (count($this->order)) {
            $query .= '&orderby=' . implode(',', $this->order);
        }

        return $query;
    }
}