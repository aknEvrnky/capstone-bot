<?php

namespace App\CapstoneService;

use Illuminate\Support\Str;

readonly class FilterOptions
{
    public function __construct(
        public array $department_ids = [],
        public array $advisor_ids = [],
    )
    {
    }

    public function query(): string
    {
        $query = '';
        foreach ($this->department_ids as $department_id) {
            $query .= '&department-ids=' . $department_id;
        }

        foreach ($this->advisor_ids as $advisor_id) {
            $query .= '&advisor-ids=' . $advisor_id;
        }

        return Str::of($query)->replaceFirst('&', '?');
    }
}
