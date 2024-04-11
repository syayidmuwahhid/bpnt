<h1 class="page-header">Detail Terima<hr></h1>

<table class="table table-responsive"> 
                                    <?php 
                                                include 'admin/koneksi.php';
                                                $id = $_GET['view'];
                                                $data = mysqli_query($koneksi,"select * from tb_terima join tb_penerima on tb_terima.noktp=tb_penerima.noktp WHERE kodeterima = '$id'");
                                                while($d = mysqli_fetch_array($data)){
                                                    ?>
                                                    <tr>
                                                <th width="20%">Kode Terima</th>
                                                        <td><?php echo $d['kodeterima']; ?></td>
                                                     
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal</th>
                                                           <td><?php echo $d['tanggal']; ?></td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        
                                                        <th>No KTP</th>
                                                        <td><?php echo $d['noktp']; ?></td>
                                                    </tr>
                                                     <tr>
                                                        <th>Nama</th>
                                                        <td><?php echo $d['nama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                         <th>Perkerjaan</th>
                                                        <td><?php echo $d['jabatan']; ?></td>
                                                    </tr>
                                                    <tr>
                                                         <th>Daftar Barang</th>
                                                         <td>:</td>
                                                    </tr>

                                                    <?php 
                                                        $barang=$koneksi->query("SELECT * FROM tb_terimabarang join tb_barang ON tb_terimabarang.kodebarang=tb_barang.kodebarang WHERE kodeterima='$id'");
                                                        while ($get=$barang->fetch_array()) {
                                                        	echo"<tr>
                                                         <th></th>
                                                         <td>".$get['namabarang']." (".$get['jml']." x ".$get['harga']." = ".$get['subtotal'].")
                                                         </td>
                                                    </tr>";
                                                        }
                                                        ?>
                                                        <tr>
                                                         <th>Total</th>
                                                         <td><?=$d['total']?></td>
                                                    </tr>
                                                    <?php
                                                     
                                                    
                                                }
                                                ?>
                                          </table>