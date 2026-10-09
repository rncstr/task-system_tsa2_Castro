<h2>Edit Task</h2>

<?php if(session()->getFlashdata('errors')): ?>
    <div style="color:red;">
        <?php foreach(session()->getFlashdata('errors') as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="<?= site_url('/tasks/update/'.$task['id']) ?>" method="post">
    <label>Title:</label><br>
    <input type="text" name="title" value="<?= old('title', $task['title']) ?>"><br><br>

    <label>Description:</label><br>
    <textarea name="description"><?= old('description', $task['description']) ?></textarea><br><br>

    <label>Date:</label><br>
    <input type="date" name="task_date" value="<?= old('task_date', $task['task_date']) ?>"><br><br>

    <button type="submit">Update Task</button>
    <a href="<?= site_url('/tasks') ?>">Cancel</a>
</form>