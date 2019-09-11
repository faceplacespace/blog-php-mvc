<?php $this->layout('/front/front-template', ['title' => 'Registration']) ?>
<div class="kotha-default-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                
                <div class="box-header">
                    <h2 class="box-title">Sign Up</h2>
                </div>
                <?=flash()->display();?>
                <form action="/registration/submit" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password">
                    </div>
                    <div class="form-group">
                        <label for="image">Avatar</label>
                        <input type="file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <a href="/login">Or Sign In</a>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>