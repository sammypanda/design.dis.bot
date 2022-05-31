#!/user/local/bin/php

<?php
/* -------------------------------------------------------------------------- */
/*           The script used to generate and clarify what is needed           */
/* -------------------------------------------------------------------------- */
    $RESET_STRING = "\033[0m"; # src: https://github.com/llamasoft/php-cli_colors/blob/master/colors.inc.php
    $release = "https://github.com/sammypanda/design.dis.bot/releases/download/v1/v1.0.0.zip";
    $elected_path = "./";

    /* --------------------- [testing] Initial setup prompts -------------------- */
    echo "[testing] press enter to skip: ";
    $x = chop(fgets(STDIN));
    $x_res = (!empty($x)) ? ($x . PHP_EOL) : ($x); # only line break if user input
    echo $x_res;

    /* ------------------------ Fetching important files ------------------------ */
    echo "Fetching files" . PHP_EOL;
    
    # Fetch the release
    $release_file_name = basename($release);
    echo "\033[0;33m";

    if (!file_put_contents($release_file_name, file_get_contents($release))) {
        echo "\033[1;31m Unable to download release package (" . $release_file_name . ")" . PHP_EOL;
        exit();
    }

    echo $RESET_STRING;

    echo "Extracting files" . PHP_EOL;

    $zip = new ZipArchive;
    if ($zip->open($release_file_name) === true) {
        $zip->extractTo($elected_path);
        $zip->close();                  
    } else {
        exit();
    }

    echo $RESET_STRING;

    /* --------------------------- Finish and clean up -------------------------- */
    echo "Finishing up" . PHP_EOL;

    unlink($release_file_name);
    
    echo PHP_EOL;

    # NOTE: use $argc for count of arguments, argv[0] for file name, argv[1] for first argument
?>