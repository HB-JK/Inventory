<html>
<head>    
    <title>Homepage</title>
</head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.6.0.min.js"></script>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">SUMBER RODA</a>
    </div>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav">
        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="penjualan.php">List Penjualan</a></li>
        <li class="nav-item"><a class="nav-link" href="history.php">History</a></li>
      </ul>
  </div>

  </div>
</nav>
 
    <div class="container mt-5">

      <div class="mb-5">
        <button class="btn btn-primary" id="open" onclick="show(1)">Add Item</button>
        <input type="button" id="close" value="close" onclick="close()" style="display: none" class="btn btn-danger">
        <div id="barang" class="mt-3"></div>
      </div>

      <h2 class="mt-2 mb-4">List Item Sumber Roda</h2>

      <div class="search row justify-content-center">
        <input type="text" name="search" id="search" class="form-control col-md-8" onkeyup="search(this.value)" placeholder="Search...">
      </div>

      <div id="item"></div>
    </div>

<script>
  $('document').ready(function(){
    loadTable();
  });

  function loadTable(page){
    $.ajax({
      type: 'POST',
      url: 'barang/load_table.php',
      data: {
        page
      },
      dataType: 'html',
      success: res => {
        $('#item').html(res);
      }
    });
  }

  function awal(){
    loadTable();
  }

  function kurang(){
    var active = parseInt($('#active').val());
    if(active > 1){
      var sisa = active - 1;
      loadTable(sisa);
    }else{
      loadTable(1);
    }
  }

  function tambah(jumlah){
    var active = parseInt($('#active').val());
    if(active < jumlah){
      var sisa = active + 1;
      loadTable(sisa);
    }else{
      loadTable(jumlah);
    }
  }

  function akhir(jumlah){
    loadTable(jumlah);
  }

  function deleteConfirmation(id){
    var konfirmasi = confirm('Apakah Kamu yakin?');
    if(konfirmasi ==  true){
      $.ajax({
        type: 'POST',
        url: 'barang/delete.php',
        data: {id},
        dataType: 'json',
        success: function(res){
          alert(res.message);
          loadTable();
        }
      });
    }
  }

  function search(search){
    $.ajax({
      type: 'POST',
      url: 'barang/search_action.php',
      data: {
        search
      },
      dataType: 'html',
      success: res =>{
        if(search != ''){
          $('#item').html(res);
        }else{
          loadTable();
        }
      }
    });
  }

  function show(action){
    $.ajax({
      type: 'POST',
      url: 'barang/add_item_form.php',
      data: {action},
      dataType: 'html',
      success: res=>{
        $('#barang').html(res);
        $('#close').show();
      }
    });
  }

  $('#close').click(function(){
    $('#barang').empty();
    $('#close').hide();
  });

  function save(){
    var action = 1;
    var nama = $('#nama').val();
    var satuan = $('#satuan').val();
    var stock = $('#stock').val();
    var harga_list = $('#harga_list').val();
    var cashback = $('#cashback').val();
    var harga_khusus = $('#harga_khusus').val();
    var diskon = $('#diskon').val();
    $.ajax({
      type: 'POST',
      url: 'barang/add_item.php',
      data: {
        action,
        nama,
        satuan,
        stock,
        harga_list,
        cashback,
        harga_khusus,
        diskon
      },
      dataType: 'json',
      success: function(res){
        alert(res.message);
        loadTable();
        $('#nama').val('');
        $('#stock').val('');
        $('#harga_list').val('');
        $('#cashback').val('');
        $('#harga_khusus').val('');
        $('#diskon').val('');
      }
    });
  }

  function edit_form(id){
    var action = 2;
    $.ajax({
      type: 'POST',
      url: 'barang/add_item_form.php',
      data: {
        action,
        id
      },
      dataType: 'html',
      success: res =>{
        $('#barang').html(res);
        $('#close').show();
      }
    });
  }

  function update(id){
    var action = 2;
    var nama = $('#nama').val();
    var satuan = $('#satuan').val();
    var stock = $('#stock').val();
    var harga_list = $('#harga_list').val();
    var cashback = $('#cashback').val();
    var harga_khusus = $('#harga_khusus').val();
    var diskon = $('#diskon').val();
    $.ajax({
      type: 'POST',
      url: 'barang/add_item.php',
      data: {
        action,
        id,
        nama,
        satuan,
        stock,
        harga_list,
        cashback,
        harga_khusus,
        diskon
      },
      dataType: 'json',
      success: function(res){
        alert(res.message);
        loadTable();
        $('#barang').empty();
        $('#close').hide();
      }
    });
  }

</script>
</body>
</html>