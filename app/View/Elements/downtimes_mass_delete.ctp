<?php
// Copyright (C) <2015>  <it-novum GmbH>
//
// This file is dual licensed
//
// 1.
//	This program is free software: you can redistribute it and/or modify
//	it under the terms of the GNU General Public License as published by
//	the Free Software Foundation, version 3 of the License.
//
//	This program is distributed in the hope that it will be useful,
//	but WITHOUT ANY WARRANTY; without even the implied warranty of
//	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//	GNU General Public License for more details.
//
//	You should have received a copy of the GNU General Public License
//	along with this program.  If not, see <http://www.gnu.org/licenses/>.
//

// 2.
//	If you purchased an openITCOCKPIT Enterprise Edition you can use this file
//	under the terms of the openITCOCKPIT Enterprise Edition license agreement.
//	License agreement and license key will be shipped with the order
//	confirmation.
?>
<div class="row">
    <div class="col-xs-12 col-md-2 text-muted">
        <center><span id="selectionCount"></span></center>
    </div>
    <div class="col-xs-12 col-md-2 "><span id="selectAllDowntimes" class="pointer"><i
                class="fa fa-lg fa-check-square-o"></i> <?php echo __('Select all'); ?></span></div>
    <div class="col-xs-12 col-md-2"><span id="untickAllDowntimes" class="pointer"><i
                class="fa fa-lg fa-square-o"></i> <?php echo __('Undo selection'); ?></span></div>
    <div class="col-xs-12 col-md-2">
        <?php if ($this->Acl->hasPermission('delete', 'Hosts', '')): ?>
            <a href="javascript:void(0);" id="deleteAllDowntimes" class="txt-color-red" style="text-decoration: none;"> <i
                    class="fa fa-lg fa-trash-o"></i> <?php echo __('Delete'); ?></a>
        <?php endif; ?>
    </div>

    <!-- hidden fields for multi language -->
    <input type="hidden" id="delete_message_h1" value="<?php echo __('You are about to delete downtime for host:'); ?>"/>
    <input type="hidden" id="delete_message_h2"
           value="<?php echo __('Do you want to delete service downtimes for this host too?'); ?>"/>
    <input type="hidden" id="message_yes" value="<?php echo __('Yes'); ?>"/>
    <input type="hidden" id="message_no" value="<?php echo __('No'); ?>"/>
</div>