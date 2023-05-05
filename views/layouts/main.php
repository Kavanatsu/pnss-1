<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="/pnss-1/public/assets/css/main.css">
   <title>Pop it MVC</title>
</head>
<body>
<header>
   <nav>
      <h1><a href="<?= app()->route->getUrl('/main') ?>">Кадровая служба</a><h1>
      <?php if (app()->auth::check()): ?>
         <h2>Здравствуйте, <?= app()->auth::user()->employee->name ?><h2>
         <a href="<?= app()->route->getUrl('/logout') ?>" class="logout">Выход</a>
         <?php if (app()->auth::user()->role === 'admin') { ?>
            <a href="<?= app()->route->getUrl('/admin-panel') ?>" class="logout">Админ-панель</a>
         <?php } ?>
      <?php endif; ?>
   </nav>
</header>
<main>
   <?= $content ?? '' ?>
</main>
</body>
</html>
