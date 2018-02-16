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

namespace itnovum\openITCOCKPIT\Core\ValueObjects;


class User {

    /**
     * @var \AuthComponent
     */
    private $Auth;

    /**
     * @var bool
     */
    private $recursiveBrowser;

    /**
     * @var mixed|null
     */
    private $fullName;

    /**
     * @var int
     */
    public $id;

    /**
     * User constructor.
     * @param \AuthComponent $Auth
     */
    public function __construct(\AuthComponent $Auth){
        $this->Auth = $Auth;

        $this->recursiveBrowser = (bool)$this->Auth->user('recursive_browser');
        $this->fullName = $this->Auth->user('full_name');
        $this->id = (int)$this->Auth->user('id');

    }

    /**
     * @return boolean
     */
    public function isRecursiveBrowserEnabled(){
        return $this->recursiveBrowser;
    }

    /**
     * @return mixed|null
     */
    public function getFullName(){
        return $this->fullName;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }



}
