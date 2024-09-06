<?php
define("ROOTPATH", dirname(dirname(dirname(__DIR__))));
define("APPPATH", ROOTPATH."/php/");

require_once ROOTPATH . '/includes/autoload.php';
require_once ROOTPATH . '/includes/lang/lang_'.$config['lang'].'.php';
admin_session_start();
$pdo = ORM::get_db();

if (!isset($_GET['id'])) {
    echo 'Error: 404 Page not found';
    exit;
}

$fetchuser = ORM::for_table($config['db']['pre'].'user')->find_one($_GET['id']);

if (!$fetchuser) {
    echo 'Error: User not found';
    exit;
}

$fetchusername = $fetchuser['username'];
$fetchuserpic = $fetchuser['image'];
$type = $fetchuser['user_type'] == 'user' ? '<span class="label label-info">Freelancer</span>' : '<span class="label label-success">Employer</span>';

if ($fetchuserpic == "") {
    $fetchuserpic = "default_user.png";
}

$panCardPath = $fetchuser['pan_card'];
$panCardUrl = $config['site_url'] . '' . $panCardPath;

$id_proof = $fetchuser['id_proof'];
$idProofUrl = $config['site_url'] . '' . $id_proof;

$gst_certificate = $fetchuser['gst_certificate'];
$gstUrl = $config['site_url'] . '' . $gst_certificate;

$qualifications = $fetchuser['qualifications'];
$qualificationsUrl = $config['site_url'] . '' . $qualifications;

$experience_certificate = $fetchuser['experience_certificate'];
$experienceCertificateUrl = $config['site_url'] . '' . $experience_certificate;

?>

<style>
    .app-contacts * {
        box-sizing: border-box;
    }
</style>
<div class="app-contacts" style="margin-bottom:10px">
    <header class="slidePanel-header overlay">
        <div class="overlay-panel overlay-background vertical-align">
            <div class="vertical-align-middle">
                <a class="avatar" href="#" id="emp_img_uploader">
                    <img src="<?php echo $config['site_url'];?>storage/profile/<?php echo $fetchuserpic;?>" alt="" style="min-height: 100px; min-width: 100px">
                </a>
                <h3 class="name"><?php echo $fetchuser['name']; ?></h3>
                <div class="tags">
                    <?php echo $fetchuser['email'];?>
                </div>
                <div class="tags">
                    <?php echo $type;?>
                </div>
            </div>
        </div>
    </header>
    <div class="slidePanel-actions">
        <div class="btn-group-flat">
            <button type="button" class="btn btn-pure btn-inverse slidePanel-close icon ion-android-close font-size-20" aria-hidden="true"></button>
        </div>
    </div>
    <div class="slidePanel-inner">
        <div class="user-btm-box">
            <!-- .row -->
            <div class="row text-center m-t-10">
                <div class="col-md-6 b-r"><strong>Name</strong><p><?php echo $fetchuser['name'];?></p></div>
                <div class="col-md-6"><strong>Gender</strong><p><?php echo $fetchuser['sex'];?></p></div>
            </div>
            <!-- /.row -->
            <hr>
            <!-- .row -->
            <div class="row text-center m-t-10">
                <div class="col-md-6 b-r"><strong>Country</strong><p><?php echo $fetchuser['country'];?></p></div>
                <div class="col-md-6"><strong>Joined</strong><p><?php echo date('d M, Y g:iA', strtotime($fetchuser['created_at'])); ?></p></div>
            </div>
            <!-- /.row -->
            <hr>
            <!-- .row -->
            <div class="row text-center m-t-10">
                <div class="col-md-12"><strong>About</strong><p class="m-t-30"><?php echo $fetchuser['description'];?></p></div>
            </div>
            <hr>
            <div class="row text-center m-t-10" style="margin-top:10px">
                <div class="col-md-6 b-r"><strong>PAN Card</strong></div>
                <div class="col-md-6">
                    <?php if (!empty($panCardPath)): ?>
                        <a href="<?php echo $panCardUrl; ?>" target="_blank">View PAN Card</a>
                    <?php else: ?>
                        <p>No PAN Card uploaded.</p>
                    <?php endif; ?>
                </div>
            </div>

            <?php if($fetchuser['user_type']=='user'){?>
            <div class="row text-center m-t-10" style="margin-top:10px">
                <div class="col-md-6 b-r"><strong>Id Proof</strong></div>
                <div class="col-md-6">
                    <?php if (!empty($id_proof)): ?>
                        <a href="<?php echo $idProofUrl; ?>" target="_blank"> View Id Proof</a>
                    <?php else: ?>
                        <p>No Id Proof</p>
                    <?php endif; ?>
                </div>
            </div>
<?php }?>
            <div class="row text-center m-t-10" style="margin-top:10px">
                <div class="col-md-6 b-r"><strong>GST Certificate</strong></div>
                <div class="col-md-6">
                    <?php if (!empty($gst_certificate)): ?>
                        <a href="<?php echo $gstUrl; ?>" target="_blank">View GST Certificate</a>
                    <?php else: ?>
                        <p>No GST Certificate.</p>
                    <?php endif; ?>
                </div>
            </div>

            <?php if($fetchuser['user_type']=='user'){?>
            <div class="row text-center m-t-10" style="margin-top:10px">
                <div class="col-md-6 b-r"><strong>Qualification</strong></div>
                <div class="col-md-6">
                    <?php if (!empty($qualifications)): ?>
                        <a href="<?php echo $qualificationsUrl; ?>" target="_blank">View Qualification</a>
                    <?php else: ?>
                        <p>No Qualification.</p>
                    <?php endif; ?>
                </div>
            </div>
        

            <div class="row text-center m-t-10" style="margin-top:10px;margin-bottom:10px">
                <div class="col-md-6 b-r"><strong>Experience Certificate</strong></div>
                <div class="col-md-6">
                    <?php if (!empty($experience_certificate)): ?>
                        <a href="<?php echo $experienceCertificateUrl; ?>" target="_blank">View Experience Certificate</a>
                    <?php else: ?>
                        <p>No PAN Card uploaded.</p>
                    <?php endif; ?>
                </div>
            </div>
            <?php }?>
            
        </div>
    </div>
</div>
