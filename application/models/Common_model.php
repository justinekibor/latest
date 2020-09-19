<?php
class Common_model extends CI_Model {

    //-- insert function
	public function insert($data,$table){
        $this->db->insert($table,$data);        
        return $this->db->insert_id();
    }
        function normal_user($id){            
        $this->db->select('*');
        $this->db->from('expert');
        $this->db->where('id',$id); 
        $this->db->limit(1); 
        $query = $this->db->get();   
        
        if($query->num_rows() == 1){                 
           return $query->result();
        }
        else{
            return false;
        }
    }
         function normal_person($id){            
        $this->db->select('*');
        $this->db->from('emailHarvest');
        $this->db->where('email',$id); 
        $this->db->limit(1);
        $query = $this->db->get();   
        
        if($query->num_rows() == 1){                 
           return $query->result();
        }
        else{
            return false;
        }
    } 
       function get_vacated_tenant($id){            
        $this->db->select('*');
        $this->db->from('houses');
        $this->db->where('status',"vacant"); 
        $this->db->where('tenant_id',$id);
        $this->db->limit(1);
        $query = $this->db->get();   
        
        if($query->num_rows() == 1){                 
           return $query->result();
        }
        else{
            return false;
        }
    }
    function normal_vacation($id){            
        $this->db->select('*');
        $this->db->from('vacation');
        $this->db->where('email',$id); 
        $this->db->limit(1);
        $query = $this->db->get();   
        
        if($query->num_rows() == 1){                 
           return $query->result();
        }
        else{
            return false;
        }
    }
      function very_normal_person($id){            
        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('email',$id); 
        $this->db->limit(1);
        $query = $this->db->get();   
        
        if($query->num_rows() == 1){                 
           return $query->result();
        }
        else{
            return false;
        }
    }
          function very_vacating_person($id){            
        $this->db->select('*');
        $this->db->from('vacation');
        $this->db->where('vacation_link',$id); 
        $this->db->limit(1);
        $query = $this->db->get();   
        
        if($query->num_rows() == 1){                 
           return $query->result();
        }
        else{
            return false;
        }
    }
      function normal_vacated($id){            
        $this->db->select('*');
        $this->db->from('vacation');
        $this->db->where('vacation_link',$id); 
        $this->db->limit(1);
        $query = $this->db->get();   
        
        if($query->num_rows() == 1){                 
           return $query->result();
        }
        else{
            return false;
        }
    }

    //-- edit function
    function edit_option($action, $id, $table, $Manipulation){
        $this->db->where($Manipulation, $id);
        $this->db->update($table,$action);
        return;
    } 

    //-- update function
    function update($action, $id, $table){
        $this->db->where('id',$id);
        $this->db->update($table,$action);
        return;
    } 

    //-- delete function
    function delete($id,$table, $Manipulation){
        $this->db->delete($table, array($Manipulation => $id));
        return;
    } 
    //-- select function
    function select($table, $Manipulation){
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by($Manipulation,'ASC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
     function select_options($table, $Manipulation, $check){
        $this->db->select();
        $this->db->from($table);
        $this->db->where($check, 0);
        $this->db->order_by($Manipulation,'ASC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    //-- select by id
    function select_option($id,$table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    } 
        function get_plot_id($id){
        $this->db->select('plot_id');
        $this->db->from('plots');
        $this->db->where('agent_id', $id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    } 

     function select_receipt($id,$table, $Manipulation){
        $this->db->select();
        $this->db->from($table);
        $this->db->where($Manipulation, $id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    } 
    
   
        function get_single_agent_plot($id, $table, $Manipulation){
        $this->db->select('*');
       // $this->db->select('c.name as country_name');
        $this->db->from($table);
       // $this->db->join('country c','c.id = u.country','LEFT');
        $this->db->where($Manipulation,$id);
        $this->db->where($Manipulation, !0);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }

    //-- get single user info
    function get_single_object_info($id,$table, $Manipulation){
        $this->db->select('*');
       // $this->db->select('c.name as country_name');
        $this->db->from($table);
       // $this->db->join('country c','c.id = u.country','LEFT');
        $this->db->where($Manipulation,$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
    function get_single_user_id($id,$table, $Manipulation){
        $this->db->select('*');
       // $this->db->select('c.name as country_name');
        $this->db->from($table);
       // $this->db->join('country c','c.id = u.country','LEFT');
        $this->db->where($Manipulation,$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;

    }
    
    //-- get all 
    function get_all_Agents($table, $Manipulation){
        $this->db->select('p.*');
        $this->db->where('userRole','Agent');
       $this->db->select('c.Fname as Fname, c.agent_id as agent_id, c.phone_no as phone_no, c.plot_id as plot_id, c.id_no as id_no');
       $this->db->from($table.' p');
       $this->db->join('agents c','c.agent_id = p.id','RIGHT');
        $this->db->order_by('p.'.$Manipulation, 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array();  
        return $query;
    }
        function get_all_Tenants($table, $Manipulation, $tenant_id){
        $this->db->select('p.*');
        $this->db->where('assigned_by', $tenant_id);
       $this->db->select('email as email');
       $this->db->from($table.' p');
       $this->db->join('users c','c.id = p.tenant_id','RIGHT');
        $this->db->order_by('p.'.$Manipulation, 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array();  
        return $query;
    }
    function get_profile($id){
        $this->db->select('p.*');
        $this->db->where('id', $id);
       $this->db->from('users'.' p');
        $this->db->order_by('p.'.'id', 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array();  
        return $query;
    }
            function get_notification(){
        $this->db->select('p.*');
        $this->db->where('status', 0);
     $this->db->select('fname as fname');
       $this->db->from('complaints'.' p');
       $this->db->join('tenant c','c.tenant_id = p.tenant_ids','LEFT');
        $this->db->order_by('p.'.'complaint_id', 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array();  
        return $query;
    }
     function get_reply($id){
        $this->db->select('p.*');
         $this->db->select('count(*) as count');
       $this->db->where('viewed', 'No');
        $this->db->where('tenant_id', $id);
       $this->db->select('fname as fname,tenant_id as tenant_id, complaint as complaint, complaint_id as complaint_id');
       $this->db->from('complaintReply'.' p');
        $this->db->join('complaints r','p.complaint_ids = r.complaint_id','LEFT');
       $this->db->join('tenant c','c.tenant_id = r.tenant_ids','LEFT');
        $this->db->order_by('p.'.'complaint_ids', 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array();  
        return $query;
    }
     function get_conversation($id){
        $this->db->select('p.*');
        $this->db->where('complaint_ids', $id);
       $this->db->select('complaint_ids as id');
       $this->db->from('complaintReply'.' p');
       $this->db->join('complaints c','p.complaint_ids = c.complaint_id','LEFT');
        $this->db->order_by('p.'.'complaint_ids', 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array();  
        return $query;
    }
         function get_complaint($id){
        $this->db->select('');
        $this->db->from('complaints');
        $this->db->where('complaint_id', $id);
         $this->db->order_by('complaint_id', 'DESC');
        $query = $this->db->get();          
        $query = $query->result_array();  
        return $query;
    }
            function get_all_Plot_houses($table, $Manipulation, $agent_id){
        $this->db->select('p.*');
        $this->db->where('agent_id',$agent_id);
        $this->db->where('tenant_id',0);
        $this->db->where('billed',"Yes");
       $this->db->select('agent_id as agent_id');
       $this->db->from($table.' p');
       $this->db->join('agents c','c.plot_id = p.plot_id','RIGHT');
        $this->db->order_by('p.'.$Manipulation, 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array();  
        return $query;
    }
       function get_room_plot($id, $table, $Manipulation){
        $this->db->select('p.*');
        $this->db->where('house_id',$id);
       $this->db->select('c.plot_name as plot_name');
       $this->db->from($table.' p');
       $this->db->join('plots c','c.plot_id = p.plot_id','LEFT');
        $this->db->order_by('p.'.$Manipulation, 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array(); 
        return $query;
    }
    function get_rooms_plot($id){
        $this->db->select('p.*');
        $this->db->where('a.agent_id',$id);
       $this->db->select('c.plot_name as plot_name,p.plot_id as plot_id,');
       $this->db->from('houses'.' p');
       $this->db->join('plots c','c.plot_id = p.plot_id','LEFT');
       $this->db->join('agents a','a.agent_id = c.agent_id','LEFT');
        $this->db->order_by('p.house_id', 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array(); 
        return $query;
    }
    function get_all_Plot_tenants($id){
        $this->db->select('p.*');
        $this->db->where('a.agent_id',$id);
       $this->db->select('c.tenant_id as tenant_id,c.plot_id as plot_id,');
       $this->db->from('tenant'.' p');
       $this->db->join('houses c','c.tenant_id = p.tenant_id','LEFT');
       $this->db->join('plots a','a.plot_id= c.plot_id','LEFT');
        $this->db->order_by('p.tenant_id', 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array(); 
        return $query;
    }
        function get_all_objects($table, $Manipulation){
        $this->db->select('p.*');
       // $this->db->select('c.name as country, c.id as country_id');
        $this->db->from($table.' p');
       // $this->db->join('country c','c.id = u.country','LEFT');
        $this->db->order_by('p.'.$Manipulation, 'DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    function get_all_house_payment($id){
        $this->db->select('p.*');
        $this->db->from('payments'.' p');
        $this->db->where('tenant_id',$id);
       $this->db->order_by('p.'.'payment_id', 'DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
     function get_room_objects($table, $Manipulation, $id){
        $this->db->select('p.*');
       $this->db->select('c.agent_id as agent_id, b.plot_id as plot_id');
       $this->db->where('c.agent_id',$id);
        $this->db->from($table.' p');
        $this->db->join('plots b','b.plot_id = p.plot_id','LEFT');
        $this->db->join('agents c','c.plot_id = p.plot_id','LEFT');
        $this->db->order_by('p.'.$Manipulation, 'DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    function get_agent_plot(){

    }

    function get_tenant_total(){
         $this->db->select('count(*) as total');
        $this->db->from('tenant');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }

    function get_unit_total(){
         $this->db->select('count(*) as total');
        $this->db->from('houses');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
        function get_plot_total(){
         $this->db->select('count(*) as total');
        $this->db->from('plots');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }

    function get_agent_total(){
         $this->db->select('count(*) as total');
        $this->db->from('agents');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
        function get_rent_total(){
         $this->db->select('sum(Rent) as total');
        $this->db->from('balances');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
      function get_deposit_total(){
         $this->db->select('sum(deposit) as total');
        $this->db->from('balances');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
            function get_rentp_total(){
         $this->db->select('sum(Rent) as total');
        $this->db->from('payments');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
      function get_depositp_total(){
         $this->db->select('sum(deposit) as total');
        $this->db->from('payments');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
         function get_collection_total(){
         $this->db->select('sum(deposit) + sum(Rent) + sum(others) + sum(garbage) + sum(water) + sum(kplc) as total');
        $this->db->from('payments');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
  
   
    function get_houses($plot_id){
        $bill = "No";
        $query = $this->db->get_where('houses', array('plot_id'=>$plot_id, 'billed'=>$bill));
        return $query;
    }
    function get_houses_bill($plot_id){
         $this->db->select('p.*');
        $this->db->where('plot_id',$plot_id);
        $this->db->where('billed','Yes');
       $this->db->select('b.tenant_id as tenant_id');
       $this->db->from('houses p');
       $this->db->join('balances b','b.tenant_id = p.tenant_id','RIGHT');
        $this->db->order_by('p.house_id', 'DESC');
        $query = $this->db->get();         
        return $query;
    }
        function get_billing_tenant($id){
         $this->db->select('p.*');
        $this->db->where('p.tenant_id',$id);
       $this->db->select('b.tenant_id as tenant_id, b.auto_kplc as auto_kplc, b.auto_water as auto_water, n.water as water,n.garbage as garbage,n.kplc as kplc, n.others as others,');
       $this->db->from('tenant p');
       $this->db->join('houses b','b.tenant_id = p.tenant_id','RIGHT');
       $this->db->join('balances n','n.tenant_id = p.tenant_id','RIGHT');
        $this->db->order_by('p.tenant_id', 'DESC');
        $query = $this->db->get();         
        return $query;
    }
    function get_all_plot_bills($id){
         $this->db->select('p.*');
        $this->db->where('n.agent_id',$id);
       $this->db->select('b.tenant_id as tenant_id, n.agent_id as agent_id,b.house_name as house_name');
       $this->db->from('balances p');
       $this->db->join('houses b','b.tenant_id = p.tenant_id','LEFT');
       $this->db->join('agents n','n.plot_id = b.plot_id','LEFT');
        $this->db->order_by('p.balance_id', 'DESC');
        $query = $this->db->get();  
         $query = $query->result_array();        
        return $query;

    }
        function get_all_plot_expenses($id){
         $this->db->select('p.*');
        $this->db->where('underWho',$id);
        $this->db->from('expenses p');
        $this->db->order_by('p.expense_id', 'DESC');
        $query = $this->db->get();  
         $query = $query->result_array();        
        return $query;

    }
        function get_all_plot_payment($id){
         $this->db->select('p.*');
        $this->db->where('n.agent_id',$id);
       $this->db->select('b.tenant_id as tenant_id, n.agent_id as agent_id,b.house_name as house_name');
       $this->db->from('payments p');
       $this->db->join('houses b','b.tenant_id = p.tenant_id','LEFT');
       $this->db->join('agents n','n.plot_id = b.plot_id','LEFT');
        $this->db->order_by('p.payment_id', 'DESC');
        $query = $this->db->get();  
         $query = $query->result_array();        
        return $query;

    }

        function get_all_plot_pending_payment($id){
         $this->db->select('p.*');
        $this->db->where('n.agent_id',$id);
       $this->db->select('b.tenant_id as tenant_id, n.agent_id as agent_id,b.house_name as house_name');
       $this->db->from('balances p');
       $this->db->join('houses b','b.tenant_id = p.tenant_id','LEFT');
       $this->db->join('agents n','n.plot_id = b.plot_id','LEFT');
        $this->db->order_by('p.balance_id', 'DESC');
        $query = $this->db->get();  
         $query = $query->result_array();        
        return $query;

    }
       function get_bills($house_id){
        $query = $this->db->get_where('bills', array('house_id'=>$house_id));
        return $query;
    }
        function get_house_details($house_id){
        $query = $this->db->get_where('houses', array('house_id'=>$house_id));
        return $query;
    }
    function get_tenant_details($house_id){
        $query = $this->db->get_where('tenant', array('house_id'=>$house_id));
        return $query;
    }
        function get_tenant_balances($house_id){
        $this->db->select('p.*');
        $this->db->where('house_id',$house_id);
       $this->db->select('lname as lname, fname as fname');
       $this->db->from('balances p');
       $this->db->join('tenant c','c.tenant_id = p.tenant_id','LEFT');
        $this->db->order_by('p.balance_id', 'DESC');
        $query = $this->db->get();         
        
        return $query;
    }
            function get_vacating_balances($house_id){
        $this->db->select('p.*');
        $this->db->where('p.tenant_id',$house_id);
       $this->db->select('lname as lname, fname as fname, b.deposit as depofixed, v.vacation_date as vacation_date');
       $this->db->from('balances p');
       $this->db->join('tenant c','c.tenant_id = p.tenant_id','LEFT');
       $this->db->join('bills b','b.house_id = c.house_id','LEFT');
       $this->db->join('vacation v','c.tenant_id = v.tenant_id','LEFT');
        $this->db->order_by('p.balance_id', 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array(); 
        return $query;
    }
    function get_user_total(){
        $this->db->select('*');
        $this->db->select('count(*) as total');
        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.status = 1)
                            )
                            AS active_user',TRUE);

        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.status = 0)
                            )
                            AS inactive_user',TRUE);

        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.role = "admin")
                            )
                            AS admin',TRUE);

        $this->db->from('user');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
     function get_all_messages($id, $table, $Manipulation){
        $this->db->select('p.*');
        $this->db->where('tenant_id',$id);
       $this->db->select('fname as fname');
       $this->db->from($table.' p');
       $this->db->join('tenant c','c.tenant_id = p.tenant_ids','LEFT');
        $this->db->order_by('p.'.$Manipulation, 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array(); 
        return $query;
    }
    function get_user($id){
        $this->db->select();
        $this->db->from('tenant');
        $this->db->where('tenant_id', $id);
        $this->db->order_by('tenant_id','ASC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
   function get_all_vacant_rooms(){
    $this->db->select('p.*');
        $this->db->where('status','vacant');
      //  $this->db->where('rent',0);
         $this->db->select('c.plot_name as plot_name,c.plot_code as plot_code, r.Rent as rent');
      $this->db->from('houses p');
       $this->db->join('plots c','c.plot_id = p.plot_id','LEFT');
       $this->db->join('bills r','r.house_id = p.house_id','RIGHT');
        $this->db->order_by('p.vacation_date', 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array(); 
        return $query;

   }
      function get_single_vacant($id){
    $this->db->select('p.*');
        $this->db->where('p.house_id',$id);
         $this->db->select('c.plot_name as plot_name,c.plot_code as plot_code, r.Rent as rent, a.phone_no as phone_no');
      $this->db->from('houses p');
       $this->db->join('plots c','c.plot_id = p.plot_id','LEFT');
       $this->db->join('bills r','r.house_id = p.house_id','LEFT');
        $this->db->join('agents a','a.plot_id = p.plot_id','LEFT');
        $this->db->order_by('p.vacation_date', 'DESC');
         $query = $this->db->get();
        $query = $query->row();  
        return $query;
   }
        function get_all_testimonies($id, $table, $Manipulation){
        $this->db->select('p.*');
        $this->db->where('p.tenant_id',$id);
       $this->db->select('fname as fname');
       $this->db->from($table.' p');
       $this->db->join('tenant c','c.tenant_id = p.tenant_id','LEFT');
        $this->db->order_by('p.'.$Manipulation, 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array(); 
        return $query;
    }
function get_all_testimonies_admin($id, $table, $Manipulation){
        $this->db->select('p.*');
       $this->db->select('fname as fname');
       $this->db->from($table.' p');
       $this->db->join('tenant c','c.tenant_id = p.tenant_id','LEFT');
        $this->db->order_by('p.'.$Manipulation, 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array(); 
        return $query;
    }
    function get_all_happy_clients(){
        $this->db->select('p.*');
        $this->db->where('status',"Approved");
       $this->db->select('fname as fname, lname as lname, a.image as image');
       $this->db->from('testimonials p');
       $this->db->join('tenant c','c.tenant_id = p.tenant_id','LEFT');
        $this->db->join('users a','a.id = p.tenant_id','LEFT');
        $this->db->order_by('p.testimonial_id', 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array(); 
        return $query;
    }
    function get_all_pendings(){
        $this->db->select('p.*');
        $this->db->where('status',!"vacant");
       $this->db->select('fname as fname, lname as lname, a.tenant_id as tid, a.house_id as hid, c.Rent as rent, c.deposit as deposit, c.balance_id as balance_id, plot_name as plot_name');
       $this->db->from('houses p');
       $this->db->join('balances c','c.tenant_id = p.tenant_id','RIGHT');
        $this->db->join('tenant a','a.tenant_id = p.tenant_id','LEFT');
        $this->db->join('plots pl','pl.plot_id = p.plot_id','LEFT');
        $this->db->order_by('p.tenant_id', 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array(); 
        return $query;
    }
        function get_all_expenses(){
        $this->db->select('p.*');
       $this->db->from('expenses p');
        $this->db->order_by('p.expense_id', 'DESC');
        $query = $this->db->get();         
        $query = $query->result_array(); 
        return $query;
    }





}