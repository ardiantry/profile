@extends('admin.layout.content')
@section('content')

<?php
$listsidebar='';
$active='';
$i=1;
foreach ($menu_publis as $key => $val) {
    if($val[2]==0)
    {

            $listsidebar .='<li class="dd-item" data-id="'.$key.'"><div class="dd-handle">'.$val[0].'</div>'.cek_parrent($key,$menu_publis)[1].'<a href="#" onclick="myFunction(\''.route('hapusmenu',$key).'\')" >x</a></li>';
 
    }
}

function cek_parrent($key,$menu_publis){
                $jumlh=[];
                $sub=false;
                foreach ($menu_publis as $key_perent => $val) {
                    if($val[2]==$key)
                        {
                        
                            $jumlh[$key_perent]=$val;
                            $sub=true;

                        }
                }
                $li =count($jumlh)!=0?'<ol class="dd-list">':'';
                foreach ($menu_publis as $key_perent => $val) 
                    {
                            if($val[2]==$key)
                            {
    
                                $li .='<li class="dd-item" data-id="'.$key_perent.'">
                                            <div class="dd-handle">'.$val[0].'</div>'.cek_parrent($key_perent,$menu_publis)[1].'<a href="#" onclick="myFunction(\''.route('hapusmenu',$key_perent).'\')">x</a>
                                        </li>';
                            }           
                    }
                $li .=count($jumlh)!=0?'</ol>':'';

                return array($sub,$li) ;
        }

 ?>
<style type="text/css">

li.dd-item {
    position: relative;
}
    .listicon {
    padding: 0;
    margin: 0;
}

.listicon li {
    display: inline-block;
    width: 15%;
    border: 1px solid #ccc;
    text-align: center;
    cursor: pointer;
        margin-top: 4px;
}
.listicon li:hover {
    background: #23abdf;
    color: #fff;
}
</style>

<?php

$listmenusetting='';
foreach ($menuSetting as $key => $value) {
   $listmenusetting .= '<li class="nav-item">
               <a class="nav-link '.$key.' pb-3 pt-0" data-toggle="tab" href="#'.$key.'" role="tab">
                   <i class="'.$value[1].'"></i>
                   '.$value[0].'
               </a>
           </li>';

}

 ?>
<div class="custom-tab tab-profile  m-t-20">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
       <?=$listmenusetting;  ?>
        
    </ul>
</div>
<div class="tab-content pt-4">
    <!-- Menu Header  --> 
    @foreach($menuSetting as $key => $value)
    <div class="tab-pane" id="{{$key}}" role="tabpanel">
        @include($value[2])
    </div>
    <!--End Menu Header  -->
   
    @endforeach
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Pilih icon</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <ul class="listicon">
                    <li data-social="fa-facebook"><i class="fa fa-facebook"></i></li>
                    <li data-social="fa-instagram"><i class="fa fa-instagram"></i></li>
                    <li data-social="fa-whatsapp"><i class="fa fa-whatsapp"></i></li>
                    <li data-social="fa-twitter"><i class="fa fa-google-plus"></i></li>
                    <li data-social="fa-twitter"><i class="fa fa-twitter"></i></li>
                    <li data-social="fa-youtube"><i class="fa fa-youtube"></i></li>
                    <li data-social="fa-yahoo"><i class="fa fa-yahoo"></i></li>
                    <li data-social="fa-wechat"><i class="fa fa-wechat"></i></li>
                    <li data-social="fa-pinterest"><i class="fa fa-pinterest"></i></li>
                    <li data-social="fa-telegram"><i class="fa fa-telegram"></i></li>
                    <li data-social="fa-tripadvisor"><i class="fa fa-tripadvisor"></i></li>
                    <li data-social="fa-twitch"><i class="fa fa-twitch"></i></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <script src="{{ asset('style_admin/plugins/nestable/jquery.nestable.js') }}"></script>
    <script type="text/javascript">
        //jQuery.noConflict();


        function myFunction(link) {
        var r = confirm("Yakin Akan Menghapus Data!");
        if (r == true) {
           window.location.replace(link);
         } 
       
        }
        $('.cekicon').click(function(e){    
            e.preventDefault();
            $('#myModal').modal('show');

            $('.listicon li').click(function(e){    
            e.preventDefault();
           var dataicon=$(this).data('social');
           $('input[name=icon_social]').val(dataicon);
            $('#myModal').modal('hide');

            });
        });


        $('.nav-link').click(function(e){
        var id=$(this).attr('href');
        console.log(id);
        window.history.replaceState(null, null,id);
        e.preventDefault();
        });
        //active show
        var tab =window.location.href;
        tab=tab.split('#')[1];
        if(tab!=undefined)
        {
        $('.tab-pane').remove('active show');
        $('.nav-link').remove('active show');
        $('#'+tab).addClass('active show');
        $('.'+tab).addClass('active');

        }
        else
        {
        $('#menuheader').addClass('active show');
        $('.menuheader').addClass('active');

        }



        $(document).ready(function(){ 

            var updateOutput = function(e){
            
                var jasonData = window.JSON.stringify($('#nestable_list_1').nestable('serialize'));
                var token=window.Laravel.csrfToken;
                $.ajax({
                    
                    type: 'POST',
                    url: '{{route('updatehome')}}',
                    data: {menu:jasonData,_token:token},
                    //dataType: 'json',
                    success: function(data){
                        
                        $('#data-menu-output').html(data);
                    }
                });
            };  
            $('#nestable_list_1').nestable().on('change', updateOutput);



        });
    </script>
@endsection
