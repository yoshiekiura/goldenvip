<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {

	/**
	 * 	Index Page for this controller.
	 *
	 *	contact : archievenolgede@ymail.com
	 *	15/10/2011
	 */
	function index()
	{
		$this->homepage();
	}
	function homepage()	# home uri
	{
		$uri = $this->uri->segment('2');
		if($uri=='post_data')
		{
			$url = $this->uri->segment('3');
			$this->post_data($url);
		}
		else
		{
			$data['title']="Golden VIP : Home";
			$data['page'] = "home-page";
			$data['nav'] = "home";
			$data['template']=base_url()."asset/theme/mygoldenvip/"; 
			
			$this->load->vars($data);
			$this->load->view('public/old/template');
		}
	}
	
	function about()
	{
		$data['title']="Golden VIP : The GVIP Story";
		$data['page'] = "the-gvip-story";
		$data['nav'] = "about";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$this->load->vars($data);
		$this->load->view('public/old/template');
	}
	
	function vision_and_mission()
	{
		$data['title']="Golden VIP : Vision and Mission";
		$data['page'] = "vision-mission";
		$data['nav'] = "about";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$this->load->vars($data);
		$this->load->view('public/old/template');
	}
	
	function corporate_overview()
	{
		$data['title']="Golden VIP : Corporate Overview";
		$data['page'] = "corporate-overview";
		$data['nav'] = "about";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$this->load->vars($data);
		$this->load->view('public/old/template');
	}
	
	function why_gvip()
	{
		$data['title']="Golden VIP : Why GVIP";
		$data['page'] = "why-gvip";
		$data['nav'] = "about";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$this->load->vars($data);
		$this->load->view('public/old/template');
	}
	
	function business()
	{
		$data['title']="Golden VIP : Business";
		$data['page'] = "business";
		$data['nav'] = "products";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$this->load->vars($data);
		$this->load->view('public/old/template');
	}
	
	function travel()
	{
		$data['title']="Golden VIP : Travel";
		$data['page'] = "travel";
		$data['nav'] = "products";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$this->load->vars($data);
		$this->load->view('public/old/template');
	}
	
	function vip()
	{
		$data['title']="Golden VIP : VIP";
		$data['page'] = "vip";
		$data['nav'] = "products";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$this->load->vars($data);
		$this->load->view('public/old/template');
	}
	
	function participant_hotels()
	{
		$data['title']="Golden VIP : Participant Hotels";
		$data['page'] = "participant-hotel";
		$data['nav'] = "products";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$this->load->vars($data);
		$this->load->view('public/old/template');
	}
	
	function news()
	{
		$data['title']="Golden VIP : News ";
		$data['page'] = "news";
		$data['nav'] = "news";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$this->load->vars($data);
		$this->load->view('public/old/template');
	}
	function faq()
	{
		$data['title']="Golden VIP : FAQ ";
		$data['page'] = "news";
		$data['nav'] = "faq";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$this->load->vars($data);
		$this->load->view('public/old/template');
	}
	function contact()
	{
		$data['title']="Golden VIP : Contact Us ";
		$data['page'] = "news";
		$data['nav'] = "contact";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$this->load->vars($data);
		$this->load->view('public/old/template');
	}
	
	function post_data($data) # fungsi untuk redirect url path
	{
		switch($data)
		{
			case "del_dist": # site_url/segment_2/del_dist/segment_4
				$this->del_dist();
				break;
			case "get_member";
				$this->get_member();
				break;
			case "get_detail_member":
				$this->get_detail_member();
				break;
			case "get_phone_code":
				$this->get_phone_code();
				break;
			case "get_province":
				$this->get_province();
				break;
			case "get_city":
				$this->get_city();
				break;
			case "get_regional":
				$this->get_regional();
				break;
			case "search_distributor":
				$this->search_distributor();
				break;
			case "get_vc_by_dist":
				$this->get_vc_by_dist();
				break;
			case "get_distributor":
				$this->get_distributor();
				break;
			case "get_pck2":
				$this->get_pck2();
				break;	
			case "get_pck3":
				$this->get_pck3();
				break;
			case "get_genealogy":
				$this->get_genealogy();
				break;
			case "get_destnation_detail":
				$this->get_destnation_detail();
				break;
			case "list-hotel":
				$this->get_detail_hotel();
				break;
			case "join-now":
				is_member();
				$this->join_now_by_member();
				break;
			case "reservation-vip":
				is_member();
				$this->reservation_vip();
				break;
			case "reservation-travel":
				is_member();
				$this->reservation_travel();
				break;
			case "check-email":
				$this->check_email();
				break;
			case "check-username":
				$this->check_username();
				break;
			case "del-member-request":
				$this->del_member_request();
				break;
			case "browse-member-request":
				$this->browse_member_request();
				break;
			case "hide_member":
				$this->hide_member();
				break;
			case "del-vc":
				$this->del_vc();
				break;
		}
	}
	
	# call action function from site_url/segment_2/segment_3/uri
	function join_now_by_member()
	{
		$data['title']="Member | Home Page";
		$data['page'] = "join_now_by_member";
		$data['nav'] = "homepage";
		$data['country'] = $this->Mix->dropdown_menu('uid','country','tx_rwmembermlm_phonecountrycode');
		$data['bank'] = $this->Mix->dropdown_menu('uid','bank','tx_rwmembermlm_bank');
		$data['package'] = $this->Mix->dropdown_menu('uid','package','tx_rwmembermlm_package');
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$this->load->vars($data);
		$this->load->view('member/template');
	}
	
	function del_dist()
	{
		$uri = $this->uri->segment('4');
		echo "data telah berhasil dihapus";
	}
	function get_member()
	{
		$uid = $this->uri->segment('4');
		$pid = $this->uri->segment('5');
		$data['page'] = getMemberByUid($uid,$pid);
		$data['bank'] = $this->Mix->dropdown_menu('bank','bank','tx_rwmembermlm_bank');
		$data['country'] = $this->Mix->dropdown_menu('uid','country','tx_rwmembermlm_phonecountrycode');
		$data['province'] = $this->Mix->dropdown_menu('uid','province','tx_rwmembermlm_province');
		$data['city'] = $this->Mix->dropdown_menu('uid','city','tx_rwmembermlm_city');
		$data['code'] = $this->Mix->dropdown_menu('uid','code','tx_rwmembermlm_phonecountrycode'); 
		
		$this->load->vars($data);
		$this->load->view('panel/page/distributor/get_member');
	}
	function get_detail_member()
	{
		is_member(); # Hanya member yang boleh memasuki halaman ini
		$data['title']="Member | Home Page";
		$data['page'] = "public/get_detail_member";
		$data['nav'] = "report";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$uid = $this->uri->segment('4');
		$pid = $this->uri->segment('5');
		$data['member'] = getMemberByUid($uid,$pid);; 
		
		$this->load->vars($data);
		$this->load->view('member/template');
	}
	function get_phone_code()
	{
		$url = $this->uri->segment('4');
		$code = $this->Mix->dropdown_menu('uid','code','tx_rwmembermlm_phonecountrycode'); 	
		echo $code[$url];
	}
	function get_province()
	{
		$url = $this->uri->segment('4');
		$province = $this->Mix->read_province($url);
		$id = "id='province' onchange='get_city();'";
		echo form_dropdown('province',$province,'0',$id);
	}
	function get_city()
	{
		$url = $this->uri->segment('4');
		$city = $this->Mix->read_city($url);
		$id = "id='city'";
		echo form_dropdown('city',$city,'1',$id);
		 
	}
	function get_regional()
	{
		$url = $this->uri->segment('4');
		$regional = $this->Mix->read_city($url);
		$id = "id='regional' onchange='regional_change();'";
		echo form_dropdown('regional',$regional,'1',$id); 
	}
	function search_distributor()
	{
		$val = $this->input->post('reg');
		$cat = $this->input->post('cat');
		$sql = "select m.uid, m.pid, m.firstname, m.lastname, m.email, m.username, m.mobilephone, c.city from tx_rwmembermlm_member m, tx_rwmembermlm_city c where c.uid = m.regional and m.usercategory='".$cat."' and m.firstname like '%".$val."%' and m.pid = '67'";
		$data = $this->Mix->read_more_rows_by_sql($sql);
		$i=1;
		if(!empty($data))
		{
			foreach($data as $row)
			{
			echo "
				<tr valign='top'> 
					<td width='7%'>
						$i.
					</td>
					<td class='name-data'>
					   ".$row['firstname'].' '.$row['lastname']."             
					</td>
					<td>
						".$row['email']."
					</td>
					<td>
						".$row['username']."
					</td>
					<td>
						".$row['mobilephone']."
					</td>
					<td>
						".$row['city']."
					</td>
					<td>
					<a href='javascript:void();' onclick='load(\"_admin/post_data/get_member/".$row['uid']."/".$row['pid']."\",\"#site-content\")' class='browse'></a>
					";
					 
					$d = $this->Mix->read_row_ret_field_by_value('tx_rwmembermlm_member','valid',$row['uid'],'uid'); 
					if($d['valid']=='1')
					{
					echo " 
					<a href=\"javascript:void()\" onclick=\"load('_admin/post_data/hide_member/".$row['uid']."/".$row['pid']."','#info-saving');\" class=\"lampunyala\" id=\"hide".$row['uid']."\"></a>";
					 
					}
					else
					{
					 echo "
					<a href=\"javascript:void()\" onclick=\"load('_admin/post_data/hide_member/".$row['uid']."/".$row['pid']."','#info-saving');\" class=\"lampumati\" id=\"hide".$row['uid']."\"></a>";
					}
					
					echo"
					</td>
				</tr>  ";
				$i++;
			} 
		}
		else
		{
			echo "<tr><td colspan='7'>Not Found</td></tr>";
		}
	}
	
	function get_vc_by_dist()
	{
		$url = $this->uri->segment('4');
		$data = get_vc_member($url);
		$this->load->view('panel/page/distributor/dist_vc',$data);
	}
	
	function get_distributor()
	{
		$url = $this->uri->segment('4');
		$distributor = $this->Mix->read_disrtibutor($url);
		$id = "id='distributor' onchange='get_vc()'";
		echo form_dropdown('distributor',$distributor,'1',$id);
	}
	
	function get_pck2()
	{
		$url = $this->uri->segment('4'); 
		$package2 = $this->Mix->dropdown_menu('uid','package','tx_rwmembermlm_package','0',$url);
		$id = "id='package2' onchange='select_package2()'";
		
		echo form_dropdown('package2',$package2,'1',$id);
	}
	
	function get_pck3()
	{
		$url = $this->uri->segment('4'); 
		$package3 = $this->Mix->dropdown_menu('uid','package','tx_rwmembermlm_package','0',$url);
		$id = "id='package3'";
		echo form_dropdown('package3',$package3,'1',$id);
	}
	
	function get_genealogy()
	{
		
		$url = $this->uri->segment('4');
		is_member(); # Hanya member yang boleh memasuki halaman ini
		$data['title']="Member | Home Page";
		$data['page'] = "public/report_genealogy";
		$data['nav'] = "report";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		
		$this->load->vars($data);
		$this->load->view('member/template');
	}
	function get_destnation_detail()
	{
		$uid =  $this->uri->segment('4');
		$destination = $this->Mix->get_destination_detail($uid);
		
		if(!empty($destination))
		{
			
			echo "
				<label class=\"desc\">Area in detail :
				</label>
				";
				echo form_dropdown('destination_detail',$destination,'0');
			echo "
				<div class=\"clr\"></div>
				";
		}
	}
	function get_detail_hotel()
	{
		$url = $this->uri->segment('4');
		is_member(); # Hanya member yang boleh memasuki halaman ini
		$data['title']="Member | Reservation | List Hotel | Hotel";
		$data['page'] = "business/hotel";
		$data['nav'] = "reservation";
		$data['template']=base_url()."asset/theme/mygoldenvip/"; 
		$data['hotel']= $this->Mix->read_row_by_one('uid',$url,'tx_rwadminhotel_hotel');
		$data['room_types'] = $this->Mix->read_rows_by_one('uid_hotel',$url,'tx_rwadminhotel_cat_room');
		$data['hotel_facilities'] = $this->Mix->read_row_by_one('uid_hotel',$url,'tx_rwadminhotel_facilities_hotel');
		$this->load->vars($data);
		$this->load->view('member/template');
	}
	
	function reservation_vip()
	{
		$uid = $this->uri->segment('4');
		$sql = "select a.uid,a.time_sch, a.qty, a.booking, b.nama, c.name as travel, d.destination, b.deskripsi, b.harga as retail_rate
				from tx_rwagen_vipschedule a, 
				tx_rwagen_vippackage b, 
				tx_rwagen_agen c, 
				tx_rwmembermlm_destination d
				
				where a.pid = d.uid and
				a.package = b.uid and
				a.agen = c.uid and
				a.hidden = 0 and
				a.uid = '$uid'
				";
		$sql1 = "select reservation from tx_rwagen_vipbooking where uid_member = '".$this->session->userdata('member')."' and hidden = '1' ";
		
		
		$res = $this->Mix->read_rows_by_sql($sql1);
		$data['reservation'] = $res['reservation'];
		$data['pack'] = $this->Mix->read_more_rows_by_sql($sql);
		$data['title']="Member | Home Page | Reservation | Detail Package";
        $data['page'] = "vip/detail_package";
        $data['nav'] = "reservation";
        
        $this->load->vars($data);
        $this->load->view('member/template');
	}
	function reservation_travel()
	{
		$uid = $this->uri->segment('4');
		$sql = "select a.uid,a.time_sch, a.qty, a.booking, b.nama, c.name as travel, d.destination, b.deskripsi, b.harga as retail_rate
				from tx_rwagen_travelschedule a, 
				tx_rwagen_travelpackage b, 
				tx_rwagen_agen c, 
				tx_rwmembermlm_destination d
				
				where a.pid = d.uid and
				a.package = b.uid and
				a.agen = c.uid and
				a.hidden = 0 and
				a.uid = '$uid'
				";
		$sql1 = "select reservation from tx_rwagen_travelbooking where uid_member = '".$this->session->userdata('member')."' and hidden = '1' ";
		
		
		$res = $this->Mix->read_rows_by_sql($sql1);
		$data['reservation'] = $res['reservation'];
		$data['pack'] = $this->Mix->read_more_rows_by_sql($sql);
		$data['title']="Member | Home Page | Reservation | Detail Package";
        $data['page'] = "travel/detail_package";
        $data['nav'] = "reservation";
        
        $this->load->vars($data);
        $this->load->view('member/template');
	}
	function check_email()
	{
		echo "ok";
	}
	function check_username()
	{
		echo "ok";
	}
	function del_member_request()
	{
		$uid = $this->uri->segment('4');
		$this->Mix->dell_one_by_one('uid',$uid,'tx_rwmembermlm_member');
		$this->session->set_flashdata('info','Member request has been delete');
		redirect('member/list-member-request','refresh');
	}
	function browse_member_request()
	{
		$uid = $this->uri->segment('4');
		$data['reservation'] = $res['reservation'];
		$sql = "select * from tx_rwmembermlm_member where uid = '$uid'";
		$data['mreq'] = $this->Mix->read_rows_by_sql($sql);
		$data['title']="Member | Home Page | Reservation | Detail Package";
        $data['page'] = "public/browse_member_request";
        $data['nav'] = "homepage";
        
        $this->load->vars($data);
        $this->load->view('member/template');
	}
	function hide_member()
	{
		// non-active member GVIP
		$uid = $this->uri->segment('4');
		$pid = $this->uri->segment('5');
		$d = $this->Mix->read_row_ret_field_by_value('tx_rwmembermlm_member','valid',$uid,'uid');
		
		if($d['valid'] == '1')
		{
			$data['valid'] = '0';
			$this->Mix->update_record_by_two('uid',$uid,'pid',$pid,$data,'tx_rwmembermlm_member');
			echo "
				<script type=\"text/javascript\">
					jQuery(function(){
						jQuery('#info-saving').addClass('update-nag');
						jQuery('#hide$uid').removeClass('lampunyala');
						jQuery('#hide$uid').addClass('lampumati');
					});
				</script>
			";
			echo "Account has been Hide, and can't access their privillage page.";
		}
		else
		{
			$data['valid'] = '1';
			$this->Mix->update_record_by_two('uid',$uid,'pid',$pid,$data,'tx_rwmembermlm_member');
			echo "
				<script type=\"text/javascript\">
					jQuery(function(){
						jQuery('#info-saving').addClass('update-nag');
						jQuery('#hide$uid').removeClass('lampumati');
						jQuery('#hide$uid').addClass('lampunyala');
					});
				</script>
			";
			echo "Now account can access their privillage page.";
		}
	}
	function del_vc()
	{
		$uid = $this->uri->segment('4');
		$this->Mix->dell_one_by_one('uid',$uid,'tx_rwmembermlm_vouchercode');
		echo "
				<script type=\"text/javascript\">
					jQuery(function(){
						jQuery('#info-saving').addClass('update-nag');
						jQuery('#hidevc$uid').hide();
					});
				</script>
			";
		echo "Voucher Code has been delete.";
	}
}