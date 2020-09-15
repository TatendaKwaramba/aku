<div id="20008" class="fixed-action-btn horizontal <?php if (Auth::user()->hasRole('admin_global')) {
                echo " uiroles ";
            } ?>
            " style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red" ng-csv="makeBusinessListCsv(results)" lazy-load="true"
                   filename="GetCashBusinessList.csv">
                    <i class="fa fa-download"></i>
                </a>
            </div>
