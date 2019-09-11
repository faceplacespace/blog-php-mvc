<?php $this->layout('/admin/admin-template', ['title' => 'Edit Post']) ?>
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
              <h2 class="box-title">Изменить изображение</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <form action="/admin/posts/update/<?=$this->e($post['id'])?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?=$this->e($post['title'])?>">
                      </div>

                      <div class="form-group">
                        <label for="content">Краткое описание</label>
                        <textarea class="form-control" name="content"><?=$this->e($post['content'])?></textarea>
                      </div>

                      <div class="form-group">
                        <label>Категория</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                          <?php
                                $i = 1;
                                foreach ($categories as $category):
                          ?>
                                
                            <option <?php if($i == 1) echo 'selected'; $i++; ?> value="<?=$this->e($category['id'])?>"><?=$this->e($category['title'])?></option>
                          <?php endforeach; ?>
                            
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Изображение</label>
                        <input type="file" name="photo"> <br>
                        <img src="<?=$this->e($post['photo'])?>" width="200" alt="">
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