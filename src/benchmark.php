<?php
$paths = array(
    '/',
);
$host = 'host.com';
$tests = 10;

$start = microtime(true);
$results = array();

foreach ($paths as $path) {
    $url = 'http://' . $host . $path;

    $startTest = microtime(true);

    for ($i = 0; $i < $tests; $i++) {
        $data = file_get_contents($url);
    }

    $endTest = microtime(true);
    $totalTime = round($endTest - $startTest, 3);
    $avgTime = round($totalTime / $tests, 3);

    $results[] = array(
        'url' => $url,
        'totalTime' => $totalTime,
        'avgTime' => $avgTime,
        'tests' => $tests,
    );
}

$summary = array();

$totalTime = 0;
foreach ($results as $result) {
    $totalTime += $result['avgTime'];
}

$summary['totalTime'] = $totalTime;
$summary['avgTime'] = round($totalTime / sizeof($results), 3);
$summary['tests'] = sizeof($results);

print_R($summary);
print_R($results);
?>