<?php

namespace App\Actions\Subject;

use App\Models\Subject;

class DeleteSubjectAction
{
    public function execute(int $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json([
                "message" => "Subject not found!",
                "status" => 404
            ], 404);
        }

        $subject->delete($id);

        return response()->json([
            "message" => "$subject->name subject deleted successfully!",
            "status" => 200
        ]);
    }
}