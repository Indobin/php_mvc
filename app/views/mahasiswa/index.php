<div class="container">
 <div class="row">
  <div class="col-6">
   <h3>Daftar Mahasiswa</h3>
   <ul>
    <?php foreach ($data['mhs'] as $mhs) {?>
     <ul>
      <li><?php echo $mhs['nama'] ?></li>
     </ul>     
     <?php
    }?>
   </ul>
  </div>
 </div>
</div>
