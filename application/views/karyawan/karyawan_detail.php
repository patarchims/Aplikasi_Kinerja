
<div class="container-fluid mt-5">
<div class="row">
<div class="col-lg-6">
    <form method="post">
          <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nip" name="nip" value="<?= $user['nip']; ?>" readonly>
                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Golongan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nip" name="nip" value="<?= $user['golongan']; ?>" readonly>
                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nip" name="nip" value="<?= $user['jabatan']; ?>" readonly>
                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Pendidikan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nip" name="nip" value="<?= $user['pendidikan']; ?>" readonly>
                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nip" name="nip" value="<?= $user['tmpt_lahir']; ?>" readonly>
                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nip" name="nip" value="<?= $user['tgl_lahir']; ?>" readonly>
                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nomor HP</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nip" name="nip" value="<?= $user['no_hp']; ?>" readonly>
                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>


    </form>
</div>
</div>
</div>
</div>