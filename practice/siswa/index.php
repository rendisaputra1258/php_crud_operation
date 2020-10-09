<?php 
include "connection.php";

$siswa=$db->query("select * from siswa");
$data_siswa=$siswa->fetchAll();
// echo $data_siswa;

foreach ($data_siswa as $key) {
    // echo $key['nama']."  ".$key['pekerjaan']."<br>";
}

if(isset($_POST['search']))
{

  $filter=$_POST['search'];

  $search=$db->prepare("select * from siswa where nama=? or pekerjaan=?");

  $search->bindValue(1,$filter,PDO::PARAM_STR);
  $search->bindValue(2,$filter,pdo::PARAM_STR);

  $search->execute(); //Execution of PDO statement

  $tampil_data=$search->fetchAll(); //Result from PDO stateent

  // var_dump($data);

  $row=$search->rowCount();

  // var_dump($row);

}else{
    $data=$db->query("select * from siswa");
    $tampil_data=$data->fetchAll();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>My SQL</title>
</head>
<body>
    


<div class="container " >
  <div class="row">
    <div class="col-6">

    <h1 class="text-primary">Data Siswa</h1>

    <!--alert mesege-->
<?php if(isset($row)): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <p class="lead"><?php echo $row; ?>data ditemukan !</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif;?>
      <table class="table table-striped">
        <thead class="bg-primary">
          <tr>
            <th scope="col">Nama</th>
            <th scope="col">Pekerjaan</th>
            <th scope="col">Nilai</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($data_siswa as $key) : ?>
          <tr>
            <td><?php echo $key["nama"]; ?></td>
            <td><?php echo $key["pekerjaan"]; ?></td>
            <td><?php echo $key["nilai"]; ?></td>
            
          </tr>
            <?php endforeach; ?>
        </tbody>
      </table>


    </div>
  </div>
</div>

<div class="container positiion-fixed">
  <div class="row">
    <div class="col-6">
      
      <h2 class="text-primary">Cari Data Siswa</h2>
      
      <!--Data Form -->
      
    <form action="index.php" method="post" class="form-inline my-2 my-lg-0 ">
        <input type="text" name="search" class="form-control mr-sm-2" placeholder="nama/pekerjaan" aria-label="Search">
        <input type="submit" value="Cari" class="btn btn-outline-primary my-2 my-sm-0">
    </form>

          <form action="index.php" method="post" class="mt-2" class="form-inline my-2 my-lg-0">
          <input type="submit"  value="Tampilkan Semuanya" class="btn btn-outline-primary my-2 my-sm-0">
          </form>
         
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>