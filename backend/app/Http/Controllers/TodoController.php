<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getAll(Request $request)
    {
        // Filter As Todo and by Tag
        if ($request->has('filter') && $request->filter != "false") {
            $todo = Todo::whereHas('tags', function ($query) use ($request) {
                $query->where('tag', 'like', '%' . $request->filter . '%');
            })->get();
        } else if ($request->has('today') && $request->today == "true") {
            $today = Carbon::today()->toDateString();
            $todo = Todo::whereDate('created_at', $today)->get();
        } else if ($request->has('done') && $request->done == "true") {
            $todo = Todo::where('status', 1)->get();
        } else if ($request->has('scheduled') && $request->scheduled == "true") {
            $sch_date = Carbon::today()->toDateString();
            $todo = Todo::whereDate('start_date', ">", $sch_date)->get();
        } else if ($request->has('priority') && $request->priority == "true") {
            $todo = Todo::where('favorites', 1)->get();
            return response()->json($todo);

            dd($todo);
        } else {
            $todo = Todo::get();
        }
        return response()->json($todo);
    }
    public function addTodo(Request $request)
    {
        $v = Validator::make($request->all(), [
            // 'title' => "required|min:4",
            'title' => "required|unique:todos,title|min:4",
            'notes' => 'required|min:10',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:0,1',
            'tags' => 'required|array',
            'tags.*.tag' => 'required|string'
        ]);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $todo = Todo::create($v->validated());

        $req = $v->validated();
        $tags = $req["tags"];
        $todo->tags()->createMany($tags);
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

        if ($todo) {
            $todo->favorites = 1;

            $todo->save();

            return response()->json($todo);
        }
    }
}
