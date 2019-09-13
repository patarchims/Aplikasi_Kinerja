<?php
                  
                    $menu=  $submenu['menu_id']; 
                    $queryMenu = " SELECT * FROM user_menu
                                where id=$menu
                                ";
                    
                  
                    ?>
          
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
        <form action="<?= base_url('menu/edit_submenu'); ?>" method="post">
       
        <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="<?= $submenu['id']; ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" value="<?= $submenu['title']; ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('title') ?></small>
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">                            
                            <?php foreach ($menu_all as $m) : ?>
                                <?php if( $m == $submenu['menu']) :  ?>
                                    <option value=" <?= $m['id'] ?>" selected> <?= $m['menu'] ?> </option>                                    
                                <?php else : ?>
                                <option value=" <?= $m['id'] ?>" selected> <?= $m['menu'] ?> </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url']; ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('url') ?></small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon']; ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('icon') ?></small>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                            <label for="is_active" class="form-check-label">Active?</label>
                        </div>
                    </div>
                </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->  