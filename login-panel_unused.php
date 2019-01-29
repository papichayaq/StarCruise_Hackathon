<?php
  if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    header("Location: lauth.php?auto=1");
  }
?>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Log in </span><i class="glyphicon glyphicon-lock"></i></a>
  <ul id="login-dp" class="dropdown-menu">
    <li>
       <div class="row">
          <div class="col-md-12">
             <form class="form" role="form" method="post" action="lauth.php" accept-charset="UTF-8" id="login-nav">
                <div class="form-group">
                   <label class="sr-only" for="usernamebox">Username</label>
                   <input type="text" class="form-control" id="usernamebox" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                   <label class="sr-only" for="passwordbox">Password</label>
                   <input type="password" class="form-control" id="passwordbox" name="password" placeholder="Password" required>
                <!--   <div class="help-block text-right"><a href="#">Forget the password?</a></div> -->
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-primary btn-block" style="width:100%;">Sign in</button>
                </div>
                <div class="checkbox">
                   <label>
                     <input type="checkbox" name="keeplogin">Keep me logged in
                   </label>
                </div>
             </form>
          </div>
          <div class="bottom text-center">
            New here ? <a href="register.php"><b>Register</b></a>
          </div>
       </div>
    </li>
  </ul>
</li>
