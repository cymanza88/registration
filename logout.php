<?php
session_start();

session_unsent();
session_destroy();

header("Location: index.php");