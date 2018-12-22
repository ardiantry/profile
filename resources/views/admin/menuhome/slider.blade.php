
<div class="col-lg-12 col-sm-12 col-md-12">
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-20">
                <div class="card-body">
                    <h5 class="mt-0">Slider</h5>
                    <div class="text-muted font-13 mb-4">

                        @if(Session::has("pesanslider")){!!Session::get("pesanslider")!!} @endif
                        <form method="POST" action="" id="slider_Simpan" name="sliderSimpan" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-12 col-lg-4 mo-b-15">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <input class="form-control" required="required" type="text" name="judul" placeholder="Judul">
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <input class="form-control" required="required" type="number" name="order" placeholder="order">
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <input class="form-control" required="required" type="text" name="link" placeholder="link">
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-lg-12">
                                    <input type="file" name="file" required="required" id="input-file-now-custom-1" class="dropify" data-default-file="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-lg-12">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" required="required" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group progress" style="display: none;">
                                <div class="progress-bar progress-animated progress-bar-striped bg-danger" role="progressbar" style="max-width: 0%; border-radius: 50px;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <button type="submit" class="btn btn-primary px-4">Submit</button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="card m-b-20">
                <div class="card-body">
                    <form method="POST" action="{{ route('updateslider') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>

                                    <th>Judul</th>
                                    <th>order</th>
                                    <th>img</th>
                                    <th>link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($slider as $key)
                                <tr>
                                    <td>{{$key->judul}}</td>
                                    <td>
                                        <input type="text" class="form-control" name="order[{{$key->id_slider}}]" value="{{$key->order}}" />
                                    </td>
                                    <td> <img width="100%" src="{{asset('images/slider/'.$key->images_slider)}}"></td>
                                    <td>{{$key->link}}</td>
                                    <td><a onclick="myFunction('{{ route('hapusSlider',$key->id_slider)}}')" href="#">X</a></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

    <script type="text/javascript">
        var _url="{{ route('simpanslider') }}";
        var form = document.forms.namedItem("sliderSimpan");
            form.addEventListener('submit', function(ev) {
                $(".progress").fadeIn('show');
            oData       = new FormData(form);
        //oData.append("CustomField", "This is some extra data");
            var oReq        = new XMLHttpRequest();
            oReq.responseType = 'json';
            oReq.crossDomain = true;
            oReq.open("POST", _url, true);
            oReq.upload.addEventListener('progress', function (e) {
                    if(e.lengthComputable){
                    var max = e.total;
                    var current = e.loaded;

                    var Percentage = (current * 100)/max;
                   $('#slider_Simpan .progress-bar').css('max-width',parseInt(Percentage)+'%');
                     console.log(Percentage);

                        if(Percentage >= 100)
                        {
                     
                            location.reload();

                           
                        }
                    }  
            });
            oReq.send(oData);
          ev.preventDefault();
            }, false);

        
    </script>