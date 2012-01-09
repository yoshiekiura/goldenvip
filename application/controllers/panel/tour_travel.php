<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tour_travel
 *
 * @author aceng nursamsudin
 */
class Tour_travel extends CI_Controller{
    //put your code here
    public function index()
    {
        is_admin();
        $this->member_profit();
    }
    function member_profit()
    {
        is_admin();
        $data['data'] = getAccountMLM(); 
        $this->load->view('panel/page/tour_travel/member_profit',$data); 
    }
    function vip_rate()
    {
        is_admin();
        $sql = "select
                b.uid,
                a.destination,
                b.nama as package,
                c.name as agen,
                b.retail_rate,
                b.gvip_rate
                from
                tx_rwmembermlm_destination a,
                tx_rwagen_vippackage b,
                tx_rwagen_agen c
                where 
                b.destination = a.uid and
                b.agen = c.uid and
                a.hidden = 0";
        $data['data'] = $this->Mix->read_more_rows_by_sql($sql);
        $this->load->view('panel/page/tour_travel/vip_rate',$data); 
    }
    function travel_rate()
    {
        is_admin();
        $sql = "select
                b.uid,
                a.destination,
                b.nama as package,
                c.name as agen,
                b.retail_rate,
                b.gvip_rate
                from
                tx_rwmembermlm_destination a,
                tx_rwagen_travelpackage b,
                tx_rwagen_agen c
                where 
                b.destination = a.uid and
                b.agen = c.uid and
                a.hidden = 0";
        $data['data'] = $this->Mix->read_more_rows_by_sql($sql);
        $this->load->view('panel/page/tour_travel/travel_rate',$data); 
    }
    function tour_travel_admin()
    {
        is_admin();
        $data['data'] = getAccountMLM(); 
        $this->load->view('panel/page/distributor/generate_vc',$data); 
    }
    function update_rate()
    {
            $data = array();
            $data['retail_rate'] =  $this->input->post('retail_rate');
            $data['gvip_rate'] = $this->input->post('gvip_rate');

            $tb = '';
            is_admin();
            $cat = $this->input->post('cat');
            if($cat > 2)
            {
                    $tb = 'tx_rwagen_vippackage';
            }
            else
            {
                    $tb = 'tx_rwagen_travelpackage';
            }
            $uid =  $this->input->post('vip');
            $this->Mix->update_record('uid',$uid,$data,$tb);
            echo "Rate has been update";

    }
    
    function select_profit_member()
    {
        is_admin();
        $pack = $this->input->post('package');
        $data = array();
        if($pack == '1')
        {
            $sql = "select 
                a.uid,
                c.time_sch, 
                b.nama as reserved, 
                f.username as member,
                e.destination,
                d.nama as package,
                g.name as travel_agen,
                a.payed as paid
                from
                tx_rwagen_travelbooking a,
                tx_rwagen_travelbookingdetails b,
                tx_rwagen_travelschedule c,
                tx_rwagen_travelpackage d,
                tx_rwmembermlm_destination e,
                tx_rwmembermlm_member f,
                tx_rwagen_agen g
                where
                a.uid_sch = c.uid and
                a.uid_member = f.uid and
                b.pid = a.uid and
                c.package = d.uid and
                d.agen = g.uid and
                d.destination = e.uid and
                a.hidden = 0 and
                a.payed = 0
                group by a.uid
                order by a.uid asc";
            $data['profit_member'] = $this->Mix->read_more_rows_by_sql($sql);
        }
        else if($pack == '2')
        {
            $sql = "select 
                a.uid,
                c.time_sch, 
                b.nama as reserved, 
                f.username as member,
                e.destination,
                d.nama as package,
                g.name as travel_agen,
                a.payed as paid
                from
                tx_rwagen_vipbooking a,
                tx_rwagen_vipbookingdetails b,
                tx_rwagen_vipschedule c,
                tx_rwagen_vippackage d,
                tx_rwmembermlm_destination e,
                tx_rwmembermlm_member f,
                tx_rwagen_agen g
                where
                a.uid_sch = c.uid and
                a.uid_member = f.uid and
                b.pid = a.uid and
                c.package = d.uid and
                d.agen = g.uid and
                d.destination = e.uid and
                a.hidden = 0 and
                a.payed = 0
                group by a.uid
                order by a.uid asc";
            $data['profit_member'] = $this->Mix->read_more_rows_by_sql($sql);
        }
        else
        {
            $data['profit_member'] = array("");
        }
        $data['p'] = $pack;
        $this->load->view('panel/page/tour_travel/view_profit',$data);
    }
        
    function paid_booking()
    {
        is_admin();
        $uid = $_GET['uid'];
        $p = $_GET['p'];
        $data['hidden'] = '1';
        $tb = '';
        if($p==1)
        {
            $tb = 'tx_rwagen_travelbooking';
        }
        else
        {
            $tb = 'tx_rwagen_vipbooking';
        }
        $this->Mix->update_record('uid',$uid,$data,$tb);
        echo "
                <script type='text/javascript'>
                    jQuery(function(){
                        jQuery('#info-saving').addClass('update-nag');
                        jQuery('.paid-$p$uid').text('Paid');
                        jQuery('.hide-$p$uid').hide();
                    });
                </script>
            ";
        echo "Data has been update form unpaid to paid.";
    }
    
    function tour_destination()
    {
        $limit = $_GET['per_page'];
        if($limit==0):
            $limit = 10;
        else:
            $limit=$limit+10;
        endif;
        $sql = "select 
                a.uid,
                a.pid,
                a.hidden,
                a.destination,
                b.package
                from
                tx_rwmembermlm_destination a,
                tx_rwmembermlm_package b
                where 
                a.pid <> 0 and
                a.pid = b.uid
                order by b.package, a.destination limit 0,$limit";
        $data['d_destination'] = $this->Mix->read_more_rows_by_sql($sql);
        
        $this->load->library('pagination');
        $sql2 = "select 
                a.pid,
                a.hidden,
                a.destination,
                b.package
                from
                tx_rwmembermlm_destination a,
                tx_rwmembermlm_package b
                where 
                a.pid <> 0 and
                a.pid = b.uid";
        
        $jumlah_data = $this->Mix->read_more_rows_by_sql($sql2);
        $total_rows = count($jumlah_data);
        $per_page = 10;
        $num_links = $total_rows / $per_page;
        $config['base_url']= site_url('_admin/tour_travel/destination/?page');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['num_links'] = $num_links;
        $config['full_tag_open'] = "<div id='pagination'>";
        $config['full_tag_close'] = "</div>";
        $config['page_query_string'] = TRUE;
        
        $this->pagination->initialize($config);
        $data['limit'] = $limit;
       $this->load->view('panel/page/tour_travel/tour_destination',$data);
    }
    
//    prosesing data
    function add_new_data_travel($edit = array())
    {
        $data['destination'] = '';
        $data['pid'] ='';
        $data['uid'] = 'new';
        if(!empty ($edit)):
//            debug_data($edit);
            $data['destination'] = $edit['destination'];
            $data['pid'] = $edit['pid'];
            $data['uid'] = $edit['uid'];
        endif;
        $sql = "select 
                a.pid as uid,
                a.hidden,
                a.destination,
                b.package
                from
                tx_rwmembermlm_destination a,
                tx_rwmembermlm_package b
                where 
                a.pid <> 0 and
                a.pid = b.uid
                group by a.pid";
        //$data['package'] = array('');
        $data['package']=$this->Mix->read_rows_by_sql_to_dropdown($sql,'package');
        $this->load->vars($data);
        $this->load->view('panel/page/tour_travel/add_new_data_travel');
    }
    
    function saving_new_destination()
    {
        is_admin();
        $destination = $this->input->post('destination');
        $sql = "select * from tx_rwmembermlm_destination where destination like '%$destination%' ";
        $cek = $this->Mix->read_rows_by_sql($sql);
//        debug_data($cek);
        if(!empty($cek)):
            echo "Destination Already Exixts";
        else:
            $data['destination'] = $destination;
            $data['pid'] = $this->input->post('package');
//            debug_data($data);
            $this->Mix->add_with_array($data,'tx_rwmembermlm_destination');
            echo "Data has been save";
        endif;
    }
    
    function update_destination()
    {
        is_admin();
        $val = $this->input->post('read_data');
        $data['destination'] =  $this->input->post('destination');
        $data['pid'] = $this->input->post('package');
//        debug_data($data);
        $this->Mix->update_record('uid',$val,$data,"tx_rwmembermlm_destination");
        
        echo "Data has been update";
       
    }
    
    function browse_data()
    {
       is_admin();
       $act = $_GET['act'];
       switch ($act):
           case "edit-destination":
               $this->edit_destination();
               break;
           case "status":
               $this->hide_data_destination();
               break;
       endswitch;
    }
    
    function edit_destination()
    {
        is_admin();
        $uid = $_GET['uid'];
        $sql = "select 
                a.uid,
                a.pid,
                a.hidden,
                a.destination,
                b.package
                from
                tx_rwmembermlm_destination a,
                tx_rwmembermlm_package b
                where 
                a.pid <> 0 and
                a.pid = b.uid and
                a.uid = $uid";
        $data = $this->Mix->read_rows_by_sql($sql);
        $this->add_new_data_travel($data);
    }
    function hide_data_destination()
    {
        is_admin();
        $uid = $_GET['uid'];
        $d = $this->Mix->read_row_ret_field_by_value('tx_rwmembermlm_destination','hidden',$uid,'uid');
        if($d['hidden']==0):
            $data['hidden'] = '1';
            $this->Mix->update_record('uid',$uid,$data,'tx_rwmembermlm_destination');
            echo "<script type='text/javascript'>
                    jQuery(function(){
                        jQuery('#browsedestination$uid').hide();
                        jQuery('#hide$uid').removeClass('lampunyala');
                        jQuery('#hide$uid').addClass('lampumati');
                    });
                  </script>";
        else:
            $data['hidden'] = '0';
            $this->Mix->update_record('uid',$uid,$data,'tx_rwmembermlm_destination');
            echo "<script type='text/javascript'>
                jQuery(function(){
                    jQuery('#browsedestination$uid').show();
                    jQuery('#hide$uid').removeClass('lampumati');
                    jQuery('#hide$uid').addClass('lampunyala');
                });
              </script>";
        endif;
        
        
    }
}

?>
