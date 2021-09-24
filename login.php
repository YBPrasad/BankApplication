<?php
  include("header.php")
?>
<body style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);align-items:
 center;background-image: url('assets/images/image02.jpg');background-position: center;background-repeat: no-repeat;background-size: cover;position: relative; ">
    <div class="wrapper">
        <section class="form login">
          <header><i class="material-icons" style="font-size:36px"></i>Login</header>
          <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="error-text"></div>
            <div class="field input">
              <label><i class='fas fa-user-alt' style='font-size:24px'></i> Username</label>
              <input type="text" name="username" placeholder="Enter your email" required>
            </div>
            <div class="field input">
              <label>Password</label>
              <input type="password" name="password" placeholder="Enter your password" required>
              <i class="fas fa-eye"></i>
            </div>
            <div class="field button">
              <input type="submit" name="submit" value="Login">
            </div>
          </form>
        </section>
      </div>

      <script src="js/login.js"></script>
</body>
</html>