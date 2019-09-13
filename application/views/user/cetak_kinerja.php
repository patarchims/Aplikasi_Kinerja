<div class="card text-center border border-white">
  <div class="card-header border border-white text-dark">
  <h5 class="card-title">LAPORAN KINERJA HARIAN PADA DINAS PERHUBUNGAN</h5>
  <h5 class="card-title">KOTA PEMATANGSIANTAR</h5>
  </div>

  <div class="card border border-white">
  <div class="card-body text-left text-dark">Nama : <?= $user['name']; ?> <br>
  NIP : <?= $user['nip']; ?><br>
  Golongan : <?= $user['golongan']; ?><br>
  Jabatan : <?= $user['jabatan']; ?>
</div>
</div>

  <div class="card-body text-dark">
  <table class="table table-bordered text-dark">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Kegiatan</th>
      <th scope="col">Output</th>
      <th scope="col">Volume</th>
      <th scope="col">Satuan</th>
      <th scope="col">Keterangan</th>
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
    </tr>      
    <?php $i++; ?>
  <?php endforeach; ?>
  </tbody>
</table>
  </div>
  <div class="card-footer text-muted border border-white">

  </div>
</div>