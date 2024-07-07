<?php
// app/views/home/index.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php if (!empty($name)) : ?>
        <h1>Hello <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></h1>
    <?php else : ?>
        <h1>Hello</h1>
    <?php endif; ?>
</body>
</html>
