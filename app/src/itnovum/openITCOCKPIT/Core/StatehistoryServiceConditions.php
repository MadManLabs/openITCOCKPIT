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

use itnovum\openITCOCKPIT\Core\ValueObjects\ServiceStates;

class StatehistoryServiceConditions extends ListSettingsConditions {

    protected $states = [
        0, 1, 2, 3
    ];

    /**
     * @var array
     */
    protected $order = [
        'StatehistoryService.state_time' => 'DESC'
    ];

    /**
     * @var string
     */
    protected $serviceUuid;

    /**
     * @var bool
     */
    private $useLimit = true;

    /**
     * @var bool
     */
    private $hardStateTypeAndUpState = false;

    /**
     * @param $uuid
     */
    public function setServiceUuid($uuid){
        $this->serviceUuid = $uuid;
    }

    /**
     * @return string
     */
    public function getServiceUuid(){
        return $this->serviceUuid;
    }

    /**
     * @param ServiceStates $ServiceStates
     */
    public function setStates(ServiceStates $ServiceStates){
        if (sizeof($ServiceStates->asIntegerArray()) == 4) {
            $this->states = [];
            return;
        }

        $this->states = $ServiceStates->asIntegerArray();
    }

    /**
     * @param bool $value
     */
    public function setUseLimit($value){
        $this->useLimit = (bool)$value;
    }

    /**
     * @return bool
     */
    public function getUseLimit(){
        return $this->useLimit;
    }

    /**
     * @param $value
     */
    public function setHardStateTypeAndUpState($value){
        $this->hardStateTypeAndUpState = (bool)$value;
    }

    /**
     * @return bool
     */
    public function hardStateTypeAndUpState(){
        return $this->hardStateTypeAndUpState;
    }
}

