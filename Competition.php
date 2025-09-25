<?php

class Competition
{
    private $runners;

    function __construct()
    {
        $this->runners = array();
    }

    public function get_runners() {
        return $this->runners;
    }

    public function add_runner(Runner $runner)
    {
        $code = $runner->get_code();
        $this->runners[$code] = $runner;
    }

    public function add_race_to_runner(Runner $runner, int $time)
    {
        $runner->add_race($time);
    }
}
