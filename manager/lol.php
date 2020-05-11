<div class="col-md-5">
		<div class="card">
			<div class="card-header"><h5>Disposisi Surat</h5></div>
			<div class="card-body">
				<table class="table">
					<?php 
					$o = $e[0];
					$q = mysql_query("SELECT * from disposition where mailid = '$o'");
					while ($c = mysql_fetch_array($q)) {
					 ?>
					<tr>
						<td>Tanggal Disposisi</td>
						<td>:</td>
						<td><input type="text" readonly="" value="<?= $c[1] ?>" class="form-control" style="background: transparent;" name=""></td>
					</tr>
					<tr>
						<?php 
						$b = $c[7];
						$m = mysql_query("SELECT * from user where id = '$b'");
						while ($z = mysql_fetch_array($m)) {
						 ?>
						<td>Di Disposisikan Oleh</td>
						<td>:</td>
						<td><input type="text" readonly="" value="<?= $z[1]  ?>" class="form-control" style="background: transparent;" name=""></td>
						<?php } ?>
					</tr>
					<?php } ?>
					<?php } ?>
					<tr>
						<?php 
						$n = $c[0];
						$v = mysql_query("SELECT reply_at from disposition where id = '$n'");
						while ($s = mysql_fetch_array($v)) {
						 ?>
						<td>Di Disposisikan Ke</td>
						<td>:</td>
						<td><input type="text" readonly="" value="<?= $s[2] ?>" class="form-control" style="background: transparent;" name=""></td>
						<?php } ?>
					</tr>
					
				</table>
			</div>
		</div>
	</div>
