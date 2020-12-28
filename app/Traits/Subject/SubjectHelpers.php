<?php

namespace App\Traits\Subject;

use App\Models\Subject;

trait SubjectHelpers
{
    private function subjectExists(int $id): bool
    {
        return Subject::find($id) ? true : false;
    }

    private function getSubject(int $id): Subject
    {
        return Subject::find($id)->get();
    }
}