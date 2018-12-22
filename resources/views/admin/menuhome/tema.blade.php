<div class="col-lg-12 col-sm-12 col-md-12">
    <div class="row">
        <div class="col-lg-6">

            <div class="card m-b-20">
                <div class="card-body">
                    <h5 class="mt-0">Tema</h5>
                    <div class="text-muted font-13 mb-4">
                        @if(Session::has("pesantema")){!!Session::get("pesantema")!!} @endif
                        <form method="POST" action="{{ route('simpanTema') }}" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-12 col-lg-6 mo-b-15">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <input class="form-control" type="text" name="namatema" placeholder="Judul">
                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <input class="form-control" type="text" name="urltema" placeholder="urltema">
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-lg-12">
                                    <input type="file" id="input-file-now-custom-1" class="dropify" name="file" data-default-file="">
                                </div>
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
                    <form method="POST" action="{{ route('UpdateTema') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama tema</th>
                                    <th>Link</th>
                                    <th>Gambar</th>
                                    <th>Ganti Tema</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($temafront as $key)
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$key->judul}}</td>
                                    <td>
                                        <img src="{{asset('images/tema/'.$key->gambar)}}" style="width: 50px;">
                                    </td>
                                    <td>{{$key->url_path}}</td>
                                    <td class="text-center">
                                        <input type="radio" name="active" value="{{$key->id_tema}}" <?php echo $key->active==null?'':'checked="checked"';?>>
                                    </td>
                                    <td><a href="#" onclick="myFunction('{{route('hapustema',$key->id_tema)}}')">hapus</a></td>

                                </tr>
                                <?php  $i++;?>
                                    @endforeach

                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success m-t-20">update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>