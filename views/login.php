<?php
    if(@$_POST['phone'] && @$_POST['password']){

        $login = $db->select('accounts', "phone = '".$_POST['phone']."' and password = '".md5($_POST['password'])."'", '*');

        if(@$login[0]){
            $_SESSION['user'] = $login[0];
            $_SESSION['auth'] = true;
            success('Redirecting...');
            echo '<script>window.location = "index.php";</script>';
        }else{
            error('Wrong username or password!');
        }
    }
?>
<form action="?page=login" method="POST">
    <div class="row">
        <div class="col s12">
            <small class="center-align">Please use your account information to login.</small>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">phone</i>
            <input id="icon_telephone" name="phone" type="text" class="validate">
            <label for="icon_telephone">Phone (eg. 554 578 55 00)</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">vpn_key</i>
            <input id="icon_password" name="password" type="password" class="validate">
            <label for="icon_password">Password</label>
        </div>

        <div class="col s12 center-align">
            <button class="waves-effect waves-light btn-large right z-depth-0">Sign in</button>
        </div>
    </div>
</form>