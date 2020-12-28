<?php

namespace App\Actions\Subject;

use App\Traits\Subject\SubjectHelpers;

class UpdateSubjectAction
{
    use SubjectHelpers;

    protected ?string $subject_name;
    protected int $id;
    protected array $data;

    public function __construct(int $id, array $data)
    {
        $this->id = $id;
        $this->subject_name = $this->getSubject($id)->name;
        $this->data = $data;
    }

    public function execute()
    {
        if (!$this->subjectExists($this->id)) {
            return response()->json([
                "message" => "Subject not found!"
            ]);
        }

        $this->getSubject($this->id)
            ->update($this->data);

        return response()->json([
            "message" => "$this->subject_name subject has been updated successfully!"
        ]);
    }
}
