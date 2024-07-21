$(function(){
 $('.ClickTambah').on('click', function(){
  $('#FormModalLabel').html('Tambah Data Mahasiswa');
  $('.modal-footer button[type=submit').html('Tambah Data');
  $('.modal-body form')[0].reset();
 });

 $('.ClickUbah').on('click', function(){
  $('#FormModalLabel').html('Edit Data Mahasiswa');
  $('.modal-footer button[type=submit').html('Ubah Data');
  $('.modal-body form').attr('action', 'http://localhost/Semester_3/Php_Mvc2/public/mahasiswa/editdata');
  const id = $(this).data('id');

  $.ajax({
   url: 'http://localhost/Semester_3/Php_Mvc2/public/mahasiswa/edit',
   data: {id : id},
   method: 'post',
   dataType: 'json',
   success: function(data){
    $('#id').val(data.id);
    $('#nama').val(data.nama);
    $('#nim').val(data.nim);
    $('#email').val(data.email);
    $('#prodi').val(data.prodi);
   }

  })
 });
//  $('.tombolTambahData').on('click', function () {
//   $('#judulModal').html('Tambah Data Mahasiswa');
//   $('.modal-footer button[type=submit]').html('Tambah Data');
//   $('.modal-body form')[0].reset();
// });
});
// console.log('ok');