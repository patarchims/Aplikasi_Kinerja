
          
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
        <form action="<?= base_url('menu/edit_menu'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $menu['id']; ?>">                    
                </div>
                <div class="modal-body">
                    <label>Menu</label>
                    <input type="text" class="form-control" id="menu" name="menu" value="<?= $menu['menu']; ?>">                    
                </div>
               
                <div class="col-sm-11 mt-15">
                    <button class="btn btn-primary">Edit</button>       
                </div>
        </form>
        </div>
        </div>
    </div>
   
</div>
