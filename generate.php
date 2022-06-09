#!/user/local/bin/php

<?php
/* -------------------------------------------------------------------------- */
/*           The script used to generate and clarify what is needed           */
/* -------------------------------------------------------------------------- */
    $RESET_STRING = "\033[0m"; # src: https://github.com/llamasoft/php-cli_colors/blob/master/colors.inc.php
    $release = "https://github.com/sammypanda/design.dis.bot/releases/download/v1/v1.0.0.zip";
    $elected_path = "./";

    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $clear = system('cls');
    } else {
        $clear = system('clear');
    }

    /* --------------------- [testing] Initial setup prompts -------------------- */
    function namingProcess($empty) {
        echo ($empty) ? $GLOBALS['clear'] . "\033[1;31m" : '';
        echo "Project Name: " . $GLOBALS["RESET_STRING"];
        $x = chop(fgets(STDIN));
        
        if (!empty($x)) {
            mkdir($x);
            $GLOBALS["project"] = $x;
        } else {
            namingProcess(true);
        }
    }

    namingProcess(false);

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
        $zip->extractTo($elected_path . $project);
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