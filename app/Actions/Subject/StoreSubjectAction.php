<?php

namespace App\Actions\Subject;

use App\Models\Subject;
use Illuminate\Support\Arr;

class StoreSubjectAction
{
    public function execute(array $data)
    {
        return Subject::create(
            [
                "name" => Arr::get($data, "name", null),
                "passing_grade" => Arr::get($data, "passing_grade", null)
            ]
        );
    }
}