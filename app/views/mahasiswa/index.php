<div class="container mt-3">
  <div class="row">
    <div class="col-lg-6">
      <?php Messege::flash() ?>
    </div>
  </div>
 <div class="row">
  <div class="col-lg-6">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3 ClickTambah" data-bs-toggle="modal" data-bs-target="#FormModal">
  Tambah Data
</button>
   <h3>Daftar Mahasiswa</h3>
   <ul class="list-group">
    <?php foreach ($data['mhs'] as $mhs) {?>
      <li class="list-group-item">
       <?php echo $mhs['nama'] ?>
       <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" 
      class="badge bg-danger float-end ms-1"
      onclick="return confirm('yakin?');">hapus</a>
      <a href="<?= BASEURL; ?>/mahasiswa/edit/<?= $mhs['id']; ?>" 
      class="badge bg-success float-end ms-1 ClickUbah"
      data-bs-toggle="modal" data-bs-target="#FormModal"
      data-id="<?= $mhs['id']; ?>">Edit</a>   
      <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" 
      class="badge bg-primary float-end ms-1">detail</a>
      
      </li>   
     <?php
    }?>
   </ul>
  </div>
 </div>
</div>
<!-- Modal -->
<div class="modal fade" id="FormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="FormModalLabel">Tambah Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="form-group">
            <label for="nim">Nim</label>
            <input type="number" class="form-control" id="nim" name="nim">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="prodi">Prodi</label>
            <select name="prodi" class="form-control" id="prodi">
              <option value="Sistem Informasi">Sistem Informasi</option>
              <option value="Teknologi Informasi">Teknologi Informasi</option>
              <option value="Informatika">Informatika</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </div>
      </form>
    </div>
  </div>
</div>