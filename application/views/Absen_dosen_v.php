 <div class="container box">
	 <div class="table-responsive">
	 <h2>Absensi <?php echo $status ?> <small>Politeknik Negeri Malang</small></h2>
	 <br>


	        <table id="table" class="table table-hover" cellspacing="0" width="100%">
	        	<th>No</th>
	        	<th>Tanggal</th>
                <th>Nip</th>
                <th>Nama</th>
                <th>Jam Absen</th>
                <th>Jurusan</th>
                
                	<?php $no=1; foreach ($data as $val ): ?>
                	<tr>
                	<td><?php echo $no++ ?></td>	
                	<td><?php echo $val->tanggal ?></td>	
                	<td><?php echo $val->nip_karyawan ?></td>	
                	<td><?php echo $val->nama_karyawan ?></td>	
                	<td><?php echo $val->jam_datang ?></td>	
                	<td><?php echo $val->nama_jurusan ?></td>	
                	</tr>
                	<?php endforeach; ?>
                
	        </table>
	 </div>
 </div>
 <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>