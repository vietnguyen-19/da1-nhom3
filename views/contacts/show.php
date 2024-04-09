 <br>
 <!--contact area start-->
 <div class="contact_area">
     <div class="container">
     <h2>Giới thiệu và liên hệ</h2>
     <br>
         <div class="row">
             <div class="col-lg-6 col-md-12">
                 <div class="contact_message content">
                     <h4>Giới thiệu</h4>
                     <p><?= $settings['contact_content'] ?></p>
                     <h4>Thành viên thực hiện</h4>
                     <p>- <u>Nguyễn Quốc Việt</u></p>
                     <p>- <u>Đàm Khánh Duy</u></p>
                     <p>- <u>Ngô Đức Huy</u></p>

                 </div>
             </div>
             <div class="col-lg-6 col-md-12">
                <h4>Liên hệ</h4>
                 <div class="contact_message form">
                     <ul>
                         <li><i class="fa fa-fax"></i><?= $settings['Address'] ?></li>
                         <li><i class="fa fa-phone"></i> <?= $settings['Phone'] ?></li>
                         <li><i class="fa fa-envelope-o"></i>
                             <?= $settings['Email'] ?>
                             <ul style="padding-left: 30px;"> <?= $settings['Email_2'] ?></ul>
                             <ul style="padding-left: 30px;"> <?= $settings['Email_3'] ?></ul>
                         </li>
                         <li><i class="ion-social-facebook"></i><a href="<?= $settings['Facebook'] ?>"><?= $settings['Facebook'] ?></a></li>
                         <li><i class="ion-social-youtube"></i><a href=" <?= $settings['Youtube'] ?>"> <?= $settings['Youtube'] ?></a></li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!--contact area end-->