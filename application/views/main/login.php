<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 container1 margintop-55">
    <?php if (isset($error)) { ?>
        <div class="alert alert-danger alert-dismissable col-xs-12 col-sm-12 col-md- col-lg-12">
            <?php echo $error ?>
        </div>
    <?php }; ?>
    <?php if (!empty($this->session->flashdata("verified"))) { ?>
        <div class="alert alert-success alert-dismissable col-xs-12 col-sm-12 col-md- col-lg-12">
            Your account has been verified. Please login to proceed.
        </div>
    <?php }; ?>
    <div class="panel-heading font-size-xlarge">
        Login
    </div>
    <div class='panel-body'>
        <form action="<?= base_url() ?>Access/login" method="post">
            <div class="input-group">
                <span class='input-group-addon' style='vertical-align:top;'>
                    <i class=' fa fa-user'></i>
                </span>
                <input name='username' type="text" class="form-control" placeholder='username'/>
            </div>
            <div class="input-group" style='margin-top : 3%;'>
                <span class='input-group-addon' >
                    <i class=' fa fa-lock'></i>
                </span>
                <input name='password' type="password" placeholder='password' class="form-control" />
            </div>
            <div class ="button-container">
                <input type="submit" value='Login' class="btn btn-primary pull-right" style='margin-top : 3%;margin-left: 5%;margin-bottom : 5%;'>
                <a href="<?= base_url() ?>access/forget_password" class="btn btn-primary pull-right" style='margin-top : 3%;margin-left: 5%;margin-bottom : 5%;'>Forget Password</a>
            </div>
        </form>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>