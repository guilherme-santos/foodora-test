<?php

namespace Foodora\Console\Model;

use \DateTime;

class SpecialDate {
    const SPECIAL_DATE_TYPE_OPENED = 'opened';
    const SPECIAL_DATE_TYPE_CLOSED = 'closed';

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $vendorId;

    /**
     * @var DateTime
     */
    protected $specialDate;

    /**
     * @var string
     */
    protected $eventType;

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
     * @return DateTime
     */
    public function getSpecialDate()
    {
        return $this->specialDate;
    }

    /**
     * @param DateTime $specialDate
     */
    public function setSpecialDate(DateTime $specialDate)
    {
        $this->specialDate = $specialDate;
    }

    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @param string $eventType
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
    }

    /**
     * @return boolean
     */
    public function isAllDay()
    {
        return $this->allDay;
    }

    /**
     * @param boolean $allDay
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