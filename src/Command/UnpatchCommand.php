<?php

namespace Foodora\Console\Command;

use Foodora\Console\Model\RegularDay;

class UnpatchCommand implements CommandInterface {
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
        return 'unpatch';
    }

    public function execute()
    {
        // Some regular days can have been added when patch, we need remove they later
        $vendors = [];

        $regularDays = $this->loadBackupFile($this->backupFile);
        foreach ($regularDays as $regularDay) {
            $vendorId = $regularDay->getVendorId();

            /** @var RegularDay $regularDay */
            $this->updateRegularDay(
                $vendorId,
                $regularDay->getWeekday(),
                $regularDay->isAllDay(),
                $regularDay->getStartHour(),
                $regularDay->getStopHour()
            );

            if (!isset($vendors[$vendorId])) {
                $vendors[$vendorId] = [
                    1 => true,
                    2 => true,
                    3 => true,
                    4 => true,
                    5 => true,
                    6 => true,
                    7 => true,
                ];
            }
            // vendors will remain only weekday that don't exists before
            unset($vendors[$vendorId][$regularDay->getWeekday()]);
        }

        // Remove days that we don't have before
        foreach ($vendors as $vendorId => $regularDay) {
            $this->removeRegularDays($vendorId, array_keys($regularDays));
        }
    }

    /**
     * @param string $backupFile
     * @return array
     */
    protected function loadBackupFile($backupFile)
    {
        return array();
    }
}