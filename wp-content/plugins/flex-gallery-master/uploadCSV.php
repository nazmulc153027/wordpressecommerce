<?php

include "src/ProcessCsv.php";
$processCSV = new ProcessCsv($wpdb);
$parsed_data = $processCSV->importCsv($_POST);
