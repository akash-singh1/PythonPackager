<?php

define('ROOT', './');

require_once(ROOT.'include/main.php');






header("Location: " . ROOT . "manage/index.php?id=" . $_SESSION['projectId']);





