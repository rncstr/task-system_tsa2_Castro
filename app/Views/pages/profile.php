<h2>User Profile</h2>
<?php if (session()->get('logged_in')): ?>
    <p>Logged in as: <strong><?= esc(session()->get('username')) ?></strong></p>
    <a href="<?= site_url('/logout') ?>">Logout</a>
<?php else: ?>
    <p>You are viewing this as a guest.</p>
    <a href="<?= site_url('/login') ?>">Login</a>
<?php endif; ?>
<br><br>
<a href="<?= site_url('/tasks') ?>">Back to Tasks</a>