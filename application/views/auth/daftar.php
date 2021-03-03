<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  	<div class="container">
  		<h1 style="text-align-last: center;">Daftar Disini</h1>
    <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
    	    <?php
         $arr = $this->session->flashdata();
          if(!empty($arr['flash_message'])){
              $html = '<div class="bg-danger  flash-message ">';
              $html .= $arr['flash_message'];
              $html .= '</div>';
              echo $html;
          }
      ?>
		<form method="post" action="<?php base_url()?>daftar">
			<div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">Nama Depan</label>
		<input type="text" class="form-control" value="<?php echo set_value('nama_depan');?>" id="exampleInputEmail1" name="nama_depan" aria-describedby="emailHelp" maxlength="50">	
		</div>
		<div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
		<input type="text" class="form-control" value="<?php echo set_value('nama_belakang');?>" id="exampleInputEmail1" name="nama_belakang" aria-describedby="emailHelp" maxlength="50">	
		</div>
		<label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
			<select class="form-select" name="jenis_kelamin" value="<?php echo set_value('jenis_kelamin');?>"  aria-label="Default select example">
			<option selected> </option>
			<option value="1" >Laki-laki</option>
			<option value="2">Perempuan</option>

			
			</select>
		<div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">Email</label>
		<input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo set_value('email');?>" name="email" aria-describedby="emailHelp" maxlength="100">
		
		</div>
		
		<div class="mb-3 form-check">
		<input type="checkbox" class="form-check-input" name="aturan" id="exampleCheck1" required>
		<label class="form-check-label" for="exampleCheck1">Check me out</label>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
    </div>
    <div class="col-md-2">
    </div>

</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
