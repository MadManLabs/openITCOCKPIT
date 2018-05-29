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

namespace itnovum\openITCOCKPIT\Core\System\Health;


use function strpos;

class Disks {


    public function getDiskUsage() {
        exec('LANG=C df -h', $output, $returncode);
        $disks = [];
        if ($returncode == 0) {
            $ignore = ['none', 'udev', 'Filesystem'];
            foreach ($output as $line) {
                $value = preg_split('/\s+/', $line);
                if (!in_array($value[0], $ignore)) {
                    if ($value[5] != '/run' || strpos($value[5], 'snapshot')) {
                        continue;
                    }

                    $percentage = (int)str_replace('%', '', $value[4]);
                    $state = 'ok';
                    if ($percentage > 80) {
                        $state = 'warning';
                    }
                    if ($percentage > 90) {
                        $state = 'critical';
                    }

                    $disks[] = [
                        'disk'           => $value[0],
                        'size'           => $value[1],
                        'used'           => $value[2],
                        'avail'          => $value[3],
                        'use_percentage' => $percentage,
                        'mountpoint'     => $value[5],
                        'state'          => $state
                    ];
                }
            }
        }
        return $disks;
    }

}
