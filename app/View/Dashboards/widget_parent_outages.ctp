<header dashboard-widget-header-directive=""
        class="ui-draggable-handle pointer"
        wtitle="title"
        wid="id"
        update-title="updateTitle({id:id,title:title})">
</header>

<div class="content" style="">

    <!-- widget edit box -->
    <div class="jarviswidget-editbox not-draggable" style="display: none;">
        <!-- This area used as dropdown edit box -->
        <input class="form-control" type="text" placeholder="Widget title" ng-model="title"
               ng-model-options="{debounce: 1000}">
        <span class="note"><i class="fa fa-check text-success"></i>
            <?php echo __('Change title to update and save instantly'); ?>
        </span>
    </div>

    <div class="widget-body padding-0 not-draggable">

        <div ng-show="!widget.length" class="text-center text-success">
            <h5 class="padding-top-50">
                <i class="fa fa-check"></i>
                <?php echo __('Currently are no network segment issues'); ?>
            </h5>
        </div>

        <div ng-show="widget.length" style="overflow:auto;">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr ng-repeat="host in widget">
                        <td title="{{host.Hoststatus.output}}" class="dashboard-table">
                            <?php if ($this->Acl->hasPermission('browser', 'hosts')): ?>
                                <a class="{{host.Hoststatus.current_state == 2 ? 'txt-color-blueDark' : 'text-danger'}}"
                                   href="/hosts/browser/{{host.Host.id}}">
                                    {{host.Host.name}}
                                </a>
                            <?php else: ?>
                                {{host.Host.name}}
                            <?php endif; ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>