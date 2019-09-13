         
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
    <h1 class="h3 mb-4 text-gray-800">Edit Data Kinerja</h1>

    <div class="row">
        <div class="col-lg-8">
        <form action="<?= base_url('user/kinerja_edit'); ?>" method="post">
       
        <div class="modal-body">
                    <input type="hidden" id="email" name="email" value="<?= $kinerja['email']; ?>">
                    <input type="hidden" id="id_kinerja" name="id_kinerja" value="<?= $kinerja['id_kinerja']; ?>">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $kinerja['tanggal']; ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('tanggal') ?></small>
                    </div>
                    
                    <div class="form-group">
                        <label>Kegiatan</label>
                        <textarea class="form-control" id="kegiatan" name="kegiatan" rows="3" ><?= $kinerja['kegiatan']; ?></textarea>                        
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('kegiatan') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Output</label>
                        <input type="text" class="form-control" id="output" name="output" value="<?= $kinerja['output']; ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('output') ?></small>
                    </div>                    
                    <div class="form-group">
                        <label>Volume</label>
                        <input type="text" class="form-control" id="volume" name="volume" value="<?= $kinerja['volume']; ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('volume') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan" value="<?= $kinerja['satuan']; ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('satuan') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $kinerja['keterangan']; ?>">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('keterangan') ?></small>
                    </div>                    
                </div>          
                <div class="col-sm-7">
                    <button class="btn btn-primary">Edit</button>
                </div>
           
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->  