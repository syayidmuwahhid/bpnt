<!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <!-- <a type="button" class="close" aria-hidden="true" href="">&times;</a> -->
                      <div class="container">
                            
                          <div class="row">
                              <div class="col">
                                <img src="assets/img/logo.jpeg" class="img-circle" height="100px ">
                              </div>
                              <div class="col">
                            <H1 class="text-dark">BPNTKU</H1>
                              </div>
                              <div class="col">
                               <img src="assets/img/kab.png" height="100px" style="margin-left:30px ">
                              </div>
                            </div>
                       </div>
                       
                        
                       
                          
                        
                          
                    </div>
                    <div class="modal-body">
                      <form method="post" class="form-horizontal style-form">
                        <div class="form-group">
                          <label class="col-sm-3 col-md-3 col-lg-3 col-3 control-label"><div class="text-right">Username</div></label>
                          <div class="col-sm-8 col-md-8 col-lg-8 col-8">
                            <input type="text" class="form-control" name="username">
                          </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 col-md-3 col-lg-3 col-3 control-label"><div class="text-right">Password</div></label>
                          <div class="col-sm-8 col-md-8 col-lg-8 col-8">
                            <input type="password" class="form-control" name="password">
                          </div>  
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="login">Login</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php
    if (isset($_POST['login'])) {
      include 'admin/koneksi.php';
      $user=$_POST['username'];
      $pass=MD5($_POST['password']);

      $querylogin=$koneksi->query("SELECT * FROM tblogin WHERE username='$user' 
        AND password='$pass'");

      $cekdata = $querylogin->num_rows;
      $getdata = $querylogin->fetch_array();
      if ($cekdata==1) {
        $_SESSION['username']=$user;
        $_SESSION['iduser']=$getdata['iduser'];
        $_SESSION['namauser']=$getdata['namauser'];
        echo "<script>window.location='index.php';</script>";
      }else{
        echo "<script>alert('user dan password salah');
        window.location='index.php';</script>";
      }
    }
  ?>
        

