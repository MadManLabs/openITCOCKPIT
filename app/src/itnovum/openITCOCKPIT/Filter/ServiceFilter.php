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

namespace itnovum\openITCOCKPIT\Filter;


class ServiceFilter extends Filter {

    /**
     * @return array
     */
    public function indexFilter() {
        $filters = [
            'bool'     => [
                'Servicestatus.problem_has_been_acknowledged',
                'Servicestatus.active_checks_enabled'
            ],
            'like'     => [
                'Host.name',
                'Service.servicename',
                'Servicestatus.output'
            ],
            'rlike'    => [
                'Service.keywords'
            ],
            'notrlike'    => [
                'Service.not_keywords'
            ],
            'equals'   => [
                'Host.id',
                'Service.id',
                'Service.uuid',
                'Service.disabled',
            ],
            'downtime' => [
                'Servicestatus.scheduled_downtime_depth',
            ],
            'state'    => [
                'Servicestatus.current_state'
            ]
        ];

        return $this->getConditionsByFilters($filters);
    }

    /**
     * @return array
     */
    public function notMonitoredFilter() {
        $filters = [
            'like'   => [
                'Host.name',
                'Service.servicename',
            ],
            'equals' => [
                'Host.id',
                'Service.uuid'
            ]
        ];

        return $this->getConditionsByFilters($filters);
    }

    /**
     * @return array
     */
    public function disabledFilter() {
        return $this->notMonitoredFilter();
    }

    /**
     * @return array
     */
    public function deletedFilter() {
        $filters = [
            'equals' => [
                'DeletedService.host_id',
            ]
        ];

        return $this->getConditionsByFilters($filters);
    }

}
