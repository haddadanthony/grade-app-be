<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ["name", "passing_grade"];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, "student_subject")
                    ->withPivot("grade");
    }

    public static function findSubject(int $id)
    {
        $subject = Subject::find($id);

        return $subject ? response()->json($subject) : response()->json(["message" => "not found"]);
    }

    public static function subjectExists(int $id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return response()->json([
                "message" => "Subject not found!"
            ]);
        }

        return $subject;
    }
}
