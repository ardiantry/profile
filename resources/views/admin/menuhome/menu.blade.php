 
    <div class="col-lg-6">
        <div class="card m-b-20">
            <div class="card-body">
                <h5 class="mt-0">Menu Header In frontend</h5>
                <div class="text-muted font-13 mb-4">
                      <form  method="POST" action="{{ route('simpanmenuhome') }}">
                        <div class="form-group row">
                            <div class="col-sm-12 col-lg-6 mo-b-15">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input class="form-control" type="text" id="name" name="namemenu" placeholder="Nama menu">
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <input class="form-control" type="text" id="example-email-input3" name="slug"  placeholder="slug">
                                
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                    </form>
                </div>
                <div class="custom-dd dd" id="nestable_list_1">

                   <ol class="dd-list">
                        <?php echo $listsidebar;?>
                    </ol>

                </div>
            </div>
        </div>
    </div>