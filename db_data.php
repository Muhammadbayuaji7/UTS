<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
body {
	background:url('black.jpg');
	background-size: cover;
	font-family: 'Open Sans', sans-serif;
}
fieldset{
	width: 50%;
	margin: 200px auto;
	border: none;
}
label,
input {
	display: block;
}
select {
	width: 100%;
}

</style>
</head>
<body>

	<fieldset>
		<form action="db_data.php" method="post">
		<table>
			<tr>
				<td><label>Nama Wilayah</label></td>
				<td>
			<select name="wilayah">
				<option value="DKI Jakarta">DKI Jakarta</option>
				<option value="Jawa Barat">Jawa Barat</option>
				<option value="Banten">Banten</option>
				<option value="Jawa Tengah">Jawa Tengah</option>
			</select>
				</td>
			</tr>
		
			<tr>
				<td><label>Jumlah Positif</label></td>
				<td><input type="text" name="jmlpositif"></td>
			</tr>

			<tr>
				<td><label>Jumlah Dirawat</label></td>
				<td><input type="text" name="jmldirawat"></td>
			</tr>
			<tr>
				<td><label>Jumlah Sembuh</label></td>
				<td><input type="text" name="jmlsembuh"></td>
			</tr>
			<tr>
				<td><label>Jumlah Meninggal</label></td>
				<td><input type="text" name="jmlmeninggal"></td>
			</tr>
			<tr>
				<td><label>Nama Operator</label></td>
				<td><input type="text" name="nmoperator"></td>
			</tr>
			<tr>
				<td><label>NIM</label></td>
				<td><input type="text" name="nim_mahasiswa"></td>
			</tr>
			<tr>
				<td><input type="submit" name="tambah" value="SUBMIT" class="btn"></td>
			</tr>
		</table>
	</form>
		</fieldset>

		<?php 
        if(isset($_POST["tambah"])){
          $myFile = fopen("dataps.txt", "w") ;
          fwrite($myFile, implode("|", $_POST));
          fclose($myFile);

          $content = file_get_contents("dataps.txt");
          $datas = explode("|", $content);
          
          $wilayah = $datas[0];
          $positif = $datas[1];
          $dirawat = $datas[2];
          $sembuh = $datas[3];
          $meninggal = $datas[4];
          $operator = $datas[5];
          $nim = $datas[6];
        
      ?>
      <style type="text/css">
          tr {
            color: white; 
          }
          table {
            width: 50%;
          }
      </style>
      <body style="background-size: cover; background-image: url('black.jpg');" >
      
      
      <div style="text-align:center; color: #FFF">
        <?php 
          echo "Data pemantauan Covid-19 Wilayah".$wilayah."<br>";
          echo "<td>Per".date('d F Y h:i:s', time())."<br>";
          echo $operator."/".$nim."<br>";


        ?>

        <table border=1 align="center" style="text-align:center">
        <thead>
          <tr>
            <th>POSITIF</th>
            <th>DIRAWAT</th>
            <th>SEMBUH</th>
            <th>MENINGGAL</th>
          </tr>
          </thead>

          <tbody>
            <tr>
              <td><?= $positif; ?></td>
              <td><?= $dirawat; ?></td>
              <td><?= $sembuh; ?></td>
              <td><?= $meninggal; ?></td>
            </tr>
          </tbody>
        </table>

      <?php } ?>
      </div>
</body>
</html>
