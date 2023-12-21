$(function () {
  $(".tombolTambahData").on("click", function () {
    $("#formModalLabel").html("Tambah");
    $(".modal-footer button[type=submit]").html("Ubah"); //TODO
  });

  $(".tampilModalUbah").on("click", function () {
    $("#formModalLabel").html("Ubah");
    $(".modal-footer button[type=submit]").html("Ubah");
  });
});
