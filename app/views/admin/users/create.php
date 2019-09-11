<?php $this->layout('/admin/admin-template', ['title' => 'Create User']) ?>
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
              <h2 class="box-title">Добавить пользователя</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <form action="/admin/users/add" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="username">Имя</label>
                        <input type="text" class="form-control" id="name" name="username">
                      </div>

                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                      </div>

                      <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password">
                      </div>

                      <div class="form-group">
                        <label>Роль</label>
                        <select class="form-control select2" style="width: 100%;" name="role">
                          <option selected="selected" value="0">Обычный пользователь</option>
                          <option value="1">Администратор</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="avatar">Аватар</label>
                        <input type="file" id="avatar" name="avatar">
                      </div>

                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                              <input type="checkbox" name="banned">
                            Бан
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                          <button class="btn btn-success" type="submit">Добавить</button>
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