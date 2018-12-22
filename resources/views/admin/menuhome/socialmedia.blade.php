<div class="col-lg-12 col-sm-12 col-md-12">
    <div class="row">
        <div class="col-lg-6">
            <div class="card m-b-20">
                <div class="card-body">
                    <h5 class="mt-0">Social Media</h5>
                    <div class="text-muted font-13 mb-4">
                        @if(Session::has("pesan")){!!Session::get("pesan")!!} @endif
                        <form method="POST" action="{{ route('simpansocialmedia') }}" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-12 col-lg-6 mo-b-15">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <input class="form-control" type="text" name="linksocial" placeholder="link social">
                                </div>
                                <div class="col-sm-12 col-lg-6">

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="icon_social" placeholder="icon social" aria-label="icon social">
                                        <span class="input-group-append">
                                                        <button class="btn btn-light cekicon" type="button"><i class="fa fa-search"></i></button>
                                                    </span>
                                    </div>

                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-lg-6">
                                    <input class="form-control" type="text" name="name_somed" placeholder="name social media">
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
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Social Media</th>
                                <th>Icon</th>
                                <th>Link</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $i=1;?>
                                @foreach($datasocial as $key)
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$key->name_somed}}</td>
                                    <td><i class="fa {{$key->icon_social}}"></i></td>
                                    <td>{{$key->linksocial}}</td>
                                    <td><a href="#" onclick="myFunction('{{route('hapussosmed',$key->id_social)}}')">hapus</a></td>
                                </tr>
                                <?php  $i++;?>
                                    @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>