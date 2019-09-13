
          
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <h1 class="h3 mb-4 text-gray-800">Edit Data Jabatan</h1>
    <div class="row">
        <div class="col-lg-8">
        <form action="<?= base_url('jabatan/edit'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $jabatan['id']; ?>">                    
                </div>
                <div class="modal-body">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" id="nm_jabatan" name="nm_jabatan" value="<?= $jabatan['nm_jabatan']; ?>">                    
                </div>
               
                <div class="col-sm-11 mt-15">
                    <button class="btn btn-primary">Edit</button>       
                </div>
        </form>
        </div>
        </div>
    </div>
   
</div>
