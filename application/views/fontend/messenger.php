<?php include'header.php'; ?>
<?php
if(isset($account)){
    foreach($account as $acc){}
}

?>
<section class="ccc">
    <div class="max row">
         <div class="col-md-3">
            <div class="content_pay">
                <div>
                    <div style = "height: 300px;background:url('<?php echo base_url()?>public/img/user/avatar/<?php echo $acc->img?>') center; background-size: cover"></div>
                </div>
                <div class="account">
                    <ul>
                        <li>
                            <a href="<?php echo base_url() ?>infomation/buyer"><?php echo $acc->name ?></a>
                        </li>
                        <li>
                            <a href="">Thông báo <sup class="badge">0</sup></a>
                        </li>
                        <li>
                            <a href="">Tin nhắn <sup class="badge">0</sup></a>
                        </li>
                        <li>
                            <a href="">Cài đặt</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 content_pay">
             
        </div>
    </div>
</section>

<?php include'footer.php';
