<?php
require_once __DIR__ . '/../header.php';
session_destroy();
header("location: ../index.php");
