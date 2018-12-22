
<?php 
$menu_sidebar=array(
            1=>['Dashboards','home','mdi-speedometer',0],
            2=>['Setting','menuhome','mdi mdi-message',0],
  
  
);
$listside_bar='';
foreach ($menu_sidebar as $key => $val) {
    if($val[3]==0)
    {
            $arrow=cekparrent($key,$menu_sidebar)[0]==true?'<span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>':'';
            $listside_bar .='<li><a href="'.route($val[1]).'"><i class="mdi '.$val[2].'"></i><span>'.$val[0].'</span>'.$arrow.'</a>'.cekparrent($key,$menu_sidebar)[1].'<li>';
    }
}

function cekparrent($key,$menu_sidebar){
                $jumlh=[];
                $sub=false;
                foreach ($menu_sidebar as $key_perent => $val) {
                    if($val[3]==$key)
                        {
                        
                            $jumlh[$key_perent]=$val;
                            $sub=true;

                        }
                }
                $li =count($jumlh)!=0?'<ul class="nav-second-level" aria-expanded="false">':'';
                foreach ($menu_sidebar as $key_perent => $val) 
                    {
                            if($val[3]==$key)
                            {
                                $arrow=cekparrent($key_perent,$menu_sidebar)[0]==true?'<span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>':'';
                                $li .='<li><a href="'.route($val[1]).'"><i class="mdi '.$val[2].'"></i><span>'.$val[0].'</span>'.$arrow.'</a>'.cekparrent($key_perent,$menu_sidebar)[1].'<li>';
                            }           
                    }
                $li .=count($jumlh)!=0?'</ul>':'';

                return array($sub,$li) ;
        }
 ?>





        <!-- Left Sidenav -->
        <div class="left-sidenav"> 
            <ul class="metismenu left-sidenav-menu" id="side-nav">
                <li class="menu-title">Main</li>
                <?php echo $listside_bar ; ?>  
            </ul>
        </div>
        <!-- end left-sidenav-->