<?php

namespace App\Http\Controllers;

use App\Todo;// 追加
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    // 追加
    private $todo;

    // 追加
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    // 追加
    public function create()
    {
        return view('todo.create');
    }

    // 追加
    // 編集
    public function store(TodoRequest $request)
    {
        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();
        // 追加
        return redirect()->route('todo.index');
    }

        // 追加
        public function index()
        {
            $todos = $this->todo->all();
            // 追加
            return view('todo.index', ['todos' => $todos]);
        }

        // 追加
        public function show($id)
        {
            // 追加
            return view('todo.show', ['todo' => $todo]);
        }

        // 追加
        public function edit($id)
        {
            $todo = $this->todo->find($id);
            return view('todo.edit', ['todo' => $todo]);
        }

        // 追加
        public function update(TodoRequest $request, $id)
        {
            $inputs = $request->all();
            $todo = $this->todo->find($id);
            $todo->fill($inputs);
            $todo->save();
            return redirect()->route('todo.show', $todo->id);

        }

        
}


