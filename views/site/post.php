<h1>Список статей</h1>
<ol>
   <?php
   foreach ($users as $user) {
       echo '<li>' . $user->title . '</li>';
   }
   ?>
</ol>