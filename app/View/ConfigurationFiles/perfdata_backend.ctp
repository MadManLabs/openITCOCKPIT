<?php
// Copyright (C) <2018>  <it-novum GmbH>
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


use itnovum\openITCOCKPIT\ConfigGenerator\PerfdataBackend;

/** @var PerfdataBackend $PerfdataBackend */
?>


<form ng-submit="submit();" class="form-horizontal">

    <div class="row">
        <div class="form-group required"
             ng-class="{'has-error': errors.Configfile.PerfdataBackend}">
            <label class="col col-md-2 control-label">
                <?php echo __('Database backend'); ?>
            </label>
            <div class="col col-xs-10">
                <select
                        class="form-control"
                        ng-model="post.string.perfdatabackend">
                    <option value="Whisper"><?php echo __('Whisper (Statusengine 3 / Statusengine 2)'); ?></option>
                    <option value="Crate"><?php echo __('Crate (Statusengine 3)'); ?></option>
                    <option value="Rrdtool"><?php echo __('Rrdtool (Statusengine 2 / NPCD)'); ?></option>
                </select>
                <div ng-repeat="error in errors.Configfile.PerfdataBackend">
                    <div class="help-block text-danger">{{ error }}</div>
                </div>
            </div>
            <div class="helpText text-muted col-md-offset-2 col-md-6">
                <?php echo h($PerfdataBackend->getHelpText('PerfdataBackend')); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 margin-top-10">
            <div class="well formactions ">
                <div class="pull-right">
                    <input class="btn btn-primary" type="submit" value="<?php echo __('Save'); ?>">&nbsp;
                    <a href="/ConfigurationFiles/index" class="btn btn-default">
                        <?php echo __('Cancel'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
