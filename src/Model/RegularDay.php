<?php

namespace Foodora\Console\Model;

use \DateTime;

class RegularDay {
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $vendorId;

    /**
     * @var int
     */
    protected $weekday;

    /**
     * @var bool
     */
    protected $allDay;

    /**
     * @var DateTime
     */
    protected $startHour;

    /**
     * @var DateTime
     */
    protected $stopHour;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getVendorId()
    {
        return $this->vendorId;
    }

    /**
     * @param int $vendorId
     */
    public function setVendorId($vendorId)
    {
        $this->vendorId = $vendorId;
    }

    /**
     * @return int
     */
    public function getWeekday()
    {
        return $this->weekday;
    }

    /**
     * @param int $weekday
     */
    public function setWeekday($weekday)
    {
        $this->weekday = $weekday;
    }

    /**
     * @return bool
     */
    public function isAllDay()
    {
        return $this->allDay;
    }

    /**
     * @param bool $allDay
     */
    public function setAllDay($allDay)
    {
        $this->allDay = (bool) $allDay;
    }

    /**
     * @return DateTime
     */
    public function getStartHour()
    {
        return $this->startHour;
    }

    /**
     * @param DateTime $startHour
     */
    public function setStartHour(DateTime $startHour)
    {
        $this->startHour = $startHour;
    }

    /**
     * @return DateTime
     */
    public function getStopHour()
    {
        return $this->stopHour;
    }

    /**
     * @param DateTime $stopHour
     */
    public function setStopHour(DateTime $stopHour)
    {
        $this->stopHour = $stopHour;
    }
}