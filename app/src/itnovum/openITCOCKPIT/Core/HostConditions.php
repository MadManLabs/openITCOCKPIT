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


class HostConditions {

    /**
     * @var array
     */
    private $conditions = [];

    /**
     * @var array
     */
    private $notConditions = [];

    /**
     * @var bool
     */
    private $includeDisabled = false;

    /**
     * @var array
     */
    private $containerIds = [];

    /**
     * @var array
     */
    private $hostIds = [];

    /**
     * @var array
     */
    private $order = [];

    /**
     * HostConditions constructor.
     * @param array $conditions
     */
    public function __construct($conditions = []){
        $this->conditions = $conditions;
    }

    /**
     * @return array
     */
    public function getConditions(){
        return $this->conditions;
    }

    /**
     * @param array $conditions
     */
    public function setNotConditions($conditions) {
        $this->notConditions = $conditions;
    }

    /**
     * @return array
     */
    public function getNotConditions() {
        if($this->hasNotConditions()){
            return $this->notConditions;
        }
        return [];
    }

    /**
     * @return boolean
     */
    public function hasNotConditions(){
        return !empty($this->notConditions);
    }

    /**
     * @return array
     */
    public function getConditionsForFind(){
        $conditions = $this->conditions;
        if(!empty($this->containerIds)){
            $conditions['HostsToContainers.container_id'] = $this->containerIds;
        }

        if($this->includeDisabled() === false){
            $conditions['Host.disabled'] = 0;
        }

        return $conditions;
    }

    /**
     * @return boolean
     */
    public function includeDisabled(){
        return $this->includeDisabled;
    }

    /**
     * @param boolean $includeDisabled
     */
    public function setIncludeDisabled($includeDisabled){
        $this->includeDisabled = $includeDisabled;
    }

    /**
     * @return array
     */
    public function getContainerIds(){
        return $this->containerIds;
    }

    /**
     * @param array $containerIds
     */
    public function setContainerIds($containerIds){
        $this->containerIds = $containerIds;
    }

    /**
     * @return bool
     */
    public function hasContainer(){
        return !empty($this->containerIds);
    }

    /**
     * @param array $order
     */
    public function setOrder($order = []){
        $this->order = $order;
    }

    /**
     * @return array
     */
    public function getOrder(){
        return $this->order;
    }

    /**
     * @return array
     */
    public function getHostIds() {
        return $this->hostIds;
    }

    /**
     * @param array $hostIds
     */
    public function setHostIds($hostIds) {
        $this->hostIds = $hostIds;
    }
}
