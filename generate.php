<?php

$framerates = [
    24,
    25,
    30,
    50,
    60,
];

$tableHeader = [
    'BPM',
    'Frames per beat',
    'Milliseconds per beat',
];

printf("# Video FPS vs. Music BPM\n");
printf("This file is generated using `generate.php`.\n");

foreach ($framerates as $framerate) {
    printf("## %d fps\n", $framerate);

    printf("| %s |\n", implode(' | ', $tableHeader));
    printf("|%s\n", str_repeat('--:|', count($tableHeader)));

    for ($frames = $framerate; $frames > 0; $frames--) {
        $miliseconds = 1000 * $frames / $framerate;
        $bpm = 60 / ($frames / $framerate);

        if ($bpm < 240.0 && round($bpm) === $bpm) {
            printf("| %d | %2d | %3d |\n", $bpm, $frames, $miliseconds);
        }
    }
}
