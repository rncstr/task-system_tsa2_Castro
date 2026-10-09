<?php
namespace App\Controllers;
use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $model = new TaskModel();
        // Load only non-archived tasks
        $data['tasks'] = $model->where('is_archived', 0)->findAll();
        return view('tasks/index', $data);
    }

    public function new()
    {
        return view('tasks/new');
    }

    public function create()
    {
        $rules = [
            'title'     => 'required',
            'task_date' => 'required'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new TaskModel();
        $model->insert([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date'),
            'is_archived' => 0
        ]);

        return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        $model = new TaskModel();
        $data['task'] = $model->find($id);
        return view('tasks/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title'     => 'required',
            'task_date' => 'required'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new TaskModel();
        $model->update($id, [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date')
        ]);

        return redirect()->to('/tasks');
    }

    public function delete($id)
    {
        $model = new TaskModel();
        // Soft delete: sets is_archived to true (1) instead of deleting the row
        $model->update($id, ['is_archived' => 1]);
        return redirect()->to('/tasks');
    }
}