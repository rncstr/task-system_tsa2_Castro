<?php
namespace App\Controllers;
use App\Models\TaskModel;

class Pages extends BaseController
{
    public function welcome()
    {
        $model = new TaskModel();
        // Load only non-archived tasks for the welcome screen
        $data['tasks'] = $model->where('is_archived', 0)->findAll();
        return view('pages/welcome', $data);
    }

    public function about()
    {
        return view('pages/about');
    }

    public function profile()
    {
        return view('pages/profile');
    }
}