<?php
require_once('../includes.php');
?>
<!-- Page JS Plugins CSS -->

<main class="app-layout-content">

    <!-- Page Content -->
    <div class="container-fluid p-y-md">
        <!-- Partial Table -->
        <div class="card">
            <div class="card-header">
                <h4>Users</h4>
                <div class="pull-right">
                    <a href="#" data-url="panel/users_add.php" data-toggle="slidePanel" class="btn btn-success waves-effect waves-light m-r-10">Add User</a>
                </div>
            </div>
            <div class="card-block">
                <div id="js-table-list">
                    <table id="ajax_datatable" data-jsonfile="employers.php" class="js-table-checkable table table-vcenter table-hover" data-tablesaw-mode="stack" data-plugin="animateList"
                           data-animate="fade" data-child="tr" data-selectable="selectable">
                        <thead>
                        <tr>
                            <th class="text-center w-5 sortingNone">
                                <label class="css-input css-checkbox css-checkbox-default m-t-0 m-b-0">
                                    <input type="checkbox" id="check-all" name="check-all"><span></span>
                                </label>
                            </th>
                            <th><i class="ion-image"></i> User</th>
                            <th><i class="w-10"></i>Membership Plan</th>
                            <th><i class="w-10"></i><?php _e("Start Date") ?></th>
                            <th><i class="w-10"></i><?php _e("Expiry Date") ?></th>
                            <th class="w-10">Type</th>
                            <th class="w-10">Email</th>
                            <th class="hidden-xs w-30" style="width: 100px;">Sex</th>
                            <th class="hidden-xs hidden-sm" style="width:100px">Status</th>
                            <th class="hidden-xs w-30" style="width: 100px;">Joined</th>
                            <th style="width: 130px;">Actions</th>
                        </tr>
                        </thead>
                        <tbody id="ajax-services">

                        </tbody>
                    </table>

                </div>


            </div>
            <!-- .card-block -->
        </div>
        <!-- .card -->
        <!-- End Partial Table -->

    </div>
    <!-- .container-fluid -->
    <!-- End Page Content -->

</main>

<!-- Site Action -->
<div class="site-action">
    <button data-url="panel/users_add.php" data-toggle="slidePanel" id="slidepanel-show" style="display: none;"> </button>
    <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating">
        <i class="front-icon ion-android-add animation-scale-up" aria-hidden="true"></i>
        <i class="back-icon ion-android-close animation-scale-up" aria-hidden="true"></i>
    </button>
    <div class="site-action-buttons">
        <button type="button" data-ajax-response="deletemarked" data-ajax-action="deleteusers"
                class="btn-raised btn btn-danger btn-floating animation-slide-bottom">
            <i class="icon ion-android-delete" aria-hidden="true"></i>
        </button>
    </div>
</div>
<!-- End Site Action -->

<?php include("../footer.php"); ?>


<script>
    $(function()
    {
        // Init page helpers (Table Tools helper)
        App.initHelpers('table-tools');
    });
</script>
</body>

</html>

