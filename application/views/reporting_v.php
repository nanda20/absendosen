 <div class="container box">
	 <div class="table-responsive">
         <div class="row">
         <div class="container">
         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
         <h2>Reporting<small> </small></h2>        
         </div>
         <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
<!-- <h5 class="text-right"> -->
 
 <?php
        $month_name=['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                 ?>
                <!-- </h5>         -->
        
                <form action="" method="POST" class="form-inline" role="form">
                
                        <div class="form-group">
                                <label class="sr-only" for="">label</label>
                                <select name="month" id="inputMonth" class="form-control" required="required">
                                 <?php foreach ($month_name as $key) {
                                        
                                    echo "<option value=".$key.">$key</option>";
                                 }?>

                                </select>
                                <select name="status" id="inputMonth" class="form-control" required="required">
                                        <option value="Admin">Admin</option>
                                        <option value="Dosen">Dosen</option>
                                </select>
                                <!-- <input type="email" class="form-control" id="" placeholder="Input field"> -->
                        </div>
                
                        
                
                        <button type="submit" class="btn btn-primary">Submit</button>
                         <button type="submit" class="btn btn-success" onclick="printDiv('print')">Print</button>
                </form>
         </div>
        
	 </div>

	 <br>
        
        <div class="container" id="print">
            
         <table id="tablePrint" class="table table-hover" cellspacing="0" width="100%">
	        	<th></th>
	        	<th>Tanggal</th>
                <th>Nip</th>
                <th>Nama</th>
                <th>Jam Absen</th>
                <!-- <th>Jurusan</th> -->
                
                	<?php $no=1; foreach ($data as $val ): ?>
                	<tr>
                	<td></td>	
                	<td><?php echo $val->tanggal ?></td>	
                	<td><?php echo $val->nip_karyawan ?></td>	
                	<td><?php echo $val->nama_karyawan ?></td>	
                	<td><?php echo $val->jam_datang ?></td>	
                	<!-- <td><?php echo $val->nama_jurusan ?></td>	 -->
                	</tr>
                	<?php endforeach; ?>
                
	        </table>
            </div>
	 </div>
 </div>
 <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script type="text/javascript">
    function printDiv(divName) {

     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>