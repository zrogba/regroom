<?php $this->load->view('header.php', ['title'=>'Reset Password']); ?>

<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="cart-title mt-50">
                    <h2>Reset Password</h2>

                    <?php if(!empty($error)){
                        echo '<span style="font-size: 18px;color: red; ">'.$error.'</span>';
                    } ?>
                </div>

                <div class="cart-table clearfix">
                    <br>
                    <div class="form">
                        <form class="navbar-form"  action="<?php echo base_url().'reset_password' ?>" method="post">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required autofocus value="<?php echo $email??null; ?>">
                                <?php if(!empty($emailErr)){
                                    echo '<span style="font-size: 12px;color: red">Invalid email address</span>';
                                } ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn amado-btn w-100">Reset password</button>
                            </div>

                            <hr>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-6">

            </div>
        </div>
    </div>
</div>




<?php $this->load->view('footer.php',['hideNewsLetter' => true]); ?>
