<h2>Task List</h2>
<a href="<?= site_url('/') ?>">Welcome</a> | 
<a href="<?= site_url('/about') ?>">About</a> | 
<a href="<?= site_url('/profile') ?>">Profile</a>

<?php if(session()->get('logged_in')): ?>
    | <a href="<?= site_url('/tasks/new') ?>">+ Create New Task</a>
    | <a href="<?= site_url('/logout') ?>">Logout</a>
<?php else: ?>
    | <a href="<?= site_url('/login') ?>">Login to Manage Tasks</a>
<?php endif; ?>

<hr>

<ul>
    <?php foreach($tasks as $task): ?>
        <li>
            <strong><?= esc($task['title']) ?></strong> (<?= esc($task['task_date']) ?>)<br>
            <?= esc($task['description']) ?>
            
            <?php if(session()->get('logged_in')): ?>
                <br>
                <a href="<?= site_url('/tasks/edit/'.$task['id']) ?>">Edit</a> | 
                <a href="<?= site_url('/tasks/delete/'.$task['id']) ?>" onclick="return confirm('Archive this task?');">Delete</a>
            <?php endif; ?>
        </li><br>
    <?php endforeach; ?>
</ul>