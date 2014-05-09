<?php

class match
{
    private $_date;
    private $_time;
    private $_hostTeam;
    private $_guestTeam;
    private $_studio;
    private $_result;
    private $_match;

    public function __construct(
        $date, $time, $hostTeam, $guestTeam, $studio, $result, $match
    ) {
        $this->_date = $date;
        $this->_time = $time;
        $this->_hostTeam = $hostTeam;
        $this->_guestTeam = $guestTeam;
        $this->_studio = $studio;
        $this->_result = $result;
        $this->_match = $match;
    }

    public function getHostTeam()
    {
        return $this->_hostTeam;
    }

    public function getGuestTeam()
    {
        return $this->_guestTeam;
    }

    public function getTime()
    {
        return $this->_time;
    }

    public function getGermanTime()
    {
        $interval = new DateInterval('PT6H');
        $dateTime = DateTime::createFromFormat(
            'Y/n/j H:i', implode(' ', [$this->_date, $this->_time])
        );
        return $dateTime->sub($interval)->format('G:i');
    }
}
