<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
 <a class="navbar-brand" href="#">
    <img src="<?php $_SERVER['DOCUMENT_ROOT']?>/images/pingwin2.jpg" alt="#" style="width:40px;">
  </a>
  <ul class="navbar-nav">
    <?php
        // Define each name associated with an URL
        $urls = array(
            'START' => '/',
            'Lab 1' => 'lab1.php',
			'Lab 2' => 'lab2.php',
			'Lab 3' => 'lab3.php',
			'Lab 4' => 'lab4.php',
			'Lab 5' => 'lab5.php',
			'Lab 7' => 'lab7.php',
        );

        foreach ($urls as $name => $url) {
            print '<li '.(($currentPage === $name) ? ' class="nav-item active" ': 'class="nav-item"').
                '><a class="nav-link" href="'.$_SERVER['DOCUMENT_ROOT'].''.$url.'">'.$name.'</a></li>';
        }
    ?>
</nav>
