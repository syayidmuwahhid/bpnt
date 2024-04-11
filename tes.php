<!DOCTYPE html>
<html>
<head>
 <title>maribelajarcoding.com</title>
 <?php 
  include 'admin/koneksi.php';

 ?>
</head>
<body>
 <h2>maribelajarcoding.com</h2>
<table> 
 <form>
  <tr>
   <td>NIM</td>
   <td>
    <select id="nim" name="nim" onchange="changeValue(this.value)">
     <option disabled="" selected="">Pilih</option>
     <?php 
       $sql=$koneksi->query("SELECT * FROM tb_penerima");
       $jsArray = "var prdName = new Array();\n";
       while ($data=$sql->fetch_Array()) {
      
        echo '<option value="'.$data['noktp'].'">'.$data['noktp'].'</option> ';
        $jsArray .= "prdName['" . $data['noktp'] . "'] = {nama:'" . addslashes($data['nama']) . "'};\n";
      
       }
      ?>
    </select>
   </td>
  </tr>
  <tr>
   <td>Nama</td>
   <td><input type="text" name="nama" id="nama"></td>
  </tr>
 
  <tr>
   <td></td>
   <td><input type="submit" name="simpan" value="Simpan"></td>
  </tr>
 </form>
</table>
  <script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(x){  
    document.getElementById('nama').value = prdName[x].nama;   
    };  
    </script> 
</body>
</html>