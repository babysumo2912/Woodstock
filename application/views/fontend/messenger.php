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
            <div class="text-center">
                <p style="font-size: 20px"><b>Tin nhắn</b></p>
            </div>
            <div class="text-right">
                <a href=""><i class="fa fa-check"></i> Đánh dấu tất cả đã đọc</a>
            </div>
            <hr>
            <?php 
            $session_id = $this->session->userdata('session_user');
            if(isset($messenger)){
            ?>
            <div class="row"> 
                <div class="col-xs-4" style="border-right: 1px #ccc solid; height: 450px; overflow-x: hidden">
                    <div class="account">
                    <ul>
            <?php

                foreach ($messenger as $mss) {
                    $user_messenger = $this->User_models->messenger_iduser($mss->id_room);
                    if($user_messenger){
                        foreach ($user_messenger as $umss) {
                            if($umss->id_user!=$session_id){
                                $infomation_user = $this->User_models->getinfo($umss->id_user);
                                if($infomation_user){
                                    foreach ($infomation_user as $ifmt) {}
            ?>
            
                
                    <li>
                        <a href="<?php echo base_url()?>infomation/messenger/room/<?php echo $mss->id_room ?>">
                            <div class = "user">
                                <div class = "avatar" style = "background:url('<?php echo base_url()?>/public/img/user/avatar/<?php echo $ifmt->img ?>') center; background-size: cover"></div>
                                &nbsp;<span><?php echo $ifmt->name?></span>
                            </div>
                        </a>
                    </li>
                
            
            <?php
                                }
                            }
                        }
                    }
                }
            ?>
                    </ul>
                    </div>
                </div>
                <div class="col-xs-8">
                    <?php 
                    if(isset($content_mess)){
                    ?>
                    <div id="box_chat" style="height: 400px; overflow-x: hidden">
                    <?php
                        foreach ($content_mess as $ctm) {
                            $infomation_account = $this->User_models->getinfo($ctm->id_user);
                            $id_room = $ctm->id_room;
                            if($infomation_account){
                                foreach ($infomation_account as $acc) {}
                            }
                            if($ctm->id_user != $session_id){
                    ?>
                    <div class="text-left" style="margin: 10px 0 0 10px">
                        <div class = "row">
                            <div class = "avatar" style = "background:url('<?php echo base_url()?>/public/img/user/avatar/<?php echo $acc->img ?>') center; background-size: cover;float: left">
                            </div>
                            <div style="max-width: 60%; background: #ccc; border: 1px solid #ccc; border-radius: 5px;float: left; margin: 0 0 0 10px; padding: 10px;word-wrap: break-word">
                                <?php echo $ctm->content ?>
                            </div>
                        </div>
                    </div>
                    <?php
                            }else{
                    ?>
                    <div class="text-right" style="margin-top: 10px">
                        <div class = "row">
                            <div style="max-width: 60%; background: #0084ff; border: 1px solid #0084ff; border-radius: 5px;float: right; margin-right: 10px; padding: 10px; color: white">
                                <?php echo $ctm->content ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                            }
                        }
                    ?>
                    </div>
                    <?php echo form_open('infomation/messenger/add/'.$id_room.'/0') ?>
                    <div class="input-group" id="send_chat" style="margin-top: 10px">
                        <input type="text" name="content" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-send"></i> Gửi</button>
                        </span>
                    </div>
                    <?php echo form_close() ?>
                    <?php
                    }

                    ?>
            </div>
            <?php
            }else{
            ?>
            <div class="text-center" style="margin-top: 50px">
                <img src="<?php echo base_url() ?>public/img/style/noproduct.png">
                <p style="font-size: 18px;margin-top:10px">Hiện tại, Bạn không có tin nhắn!</p>
            </div>
            <?php
            }

             ?>
        </div>
    </div>
</section>

<?php include'footer.php'; ?>
<script type="text/javascript">
    // $('#box_chat').animate({
    // scrollTop: $('#box_chat').get(0).scrollHeight
    // }, 400);
    $('#box_chat').animate({
        scrollTop: $('#box_chat').get(0).scrollHeight
    },0);
</script>


