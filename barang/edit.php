<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $ukuran=$_POST['ukuran'];
    $ring=$_POST['ring'];
    $jenis=$_POST['jenis'];
    $tipe_mobil=$_POST['tipe_mobil'];
    $stock=$_POST['stock'];
    $harga_list=$_POST['harga_list'];
    $cashback=$_POST['cashback'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE tableitem SET ukuran='$ukuran',ring='$ring',jenis='$jenis',tipe_mobil='$tipe_mobil',stock='$stock',harga_list='$harga_list',cashback='$cashback' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: search.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM tableitem WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $ukuran = $user_data['ukuran'];
    $ring = $user_data['ring'];
    $jenis = $user_data['jenis'];
    $tipe_mobil = $user_data['tipe_mobil'];
    $stock = $user_data['stock'];
    $harga_list = $user_data['harga_list'];
    $cashback = $user_data['cashback'];
}
?>
<html>
<head>    
    <title>Edit User Data</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="js/jquery-3.6.0.min.js"></script>
 
<style>
     a{
        color: white;
        text-decoration: none;
     }
     html{
        font-size: 18px;
     }

     .tr1{
        padding: 50px;
        margin: 50px;
        border-radius: 20px;
        background: black;
     }
     .mp3{
        margin: 30px;
        border-radius: 10px;
     }
     .mp4{
        padding:  10px;
        background: black;
        color: white;

     }
     .btnbtn{
        width: 150px;
        height: 50px;
        color: whitesmoke;
        background: black;
        border-radius: 20px ;
        font-size: 24px;
     }
     .btnbtn:hover{
        color: black;
        background: whitesmoke;
        transition: .5s ease;
     }
     .namemp{
        border-radius: 10px 0 0 10px;
     }
     .namemp2{
        border-radius: 0 10px 10px 0;
     }
 </style>


<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">SUMBER RODA</a>
    </div>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav">
        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="add.php">ADD NEW</a></li>
        <li class="nav-item"><a class="nav-link" href="search.php">Search Item</a></li>
        <li class="nav-item"><a class="nav-link" href="stock.php">Search Stock</a></li>
        <li class="nav-item"><a class="nav-link" href="penjualan.php">List Penjualan</a></li>
        <li class="nav-item"><a class="nav-link" href="history.php">History</a></li>
      </ul>
  </div>

  </div>
</nav>

  <center>
    <form name="update_user" method="post" action="edit.php">
        <table border="0" class="mp3">
            <tr class="tr1"> 
                <td class="mp4 namemp">ukuran</td>
                <td class="mp4 namemp2"><input type="text" name="ukuran" value=<?php echo $ukuran;?>></td>
            </tr>

            <tr><td>&nbsp;</td></tr>

            <tr class="tr1"> 
                <td class="mp4 namemp">ring</td>
                <td class="mp4 namemp2"><input type="text" name="ring" value=<?php echo $ring;?>></td>
            </tr>

            <tr><td>&nbsp;</td></tr>

            <tr class="tr1"> 
                <td class="mp4 namemp">jenis</td>
                <td class="mp4 namemp2"><input type="text" name="jenis" value=<?php echo $jenis;?>></td>
            </tr>


            <tr><td>&nbsp;</td></tr>

            <tr class="tr1"> 
                <td class="mp4 namemp">tipe_mobil</td>
                <td class="mp4 namemp2"><input type="text" name="tipe_mobil" value=<?php echo $tipe_mobil;?>></td>
            </tr>

            <tr><td>&nbsp;</td></tr>

            <tr class="tr1"> 
                <td class="mp4 namemp">stock</td>
                <td class="mp4 namemp2"><input type="text" name="stock" value=<?php echo $stock;?>></td>
            </tr>

            <tr><td>&nbsp;</td></tr>

            <tr class="tr1"> 
                <td class="mp4 namemp">Harga List</td>
                <td class="mp4 namemp2"><input type="text" name="harga_list" value=<?php echo $harga_list;?>></td>
            </tr>

            <tr><td>&nbsp;</td></tr>

            <tr class="tr1"> 
                <td class="mp4 namemp">Cash Back</td>
                <td class="mp4 namemp2"><input type="text" name="cashback" value=<?php echo $cashback;?>></td>
            </tr>

            <tr><td>&nbsp;</td></tr>
            
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" class="btnbtn" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>