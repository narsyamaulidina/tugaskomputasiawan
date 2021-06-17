<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<title>Data Penitipan Barang</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
</head>
<body style="background-color: #f5e8fd">

<div class="container">
	<h1 style="color: #152133">Data <small style="color: #36325e">Penitipan Barang!</small>
		<div class="pull-right"><a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_add_new"> Tambah Data Baru </a></div>		
	</h1>

	<table class="table table-bordered table-striped" style="background-color: #cfcfe6; text-align:center; border: 1px solid black " id="mydata">
		<thead>
			<tr>
				<td style="border-color:black">Kode Barang</td>
				<td style="border-color:black">Nama Penitip Barang</td>
				<td style="border-color:black">Jumlah Barang</td>
				<td style="border-color:black">Waktu Penitipan Barang</td>
				<td style="border-color:black">Waktu Pengambilan Barang</td>
                <td style="border-color:black">Aksi</td>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach($data->result_array() as $i):
					$barang_id=$i['barang_id'];
					$barang_penitip=$i['barang_penitip'];
					$barang_jumlah=$i['barang_jumlah'];
					$penitipan_waktu=$i['penitipan_waktu'];
					$pengambilan_waktu=$i['pengambilan_waktu'];
			?>
			<tr>
				<td style="border-color:black"><?php echo $barang_id;?></td>
				<td style="border-color:black"><?php echo $barang_penitip;?></td>
				<td style="border-color:black"><?php echo $barang_jumlah;?></td>
				<td style="border-color:black"><?php echo date('Y-m-d H:i:s').$penitipan_waktu;?></td>
				<td style="border-color:black"><?php echo date('Y-m-d H:i:s').$pengambilan_waktu;?></td>
                <td style="width: 120px; border-color:black">
                    <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal_edit<?php echo $barang_id;?>"> Edit</a>
                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $barang_id;?>"> Hapus</a>
                </td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
	
</div>
	
//coding add barang

    <!-- ============ MODAL ADD BARANG =============== -->
        <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Data Penitipan Barang Baru</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/penitipan/simpan_penitipan'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-8">
                            <input name="kode_barang" class="form-control" type="text" placeholder="Kode Barang..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Penitip Barang</label>
                        <div class="col-xs-8">
                            <input name="penitip_barang" class="form-control" type="text" placeholder="Nama Penitip Barang..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah Barang</label>
                        <div class="col-xs-8">
                            <input name="jumlah_barang" class="form-control" type="text" placeholder="Jumlah Barang..." required>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" >Waktu Penitipan Barang</label>
                        <div class="col-xs-8">
                            <input name="waktu_penitipan" class="form-control" type="text" placeholder="Waktu Penitipan Barang..." readonly>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" >Waktu Pengambilan Barang</label>
                        <div class="col-xs-8">
                            <input name="waktu_pengambilan" class="form-control" type="text" placeholder="Waktu Pengambilan Barang..." readonly>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <!--END MODAL ADD BARANG-->

    <!-- ============ MODAL EDIT BARANG =============== -->
    <?php 
        foreach($data->result_array() as $i):
            $barang_id=$i['barang_id'];
			$barang_penitip=$i['barang_penitip'];
			$barang_jumlah=$i['barang_jumlah'];
			$penitipan_waktu=$i['penitipan_waktu'];
			$pengambilan_waktu=$i['pengambilan_waktu'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $barang_id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit Data Penitipan Barang</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/penitipan/edit_penitipan'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-8">
                            <input name="kode_barang" value="<?php echo $barang_id;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Penitip Barang</label>
                        <div class="col-xs-8">
                            <input name="penitip_barang" value="<?php echo $barang_penitip;?>" class="form-control" type="text" placeholder="Nama Penitip Barang..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah Barang</label>
                        <div class="col-xs-8">
                            <input name="jumlah_barang" value="<?php echo $barang_jumlah;?>" class="form-control" type="text" placeholder="Jumlah Barang..." required>
                        </div>
                    </div>

					<div class="form-group">
                        <label class="control-label col-xs-3" >Waktu Penitipan Barang</label>
                        <div class="col-xs-8">
                            <input name="waktu_penitipan" value="<?php echo $penitipan_waktu;?>" class="form-control" type="text" placeholder="Waktu Penitipan Barang..." readonly>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="control-label col-xs-3" >Waktu Pengambilan Barang</label>
                        <div class="col-xs-8">
                            <input name="waktu_pengambilan" value="<?php echo $pengambilan_waktu;?>" class="form-control" type="text" placeholder="Waktu Pengambilan Barang..." readonly>
                        </div>
                    </div>
					
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>

    <?php endforeach;?>
    <!--END MODAL EDIT BARANG-->

    <?php 
        foreach($data->result_array() as $i):
			$barang_id=$i['barang_id'];
			$barang_penitip=$i['barang_penitip'];
			$barang_jumlah=$i['barang_jumlah'];
			$penitipan_waktu=$i['penitipan_waktu'];
			$pengambilan_waktu=$i['pengambilan_waktu'];
        ?>
     <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_hapus<?php echo $barang_id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/penitipan/hapus_penitipan'?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus <b><?php echo $barang_penitip;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="kode_barang" value="<?php echo $barang_id;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach;?>
    <!--END MODAL HAPUS BARANG-->

<script src="<?php echo base_url().'assets/js/jquery-2.2.4.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
<script>
	$(document).ready(function(){
		$('#mydata').DataTable();
	});
</script>
</body>
</html>
