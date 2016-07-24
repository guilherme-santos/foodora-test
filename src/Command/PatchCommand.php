<?php

namespace Foodora\Console\Command;

use Foodora\Console\Model\SpecialDate;

class PatchCommand implements CommandInterface {
    /**
     * @var string
     */
    protected $from = '2015-12-21';

    /**
     * @var string
     */
    protected $to = '2015-12-27';

    /**
     * @var string
     */
    protected $backupFile = 'backupfile.json';

    public function getCommandName()
    {
        return 'patch';
    }

    public function execute()
    {
        $regularDays = $this->getVendorSchedule($this->from, $this->to);
        $this->newBackupFile($this->backupFile, $regularDays);

        $specialDates = $this->getSpecialDate($this->from, $this->to);
        foreach ($specialDates as $specialDate) {
            /** @var SpecialDate $specialDate */
            if ($specialDate->getEventType() === SpecialDate::SPECIAL_DATE_TYPE_OPENED) {
                $vendorId = $specialDate->getVendorId();
                $weekday = $specialDate->getSpecialDate()->format('N');

                $regularDay = $this->findVendorSchedule($vendorId, $weekday);
                // If regular day doesn't exists I need to insert otherwise update it
                if ($regularDay === null) {
                    $this->insertRegularDay(
                        $vendorId,
                        $weekday,
                        $specialDate->isAllDay(),
                        $specialDate->getStartHour(),
                        $specialDate->getStopHour()
                    );
                } else {
                    $this->updateRegularDay(
                        $vendorId,
                        $weekday,
                        $specialDate->isAllDay(),
                        $specialDate->getStartHour(),
                        $specialDate->getStopHour()
                    );
                }
            } elseif ($specialDate->getEventType() === SpecialDate::SPECIAL_DATE_TYPE_CLOSED) {
                if ($specialDate->isAllDay()) {
                    $this->removeRegularDay($vendorId, $weekday);
                }
            }
        }
    }

    /**
     * @param string $from
     * @param string $to
     * @return array
     */
    protected function getVendorSchedule($from, $to)
    {
        return array();
    }

    /**
     * @param string $from
     * @param string $to
     * @return array
     */
    protected function getSpecialDate($from, $to)
    {
        return array();
    }

    /**
     * @param string $backupFile
     * @param array $regularDays
     */
    protected function newBackupFile($backupFile, array $regularDays)
    {

    }
}