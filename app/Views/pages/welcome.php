<h2>Welcome to the Tasks Management System</h2>
<a href="<?= site_url('/tasks') ?>">View All Tasks</a>
<hr>
<h3>Current Active Tasks:</h3>
<ul>
    <?php foreach($tasks as $task): ?>
        <li><?= esc($task['title']) ?> - <?= esc($task['task_date']) ?></li>
    <?php endforeach; ?>
</ul>