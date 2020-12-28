<?php

namespace App\Http\Controllers;

use App\Actions\Subject\DeleteSubjectAction;
use App\Actions\Subject\StoreSubjectAction;
use App\Actions\Subject\UpdateSubjectAction;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function all()
    {
        return response()->json(Subject::all());
    }

    public function show(int $id)
    {
        return Subject::findSubject($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "string",
            "passing_grade" => "integer|min:50|max:100"
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $executed = (new StoreSubjectAction())
                ->execute($request->all());

        return response()->json($executed);
    }

    public function destroy(int $id)
    {
        return (new DeleteSubjectAction())->execute($id);
    }

    public function update(int $id, Request $request)
    {
        return (new UpdateSubjectAction(
            $id,
            $request->only("name", "passing_grade")
        ))->execute();
    }
}
