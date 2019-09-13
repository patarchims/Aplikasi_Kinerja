<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">

            <?= form_error('golongan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#golonganModal">Add New Golongan</a>
            <table class=" table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Golongan</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $queryJabatan = " SELECT * FROM golongan
                                      ORDER BY id ASC
                                    ";
                    $jabatan = $this->db->query($queryJabatan)->result_array();
                    ?>
                    <?php $i = 1; ?>
                    <?php foreach ($jabatan as $j) : ?>
                        <tr>
                            <th scope="row"><?= $i;  ?></th>
                            <td><?= $j['nm_golongan'];  ?></td>
                            <td>
                                <a href="<?= base_url('admin/edit_golongan/') . $j['id']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url('admin/hapus_golongan/') . $j['id']; ?>  " class="badge badge-danger" onclick="return confirm('Are you sure?')">delete</a>
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


<div class="modal fade" id="golonganModal" tabindex="-1" role="dialog" aria-labelledby="golonganModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="golonganModalLabel">Add New Golongan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/golongan'); ?>" method="post">
                <div class="modal-body">
                    <input type="text" class="form-control" id="golongan" name="golongan" placeholder="Nama Golongan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>


</div>