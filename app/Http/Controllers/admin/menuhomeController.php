<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class menuhomeController extends Controller
{
    //

     public function menuhome(Request $request)
    {

    $menuSetting =array(
    'menuheader'=>['Menu Header','fa fa-cog mr-2','admin.menuhome.menu'],
    'socialmedia'=>['Social Media','mdi mdi-keyboard-variant mr-2','admin.menuhome.socialmedia'],
    'slidermenu'=>['Slider','mdi mdi-keyboard-variant mr-2','admin.menuhome.slider'],
    'temamenu'=>['Tema','mdi mdi-keyboard-variant mr-2','admin.menuhome.tema'],
    'posttema'=>['Post','mdi mdi-keyboard-variant mr-2','admin.menuhome.post'],
    'setting'=>['Setting','mdi mdi-keyboard-variant mr-2','admin.menuhome.setting']);
		$datamenu=DB::table('menu')->orderBy('order')->get();
		$menu_publis=[];
		foreach ($datamenu as $key) {
		$menu_publis[$key->id_menu]	=unserialize($key->atribut);
		
		}
		$datasocial=DB::table('socialmedia')->get();
		$temafront=DB::table('temafront')->get();
        $slider=DB::table('slider')->get();

        return view('admin.menuhome.menuhome',compact('menu_publis','datasocial','temafront','slider','menuSetting'));
    }
    
    public function simpanmenuhome(Request $request)
    {
		
    	@$id=DB::table('menu')->insertGetId(array('order'=>0,'atribut'=>''),'id_menu');
    	$name=!empty($request->input('namemenu'))?$request->input('namemenu'):'';
    	$slug=!empty($request->input('slug'))?$request->input('slug'):'';
    	
    	$data=array('atribut'=>serialize([$name,$slug,0]));
    	DB::table('menu')->where('id_menu',$id)->update($data);
	 	return redirect('admin/menu-home#menuheader');

    	//print_r($request->input('menu'));
    }

    public function perernt($arrMenu,$parent=0)
    {
        $i=0;
		foreach($arrMenu as $n=>$v){

				$menupage=DB::table('menu')->where('id_menu',$v->id)->get();
				$home=unserialize($menupage[0]->atribut);
			
				$data=array('order'=>$i,'atribut'=>serialize([$home[0],$home[1],$parent]));
				DB::table('menu')->where('id_menu',$menupage[0]->id_menu)->update($data);
				
				if(isset($v->children))
				{
					$this->perernt($v->children,$v->id);
				}
				$i++;
		}	

    }

    public function updatehome(Request $request)
    {
		$menu =json_decode($request->input('menu'));
		//print_r($menu );
  		$this->perernt($menu);

    }
     public function hapusmenu(Request $request, $id)
    {
    	DB::table('menu')->where('id_menu',$id)->delete();
		return redirect('admin/menu-home#menuheader');
    }


    public function simpansocialmedia(Request $request)
    {	$alert ='';
    	$alert .=!empty($request->input('name_somed'))?$request->input('name_somed'):'';
    	$alert .=!empty($request->input('icon_social'))?$request->input('icon_social'):'';
    	$alert .=!empty($request->input('linksocial'))?$request->input('linksocial'):'';
			if($alert!='')
			{
				DB::table('socialmedia')->insert(array('name_somed'=>$request->input('name_somed'),'icon_social'=>$request->input('icon_social'),'linksocial'=>$request->input('linksocial')));

			}
			else
			{
				Session::flash('pesan','<div class="alert alert-danger">data belum lengkap</div>');
			}

   		return redirect('admin/menu-home#socialmedia');

    	//print_r($request->input('menu'));
    }

    public function hapussosmed(Request $request, $id)
	    {
	    	DB::table('socialmedia')->where('id_social',$id)->delete();
			return redirect('admin/menu-home#socialmedia');
	    }

    public function simpanTema(Request $request)
	    {
	 		$data_user=[];
            $alert 	='';
            $type 	='alert-danger';
            $alert .=$request->input('namatema')==''?'<li>Please fill out this  namatema</li>':'';
            $alert .=$request->input('urltema')==''?'<li>Please fill out this urltema</li>':'';
          
           
            if($alert=='')
            {
                $data_user = array(
                            'url_path'      =>  $request->input('urltema'),
                            'judul'         =>  $request->input('namatema'));
                            
                     if (!empty($request->file('file'))) {

                        $file                    = $request->file('file');
                        $dt                      = Carbon::now();
                        $acak                    = $file->getClientOriginalExtension();
                        $filename                = rand(1111,9999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
                        $request->file('file')->move("images/tema", $filename);
                        $data_user['gambar']     = $filename;
                    }

                    DB::table('temafront')->insert($data_user);
	                $type='alert-success';
	                $alert ='<li>Updating Success</li>';

            }
                Session::flash('pesantema','<div class="alert '.$type.' alert-dismissible fade show d-flex align-items-center mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><ul>'.$alert.'</ul></div>');
                return redirect("admin/menu-home#temamenu"); 
	    }

    public function UpdateTema(Request $request)
	    {

	    	$temafront=DB::table('temafront')->get();
	    	foreach ($temafront as $key) {
		    	$active=$request->input('active')==$key->id_tema?1:null;
		    	$data =array('active'=>$active);
		    	DB::table('temafront')->where('id_tema',$key->id_tema)->update($data);
	    	 }
	    	 return redirect("admin/menu-home#temamenu"); 
	    }
	    
    public function hapustema(Request $request, $id)
	    {
	    	
	    	DB::table('temafront')->where('id_tema',$id)->delete();
			return redirect('admin/menu-home#temamenu');
	    }


    public function simpanpost(Request $request)
        {
            $data_user=[];
            $alert  ='';
            $type   ='alert-danger';
            $alert .=$request->input('id_menus')==''?'<li>Please fill out this page</li>':'';
            $alert .=$request->input('judul')==''?'<li>Please fill out this judul</li>':'';
            $alert .=$request->input('deskirpsi')==''?'<li>Please fill out this deskirpsi</li>':'';
          
          
           
            if($alert=='')
            {
                $data_user = array(
                            'id_menus'      =>  $request->input('id_menus'),
                            'judul'         =>  $request->input('judul'),
                            'deskirpsi'         =>  $request->input('deskirpsi'));
                            
                     if (!empty($request->file('file'))) {

                        $file                    = $request->file('file');
                        $dt                      = Carbon::now();
                        $acak                    = $file->getClientOriginalExtension();
                        $filename                = rand(1111,9999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
                        $request->file('file')->move("images/post", $filename);
                        $data_user['image']     = $filename;
                    }
                    
                    if(!empty($request->input('id_post')))
                    {
                        DB::table('posts')->where('id_post',$request->input('id_post'))->update($data_user);
                    }
                    else
                    {
                         DB::table('posts')->insert($data_user);
                    }
                    
                    $type='alert-success';
                    $alert ='<li>Updating Success</li>';

            }
                Session::flash('pesanpost','<div class="alert '.$type.' alert-dismissible fade show d-flex align-items-center mb-3" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><ul>'.$alert.'</ul></div>');
                return redirect("admin/menu-home#posttema"); 
  
        }
        
    public function hapuspost(Request $request, $id)
        {
            
            DB::table('posts')->where('id_post',$id)->delete();
            return redirect('admin/menu-home#posttema');
        }
 public function showeditpost(Request $request)
        {
            $page=DB::table('posts')->where('id_post','=',$request->get('id'))->get();
            echo json_encode(array('dataedit'=>$page[0]));
        }
public function simpanslider(Request $request)
        {
             $error=true;

             $data= array(
                            'judul'       =>  $request->input('judul'),
                            'order'       =>  $request->input('order'),
                            'link'        =>  $request->input('link'),
                            'description' =>  $request->input('description'));
                            
         
                        $file                    = $request->file('file');
                        $dt                      = Carbon::now();
                        $acak                    = $file->getClientOriginalExtension();
                        $filename                = rand(1111,9999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
                        $request->file('file')->move("images/slider", $filename);
                        $data['images_slider']     = $filename;
                        $id=DB::table('slider')->insertGetId($data,'id_slider');

                        if($id)
                        {
                            $error=false;
                        }
                         print json_encode(array('error'=>$error));
                    
        }
public function updateslider(Request $request)
        {

            foreach ($request->input('order') as $key => $value) {
              
                DB::table('slider')->where('id_slider','=',$key)->update(['order'=>$value]);

            }
            return redirect('admin/menu-home#slidermenu');
        }
public function hapus_Slider(Request $request, $id)
        {

           
            DB::table('slider')->where('id_slider',$id)->delete();
            return redirect('admin/menu-home#slidermenu');
        }

        

}
