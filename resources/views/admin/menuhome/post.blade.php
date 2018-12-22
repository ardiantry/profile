<div class="col-lg-12 col-sm-12 col-md-12">
    <div class="row">

        <div class="col-lg-6">

            <div class="card m-b-20">
                <div class="card-body">
                    <h5 class="mt-0">Post</h5>
                    <div class="text-muted font-13 mb-4">

                        @if(Session::has("pesanpost")){!!Session::get("pesanpost")!!} @endif
                        <form method="POST" action="{{ route('simpanpost') }}" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-12 col-lg-6 mo-b-15">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <input type="hidden" name="id_post" value="" />
                                    <select class="form-control" name="id_menus">
                                        <option value="">Pilih page</option>
                                        <?php 
                                   $menus=DB::table('menu')->get(); 
                                   $getCategory='';
                                   foreach ($menus as $key) {

                                    $select=$key->id_menu==@app('request')->input('category')?'selected="selected"':'';
                                     $getCategory .='<option value="'.$key->id_menu.'" '.$select.'>'.unserialize($key->atribut)[1].'</option>';

                                    echo '<option value="'.$key->id_menu.'">'.unserialize($key->atribut)[1].'</option>';

                                    } ?>
                                    </select>

                                </div>
                                <div class="col-sm-12 col-lg-6">
                                    <input class="form-control" type="text" name="judul" placeholder="Judul">
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-lg-12">
                                    <input type="file" id="input-file-now-custom-1" class="dropify" name="file" data-default-file="http://127.0.0.1/images/post/default.png">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-lg-12">
                                    <label>Deskripsi</label>
                                    <script src="{{ asset('style_admin/plugins/ckeditor/ckeditor.js') }}"></script>
                                    <textarea class="form-control" id="editor1" name="deskirpsi"></textarea>
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
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Sort POst</label>
                            <select class="form-control" name="id_menus" id="Carimenu">
                                <?= $getCategory;  ?>
                            </select>
                        </div>
                    </div>
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Page</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                        $p=DB::table('posts');
                        if(app('request')->input('category'))
                        {
                        $p->where('id_menus','=',app('request')->input('category'));
                        }
                        else
                        {
                             $p->where('id_menus','=',1);
                        }
                        $p->orderBy('id_post');
                        $page=$p->get(); 
                        ?>
                                @foreach($page as $key)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        <? 
                             $atribut=DB::table('menu')->where('id_menu','=',$key->id_menus)->get();
                             echo unserialize($atribut[0]->atribut)[1];
                              ?>
                                    </td>
                                    <td><a data-id="{{$key->id_post}}" class="editpost" title="Edit {{$key->judul}}" href="#">{{$key->judul}}</a></td>
                                    <td>{!!$key->deskirpsi!!}</td>
                                    <td><a href="#" onclick="myFunction('{{route('hapuspost',$key->id_post)}}')">hapus</a></td>
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


      <script>
            CKEDITOR.replace( 'editor1' );
            $('.editpost').click(function(e){
                $('input[name=id_post]').val();

                ///$('option').removeAttr('selected');
                $('input[name=judul]').val();
                $('input[name=file]').attr('data-default-file','');
                // $('#editor1').text();
               
            var idpost=$(this).data('id');
            e.preventDefault();
                $.ajax({
                    url:'{{ route('showeditpost') }}',
                    dataType: 'json',
                    data: {id:idpost},                         
                    type: 'get',
                    success:function(data)
                    {
                       // alert(data.dataedit.id_post);
                        $('input[name=id_post]').val(data.dataedit.id_post);
                        $('select[name=id_menus]').val(data.dataedit.id_menus);
                        $('input[name="judul"]').val(data.dataedit.judul);
                       // $('input[name="file"]').attr('data-default-file','{{ asset('images/post')}}/'+data.dataedit.image);
                       $('.dropify-render img').attr('src','{{ asset('images/post')}}/'+data.dataedit.image)
                        CKEDITOR.instances['editor1'].setData(data.dataedit.deskirpsi);
                       

                    }
                });
                   
            })
            $('#Carimenu').change(function()
            {
                var idPost=$(this).val();
                window.location.href = '{{route('menuhome')}}?category='+idPost+'#posttema';
            });
            
               
     </script>