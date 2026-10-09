<h2>Login</h2>
<?php if(session()->getFlashdata('error')): ?>
    <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>

<form action="<?= site_url('/login') ?>" method="post">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>
    
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    
    <button type="submit">Log In</button>
</form>