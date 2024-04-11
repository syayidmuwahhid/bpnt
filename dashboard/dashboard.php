
                            <h1 class="page-header">Dashboard<hr></h1>

                            <div class="col-lg-12">
              <div class="row">
                          <div class="col-lg-3 col-md-6">
                              <div class="panel panel-primary">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <i class="fa fa-bar-chart fa-5x"></i>
                                               <?php
                                                  include 'admin/koneksi.php';
                                                  $sql = mysqli_query($koneksi,"SELECT COUNT(kodebarang) FROM tb_barang");
                                                  $data = mysqli_fetch_array($sql);
                                              ?> 
                                          </div>
                                          <div class="col-xs-9 text-right">
                                            <b><div>Data Barang</div></b>
                                              <b><div class="display-1"><?=$data[0];?></b></div>
                                              

                                          </div>
                                      </div>
                                  </div>
                                  <a href="?pg=barang">
                                      <div class="panel-footer">
                                          <span class="pull-left">Selengkapnya....</span>
                                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                          <div class="clearfix"></div>
                                      </div>
                                  </a>
                              </div>
                          </div>
                         <div class="col-lg-3 col-md-6">
                              <div class="panel bg-danger text-white">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <i class="fa fa-address-card fa-5x"></i>
                                              <?php
                                                  include 'admin/koneksi.php';
                                                  $sql = mysqli_query($koneksi,"SELECT COUNT(noktp) FROM  tb_penerima");
                                                  $buk = mysqli_fetch_array($sql);
                                              ?> 
                                          </div>
                                          <div class="col-xs-9 text-right">
                                              <b><div>Data Penerima</div></b>
                                              <b><div class="display-1"><?=$buk[0];?></b></div>
                                          </div>
                                      </div>
                                  </div>
                                  <a href="?pg=penerima">
                                      <div class="panel-footer">
                                          <span class="pull-left">Selengkapnya....</span>
                                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                          <div class="clearfix"></div>
                                      </div>
                                  </a>
                              </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                              <div class="panel bg-warning text-white">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <i class="fa fa-tasks fa-5x"></i>
                                              <?php
                                                  include 'admin/koneksi.php';
                                                  $sql = mysqli_query($koneksi,"SELECT COUNT(nodistribusi) FROM tb_distribusi");
                                                  $rek1 = mysqli_fetch_array($sql);
                                              ?>
                                          </div>
                                          <div class="col-xs-9 text-right">
                                              <b><div>Data Distribusi</div></b>
                                              <b><div class="display-1"><?=$rek1[0];?></b></div>
                                          </div>
                                      </div>
                                  </div>
                                  <a href="?pg=distribusi">
                                      <div class="panel-footer">
                                          <span class="pull-left">Selengkapnya....</span>
                                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                          <div class="clearfix"></div>
                                      </div>
                                  </a>
                              </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                              <div class="panel bg-success text-white">
                                  <div class="panel-heading">
                                      <div class="row">
                                          <div class="col-xs-3">
                                              <i class="fa fa-book fa-5x"></i>
                                          </div>
                                          <div class="col-xs-9 text-right">
                                              <?php
                                                  include 'admin/koneksi.php';
                                                  $sql = mysqli_query($koneksi,"SELECT COUNT(idbarang) FROM tb_terimabarang");
                                                  $jmluser = mysqli_fetch_array($sql);
                                              ?> 
                                              <b><div>Data Diterima</div></b>
                                              <b><div class="display-1"><?=$jmluser[0];?></b></div>
                                          </div>
                                      </div>
                                  </div>
                                  <a href="?pg=terima">
                                      <div class="panel-footer">
                                          <span class="pull-left">Selengkapnya....</span>
                                          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                          <div class="clearfix"></div>
                                      </div>
                                  </a>
                              </div>
                          </div>
                      </div>
            </div>
						