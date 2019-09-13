<!-- Begin Page Content -->


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>
            <div class="row-mt3">
                <div class="col-md-6">
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#kinerjaModal">Add New Kinerja</a>
                </div>
            </div>
            <div class="row-mt3">
                <div class="col-md-6">
                <form action="kinerja" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari data kinerja.." >
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>          
                                              
                    </div>
                    </div>
                </form>
                <form action="cetak_kinerja" target="blank">
                <div class="input-group-append">
                <button class="btn btn-success mb-2" type="submit">Cetak</button>
                </form>
                </div>
                </div>
            </div>        

            <table class=" table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tanggal </th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Output</th>
                        <th scope="col">Volume</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kinerja as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i;  ?></th>
                            <td><?= $k['tanggal'];  ?></td>
                            <td><?= $k['kegiatan'];  ?></td>
                            <td><?= $k['output'];  ?></td>
                            <td><?= $k['volume'];  ?></td>
                            <td><?= $k['satuan'];  ?></td>
                            <td><?= $k['keterangan'];  ?></td>
                            <td>
                                <a href="<?= base_url('user/kinerja_edit/') . $k['id_kinerja']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url('user/hapus_kinerja/') . $k['id_kinerja']; ?> " class="badge badge-danger" onclick="return confirm('Are you sure?')">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- Modal-->


<div class="modal fade" id="kinerjaModal" tabindex="-1" role="dialog" aria-labelledby="kinerjaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kinerjaModalLabel">Add New Kinerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>           

            <form action="<?= base_url('user/kinerja'); ?>" method="post">
                <div class="modal-body">
                     <div class="form-group">
                        <input type="hidden" class="form-control" id="email" name="email" value="<?= $user['email'] ?> ">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" >
                        
                    </div>
                    <div class="form-group">                        
                        <textarea class="form-control" id="kegiatan" name="kegiatan" rows="3" placeholder="Kegiatan"></textarea>
                        
                    </div> 
                    <div class="form-group">
                        <input type="text" class="form-control" id="output" name="output" placeholder="Output">
                        
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="volume" name="volume" placeholder="Volume">
                       
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan">
                        
                    </div>
                    <div class="form-group">                        
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Keterangan"></textarea>
                        
                    </div>            
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>


</div>