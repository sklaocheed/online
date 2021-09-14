<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="index.php" class="simple-text logo-normal">
          คุณ : <?php echo $objResult['ol_trainee_fname']; ?>
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="<?php if($page=='index'){echo 'active';} ?>">
            <a href="./index.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <?php if ($objResult["ol_trainee_level"] == "1" OR $objResult["ol_trainee_level"] == "2") { ?>
          <li class="<?php if($page=='class'){echo 'active';} ?>">
            <a href="./class.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Online Class List</p>
            </a>
          </li>
          <?php  }else{} ?>

          <?php if ($objResult["ol_trainee_level"] == "1") { ?>
          <li class="<?php if($page=='addclass'){echo 'active';} ?>">
            <a href="./addclass.php">
              <i class="nc-icon nc-book-bookmark"></i>
              <p>Add Class</p>
            </a>
          </li>
          <?php  }else{} ?>

          <?php if ($objResult["ol_trainee_level"] == "3") { ?>
          <li class="<?php if($page=='trainee_profile'){echo 'active';} ?>">
            <a href="trainee_profile.php">
              <i class="nc-icon nc-badge"></i>
              <p>ข้อมูลส่วนตัว</p>
            </a>
          </li>
          
          <li class="<?php if($page=='register_class'){echo 'active';} ?>">
            <a href="./register_class.php">
              <i class="nc-icon nc-book-bookmark"></i>
              <p>ระบบลงทะเบียนเรียนออนไลน์</p>
            </a>
          </li>

          <li class="<?php if($page=='trainee_class'){echo 'active';} ?>">
            <a href="./trainee_class.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>คลาสเรียนของท่าน</p>
            </a>
          </li>

          <li class="<?php if($page=='payment'){echo 'active';} ?>">
            <a href="trainee_payment.php">
              <i class="nc-icon nc-money-coins"></i>
              <p>แจ้งชำระเงิน</p>
            </a>
          </li>
          <?php  }else{} ?>

          <li class="active-pro">
            <a href="../logout.php">
              <i class="nc-icon nc-share-66"></i>
              <p>Sign Out</p>
            </a>
          </li>
        </ul>
      </div>
    </div>