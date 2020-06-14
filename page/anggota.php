<?php
$pasien=query("SELECT * FROM pasien");
//var_dump($pasien);die;
?>





<h4>Daftar Pasien Klinik Diego Cihuni</h4>
<small>Daftar dari setiap orang yang sudah terverifikasi dan secara resmi masuk keanggotaan Pasien di Klinik.</small><br><br>

<!-- table -->
<div class="card">
    <div class="card-header">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tampilModalTambah">
        tambah pasien
        </button>
    </div>
    <div class="table-stats order-table ov-h table-responsive">
        <table class="table ">
            <thead>
                <tr>
                    <th class="serial">#</th>
                    <th>ID</th>
                    <th>Nama Pasien</th>
                    <th>Nama Orang Tua/Wali</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>Jenis Kel</th>
                    <th>No Telp</th>
                    <th class="serial">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                foreach($pasien as $row): ?>
                <tr>
                    <td class="serial"><?= $i?></td>
                    <td><?= $row["id"];?></td>
                    <td><?= $row["nama_pasien"];?></td>
                    <td><?= $row["nama_ortu"];?></td>
                    <td><?= $row["tempat_lahir"];?>,<?= $row["tanggal_lahir"];?></td>
                    <td><?= $row["alamat"];?></td>
                    <td><?= $row["jenis_kelamin"];?></td>
                    <td><?= $row["hp"];?></td>
                    <td>
                        <a href="index.php?page=editAnggota&id_anggota=<?= $row["id_anggota"];?>">
                            <button type="submit" class="btn btn-success btn-sm">edit</button>
                        </a>

                        <a href="function/hapus.php?id_anggota=<?= $row["id_anggota"];?>" onclick="return confirm('yakin mau menghapus data?')">
                            <button class="btn btn-danger btn-sm">hapus</button>
                        </a>
                        <a href="index.php?page=tampilAnggota&id_anggota=<?= $row["id_anggota"];?>">
                            <button type="submit" class="btn btn-primary btn-sm">detail</button>
                        </a>
                    </td>    
                </tr>
                <?php 
                $i++;
                endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<!-- modal tambah -->
<div class="modal fade" id="tampilModalTambah" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <strong>Tambah Pasien</strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div >
                    <!-- awal data -->
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <div class=""><label for="nik" class=" form-control-label">ID</label></div>
                                        <div class=""><input type="number" id="nik" name="nik" placeholder="masukan nik" class="form-control form-control-sm" ></div>
                                    </div>
                                    <div class="form-group col-6">
                                        <div class=""><label for="nama_anggota" class=" form-control-label">Nama Pasien </label></div>
                                        <div class=""><input type="text" id="nama_anggota" name="nama_anggota" placeholder="masukan nama" class="form-control form-control-sm" autocomplete="off"></div>
                                    </div>
                                    <div class="form-group col-6">
                                        <div class=""><label for="nama_anggota" class=" form-control-label">Nama Orang tua/Wali </label></div>
                                        <div class=""><input type="text" id="nama_anggota" name="nama_anggota" placeholder="masukan nama" class="form-control form-control-sm" autocomplete="off"></div>
                                    </div>

                                    <div class="form-group col-4">
                                        <div class=""><label for="jk" class=" form-control-label">Jenis Kelamin</label></div>
                                        <div class="">
                                            <select name="jk" id="jk" class="form-control-sm form-control">
                                                <option value="0">Pilih </option>
                                                <option value="pria">Pria </option>
                                                <option value="wanita">Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="form-group col-4">
                                        <div class=""><label for="tmp_lahir" class=" form-control-label">Tempat Lahir</label></div>
                                        <div class=""><input type="text" id="tmp_lahir" name="tmp_lahir" placeholder="masukan tempat lahir" class="form-control form-control-sm" autocomplete="off"></div>
                                    </div>

                                    <div class="form-group col-4">
                                        <div class=""><label for="tgl_lahir" class=" form-control-label">Tanggal Lahir</label></div>
                                        <div class=""><input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control form-control-sm"><small class="form-text text-muted">bulan-tanggal-tahun</small></div>
                                    </div>

                                    <div class="form-group col-4">
                                        <div class=""><label for="no_telp" class=" form-control-label">No Telepon</label></div>
                                        <div class=""><input type="text" id="no_telp" name="no_telp" placeholder="masukan no telepon" class="form-control form-control-sm" autocomplete="off"></div>
                                    </div>

                                    <div class="form-group col-12">
                                        <div class=""><label for="alamat" class=" form-control-label">Alamat</label></div>
                                        <div class=""><textarea name="alamat" id="alamat" rows="3" placeholder="masukan alamat anda" class="form-control form-control-sm"></textarea></div>
                                    </div>
                                
                                    <div class="row form-group col-12">
                                        <div class="col col-md-3"><label for="gambar" class=" form-control-label">Masukan gambar</label></div>
                                        <div class="col-12 col-md-9"><input type="file" id="gambar" name="gambar" class="form-control-file form-control-sm"></div>
                                    </div>
                                </div>
                                
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary " name="tambah_anggota">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger ">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>

                            </form>
                        </div>
                        
                    </div>
                    <!-- akhir data -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /modal tambah -->
