<?php
                    $queryJabatan = " SELECT * FROM jabatan
                                      ORDER BY id ASC
                                    ";
                    $jabatan = $this->db->query($queryJabatan)->result_array();

                    $queryGolongan = " SELECT * FROM golongan
                    ORDER BY id ASC
                    ";
                    $golongan = $this->db->query($queryGolongan)->result_array();

                    ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?> " alt="" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nip" name="nip" value="<?= $user['nip']; ?>">
                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
    <div class="form-group row">
    <label  class="col-sm-2 col-form-label" for="nip">Golongan</label>
    <div class="col-sm-10">
    <select class="custom-select" name="golongan" id="golongan">     
       <?php foreach ($golongan as $g) : ?>
        <option value="<?= $user['golongan']; ?>" selected><?= $user['golongan']; ?></option>
        <option value="<?= $g['nm_golongan']; ?>" selected><?= $g['nm_golongan']; ?></option>
      <?php endforeach; ?>
    </select>    
    </div>
    </div>
    <div class="form-group row">
    <label  class="col-sm-2 col-form-label" for="jabatan">Jabatan</label>
    <div class="col-sm-10">
    <select class="custom-select" name="jabatan" id="jabatan">
     <option value="" selected><?= $user['jabatan']; ?></option>
        <?php foreach ($jabatan as $j) : ?>        
        <option value="<?= $j['nm_jabatan']; ?>"><?= $j['nm_jabatan']; ?></option>
      <?php endforeach; ?>
    </select>
    </div>
    </div>
    <div class="form-group row">
    <label  class="col-sm-2 col-form-label" for="pendidikan">Pendidikan</label>
    <div class="col-sm-10">
    <select class="custom-select" name="pendidikan" id="pendidikan">    
         
        <option value="D1" selected ><?= $user['pendidikan']; ?></option>   
        <option value="D1" >D1</option>   
        <option value="D2" >D2</option> 
        <option value="D3" >D3</option> 
        <option value="D4" >D4</option> 
        <option value="S1" >S1</option> 
        <option value="S2">S2</option> 
        <option value="S3">S3</option> 
    </select>    
    </div>
    </div>
    <div class="form-group row">
        <label for="tmpt_lahir"  class="col-sm-2 col-form-label">Tempat Lahir</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" value="<?= $user['tmpt_lahir']; ?>">
        <?= form_error('tmpt_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    </div>
    <div class="form-group row">
        <label for="tgl_lahir"  class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $user['tgl_lahir']; ?>">
        <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
    </div>
    <div class="form-group row">
        <label for="no_hp"  class="col-sm-2 col-form-label">Nomor HP</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="no_hp" id="no_hp"  value="<?= $user['no_hp']; ?>">
        <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
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