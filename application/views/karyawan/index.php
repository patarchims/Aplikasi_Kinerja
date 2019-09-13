<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    

    <?= $this->session->flashdata('message'); ?>
    <div class="row-mt3">
                <div class="col-md-6">
                <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                <form action="karyawan" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword_cari" placeholder="Cari data karyawan.." >
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>                        
                    </div>
                    </div>
                </form>               
                </div>
            </div>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">NIP</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Pendidikan</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1; ?>
  <?php foreach ($karyawan as $k) :?>
    <tr>
      <th scope="row"><?= $i;  ?></th>   
      <td><?= $k['name']; ?></td>
      <td><?= $k['email']; ?></td>
      <td><?= $k['nip']; ?></td>
      <td><?= $k['jabatan']; ?></td>
      <td><?= $k['pendidikan']; ?></td>
      <td>
        <a href="<?= base_url('karyawan/karyawan_detail/') . $k['id']; ?>" class="badge badge-primary ">Detail</a>
        <a href="<?= base_url('karyawan/karyawan_edit/') . $k['id']; ?>" class="badge badge-success ">Edit</a>
          <a href="<?= base_url('karyawan/hapus_karyawan/') . $k['id']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure?')">Delete</a>
      </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach ;?> 
   
  </tbody>
</table>

    


</div>
<!-- /.container-fluid -->

</div>