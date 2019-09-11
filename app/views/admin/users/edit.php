<?php $this->layout('/admin/admin-template', ['title' => 'Edit user']) ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Админ-панель</h3>
            <?=flash()->display();?>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="">
            <div class="box-header">
              <h2 class="box-title">Изменить пользователя</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <form action="/admin/users/update/<?=$this->e($user['id'])?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="username">Имя</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?=$this->e($user['username'])?>">
                      </div>

                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=$this->e($user['email'])?>">
                      </div>

                      <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password">
                      </div>

                      <div class="form-group">
                        <label>Роль</label>
                        <select class="form-control select2" style="width: 100%;" name="roles_mask">
                          <option selected="selected" value="0">Обычный пользователь</option>
                          <option value="1">Администратор</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="avatar">Аватар</label>
                        <input type="file" id="avatar" name="avatar">
                        <br> 
                        <img src="<?=$this->e($user['avatar'])?>" width="200" alt="">
                      </div>

                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                              <input type="checkbox" name="banned" value="1"<?php if($user['banned']) echo 'checked';?>>
                            Бан
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                          <button class="btn btn-warning" type="submit">Изменить</button>
                      </div>
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            По вопросам к главному администратору.
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->