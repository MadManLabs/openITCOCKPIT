<?php
// Copyright (C) <2015>  <it-novum GmbH>
//
// This file is dual licensed
//
// 1.
//  This program is free software: you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation, version 3 of the License.
//
//  This program is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  GNU General Public License for more details.
//
//  You should have received a copy of the GNU General Public License
//  along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
// 2.
//  If you purchased an openITCOCKPIT Enterprise Edition you can use this file
//  under the terms of the openITCOCKPIT Enterprise Edition license agreement.
//  License agreement and license key will be shipped with the order
//  confirmation.

namespace itnovum\openITCOCKPIT\Core;

class DowntimeHostConditions extends ListSettingsConditions {

    /**
     * @var array
     */
    protected $order = [
        'DowntimeHost.scheduled_start_time' => 'DESC'
    ];

    /**
     * @var bool
     */
    protected $hideExpired = false;

    /**
     * @var bool
     */
    protected $isRunning = false;

    /**
     * @var array
     */
    private $hostUuids = [];

    /**
     * @param bool $value
     */
    public function setHideExpired($value) {
        $this->hideExpired = (bool)$value;
    }

    /**
     * @return bool
     */
    public function hideExpired() {
        return $this->hideExpired;
    }

    /**
     * @param $value
     */
    public function setIsRunning($value) {
        $this->isRunning = (bool)$value;
    }

    /**
     * @return bool
     */
    public function isRunning(){
        return $this->isRunning;
    }

    /**
     * @param array $uuids
     */
    public function setHostUuid($uuids = []){
        if(!is_array($uuids)){
            $uuids = [$uuids];
        }
        $this->hostUuids = $uuids;
    }

    /**
     * @return array
     */
    public function getHostUuids(){
        return $this->hostUuids;
    }

    /**
     * @return bool
     */
    public function hasHostUuids() {
        return !empty($this->hostUuids);
    }
}

