<?php

require 'Runner.php';
require 'Competition.php';

$alice = new Runner("Alice", "R001");
$bob = new Runner("Bob", "R002");
$charlie = new Runner("Charlie", "R003");
$diana = new Runner("Diana", "R004");
$ethan = new Runner("Ethan", "R005");
$fiona = new Runner("Fiona", "R006");
$george = new Runner("George", "R007");
$hannah = new Runner("Hannah", "R008");
$ivan = new Runner("Ivan", "R009");
$julia = new Runner("Julia", "R010");

$competition = new Competition();

// Adding runners to the competition class
$competition->add_runner($alice);
$competition->add_runner($bob);
$competition->add_runner($charlie);
$competition->add_runner($diana);
$competition->add_runner($ethan);
$competition->add_runner($fiona);
$competition->add_runner($george);
$competition->add_runner($hannah);
$competition->add_runner($ivan);
$competition->add_runner($julia);

// Adding one time to each runner
$competition->add_race_to_runner($alice, 360);
$competition->add_race_to_runner($bob, 415);
$competition->add_race_to_runner($charlie, 389);
$competition->add_race_to_runner($diana, 402);
$competition->add_race_to_runner($ethan, 377);
$competition->add_race_to_runner($fiona, 395);
$competition->add_race_to_runner($george, 410);
$competition->add_race_to_runner($hannah, 399);
$competition->add_race_to_runner($ivan, 420);
$competition->add_race_to_runner($julia, 405);
$competition->add_race_to_runner($julia, 352);
$competition->add_race_to_runner($julia, 348);

echo "" . PHP_EOL;
// The average time of the 1st race of all the runners.
$runners = $competition->get_runners();
$sum = array_reduce(
    $competition->get_runners(),
    function (int $carry, Runner $item) {
        $times = $item->get_times();
        return $carry + $times[0];
    },
    0
);

echo "1. The average time of the 1st race of all the runners: " . ($sum / count($runners)) . PHP_EOL;

// The runner with the quickest race.
$fastest_race = PHP_INT_MAX;
$fastest_runner = null;

foreach ($runners as $runner) {
    $times = $runner->get_times();
    foreach ($times as $time) {
        if (($time < $fastest_race) && $fastest_runner === null) {
            $fastest_race = $time;
            $fastest_runner = $runner;
        } else if (($time < $fastest_race)) {
            $fastest_race = $time;
            $fastest_runner = $runner->equals($fastest_runner) ? $fastest_runner : $runner;
        }
    }
}

echo "2. Fastest runner: " . $fastest_runner->get_name() . " (" . $fastest_race . ")" . PHP_EOL;

// Return an array with all the runners whose name ends with “e”.
$runners_name_end_with_e = array_filter(
    $runners,
    function ($runner) {
        return str_ends_with($runner->get_name(), "e");
    }
);

echo "3. Runners whose name ends with “e”: " . PHP_EOL;
foreach ($runners_name_end_with_e as $runner) {
    echo "- " . $runner->get_name() . ": " . $runner->get_code() . PHP_EOL;
}

// Return an array with all the runners’ names that spent more than 15 seconds in more than 2 races.
$runners_spent_15_seconds_in_2_races = array_filter($runners, function (Runner $runner) {
    if (count($runner->get_times()) == 1) return false;
    $count = 0;
    foreach ($runner->get_times() as $time) if ($time > 15) $count++;
    return $count > 2;
});

echo "4. Runner that spent more than 15 seconds in more than 2 races: ". PHP_EOL;
foreach ($runners_spent_15_seconds_in_2_races as $runner) {
    echo "- " . $runner->get_name() . ": " . $runner->get_code() . PHP_EOL;
}
