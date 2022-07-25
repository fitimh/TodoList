<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class TodoController extends Controller
{

    public function getAll(Request $request)
    {
        // Filter As Todo and by Tag
        if ($request->has('filter') && $request->filter != "false") {
            $todo = Todo::whereHas('tags', function ($query) use ($request) {
                $query->where('tag', 'like', '%' . $request->filter . '%');
            });
        } else if ($request->has('today') && $request->today == "true") {
            $today = Carbon::today()->toDateString();
            $todo = Todo::whereDate('created_at', $today);
            return response()->json($todo);

        } else if ($request->has('done') && $request->done == "true") {
            $todo = Todo::where('status', 1);
        } else if ($request->has('scheduled') && $request->scheduled == "true") {
            $sch_date = Carbon::today()->toDateString();
            $todo = Todo::whereDate('start_date', ">", $sch_date);
        } else if ($request->has('priority') && $request->priority == "true") {
            $todo = Todo::where('favorites', 1);
        } else {
            $todo = Todo::query();
        }

        $todo = $todo->orderBy('created_at', 'desc')->get();

        return response()->json($todo);
    }
    public function addTodo(Request $request)
    {
        $v = Validator::make($request->all(), [
            'title' => "required|min:4",

//            'title' => "required|unique:todos,title|min:4",
            'notes' => 'required|min:10',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:0,1',
            'tags' => 'nullable|array',
            'tags.*.tag' => 'required_with:tags,string',
        ]);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $todo = Todo::create($v->validated());

        $req = $v->validated();

        $tags = [];
        if(array_key_exists('tags', $req)) {
            $tags = $req["tags"];
            $todo->tags()->createMany($tags);
        }

        return response()->json(['status' => 'Success!', 'data' => $todo, 'tags' => $tags], 200);
    }

    public function deleteTodoById($id)
    {
        $todo = Todo::find($id);

        if ($todo) {
            $todo->delete();
            return response()->json('Todo deleted successfully!');
        }
    }
    public function getById($id)
    {
        $todo = Todo::find($id);
        return response()->json($todo);
    }
    public function addfavorite($id)
    {
        $todo = Todo::find($id);
        if ($todo->favorites == null) {
            $todo->favorites = 1;
            $todo->save();

        }else {
            $todo->favorites = null;
            $todo->save();
        }
        return response()->json($todo);
    }
}
