<?php

require_once 'RaceLimitReachedException.php';
require_once 'RunnerRaceInvalid.php';

class Runner
{
    private $name;
    private $code;
    private $times;

    function __construct($name, $code)
    {
        $this->name = $name;
        $this->code = $code;
        $this->times = array();
    }

    public function get_name(): string
    {
        return $this->name;
    }

    public function get_code(): string
    {
        return $this->code;
    }

    public function get_times(): array
    {
        return $this->times;
    }

    public function set_name(string $name)
    {
        $this->name = $name;
    }

    public function set_code(string $code): void  {
        $this->code = $code;
    }

    public function add_race (int $time) {
        if ($time <= 5) {
            throw new RunnerRaceTimeInvalid("The runner race time is less than 5 seconds: ". $time);
        } else if (count($this->times) == 5) {
            throw new RaceLimitReachedException("The runner has passed the race limit");
        }

        $this->times[] = $time;
    }

    public function equals ($runner): bool {
        if ($runner === null) return false;
        return $runner->get_name() === $this->get_name() && $runner->get_code() === $this->get_code();
    }
}
