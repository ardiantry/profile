<style type="text/css">
div#map {
    height: 288px;
}
</style>
<div class="col-lg-12 col-sm-12 col-md-12">
	<div class="row">


		<div class="col-lg-4">
		    <div class="card">
		        <div class="card-body">
		            <h5 class="mt-0">Logo</h5>
		            <p class="text-muted font-13 mb-4">You can add a default value</p>
		            <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="">
		        </div>
		        <div class="form-group">
					<div class="col-lg-12">
						<input type="submit" name="simpanlogo" value="Simpan Logo" class="form-control btn btn-primary">
					</div>
				</div>
		    </div>
		</div>


		<div class="col-lg-4">
		    <div class="card">
		        <div class="card-body">
		            <h5 class="mt-0">Icon</h5>
		            <p class="text-muted font-13 mb-4">You can add a default value</p>
		            <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="">
		        </div>
		    </div>
		</div>

		<div class="col-lg-4">
		    <div class="card">
		        <div class="card-body">
		            <h5 class="mt-0">small Logo</h5>
		            <p class="text-muted font-13 mb-4">You can add a default value</p>
		            <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="">
		        </div>
		    </div>
		</div>

		<div class="col-lg-12">
		    <div class="card">


		        <div class="card-body">
		    
			        	<div class="form-group row">

			        		<div class="col-lg-6">
			        			<label>Nama Web</label>
			        			<input class="form-control" type="text" name="Nama Web" placeholder="Judul">
			        		</div>
			        		<div class="col-lg-6">
			        			<label>No Telpon/Hp</label>
			        			<input class="form-control" type="number" name="No Telpon/Hp" placeholder="Judul">
			        		</div>

			        	</div>

			        	<div class="form-group row">
			        		<div class="col-lg-6">
			        			<label>E-mail</label>
			        			<input class="form-control" type="email" name="E-mail" placeholder="Judul">
			        		</div>
			        		<div class="col-lg-6">
			        			<label>Alamat</label>
			        			<input class="form-control" type="text" name="Alamat" placeholder="Judul">
			        		</div>
			        	</div>

			        	<div class="form-group row">
			        		<div class="col-lg-12">
			        			<label>Deskripsi Perusahaan</label>
			        			<textarea class="form-control" id="editor2" name="Deskripsi Perusahaan"></textarea>
			        		</div>
			        	</div>
			        	<div id="map"></div>
			        </div>



		    </div>
		</div>



	</div>
</div>

<script type="text/javascript">
	CKEDITOR.replace( 'editor2' );
	  // This example uses a symbol to add a vector-based icon to a marker.
      // The symbol uses one of the predefined vector paths ('CIRCLE') supplied by the
      // Google Maps JavaScript API.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: {lat: -25.363882, lng: 131.044922}
        });

        var marker = new google.maps.Marker({
          position: map.getCenter(),
          icon: {
            path: google.maps.SymbolPath.CIRCLE,
            scale: 10
          },
          draggable: true,
          map: map
        });

      }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcCBoLD0EumYHZvzabqQcP8mLrh1q0Obk&callback=initMap">
    </script>