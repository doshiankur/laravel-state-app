<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Models\Admin\Membership;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\MembershipQuery;
use App\Http\Models\Admin\MemberApplicationType;
//use Mail; 
use Excel;
use App\Exports\ApproveredMembershipExport;
use App\Lib\couchdb;
use App\Interfaces\EmailServiceInterface;

class MembershipContoller extends Controller
{
   //Call EmailServiceInterface via constructer create    
    private $emailservice;
    public function __construct(EmailServiceInterface $emailservice){
      $this->emailservice=$emailservice;
    }
   //End here

    //getting all Membership data from database table
    public function getMembers(){
    	//dd("hi");
    	//$member_data=Membership::all();
        

        $member_data=Membership::join('mst_members_application_type',
                      'mst_members_application_type.id','=','mst_membership.strApplicationType')
                      ->select('mst_membership.*','mst_members_application_type.strApplicationType',
                        'mst_members_application_type.id as applicationType')
                      ->whereIn('mst_membership.enmApplicationStatus',['2','3','4','5','6','8'])
                      ->orderBy('mst_membership.seq_id','DESC')
                      ->orderBy('mst_membership.strMembershipID','DESC')
                      ->oldest()
                      ->get();      

    	//dd($member_data);
    	return view('admin.membership.index',compact('member_data'));
    }
    //End here

    //view memebrsip details as per the memebrshipid
    public function viewMembers($memebrshipid){
      //dd($memebrshipid);
    	$memebrsip_getdata=Membership::join('mst_members_application_type',
                                            'mst_members_application_type.id','=','mst_membership.strApplicationType')
                                      ->select('mst_membership.*','mst_members_application_type.strApplicationType',
                                              'mst_members_application_type.id as applicationType')
                                      ->findOrfail($memebrshipid);
    	//dd($memebrsip_getdata);
       $membership_query=MembershipQuery::where('intMembershipId','=',$memebrshipid)->get();

       //dd($membership_query); 
       
       $member_data=array();
       
        //CouchDB File getting

         $couch_obj=new couchdb();   
         $get_doc=$couch_obj->get_doc($memebrsip_getdata['strCouchdbID']);
         $file_name=array_keys($get_doc['_attachments']);
         for($i=0;$i<sizeof($file_name);$i++){
             if($memebrsip_getdata['strPhoto']==$file_name[$i]){
                   $getting_img=$couch_obj->download_attachment($memebrsip_getdata['strCouchdbID'],$file_name[$i]);
                   $member_data['strPhoto']=$getting_img;                      
              }
              if($memebrsip_getdata['strSigned']==$file_name[$i]){
                   $strSigned_img=$couch_obj->download_attachment($memebrsip_getdata['strCouchdbID'],$file_name[$i]);
                   $member_data['strSigned']=$strSigned_img;                      
              } 
              if($memebrsip_getdata['strIDProof']==$file_name[$i]){
                   $strIDProof_img=$couch_obj->download_attachment($memebrsip_getdata['strCouchdbID'],$file_name[$i]);
                   $member_data['strIDProof']=$strIDProof_img;                      
              }
              if($memebrsip_getdata['strFinalScan']==$file_name[$i]){
                   $strFinalScan_img=$couch_obj->download_attachment($memebrsip_getdata['strCouchdbID'],$file_name[$i]);
                   $member_data['strFinalScan']=$strFinalScan_img;                      
              }
          }//dd($member_data);          
          
          return view('admin.membership.view',compact('memebrsip_getdata','membership_query','member_data'));
    }
    //End here

    //Change the Application status to Approvered
    public function changeQuery($memebrshipid){
             //dd($memebrshipid);
        $getting_memebership=Membership::where('id','=',$memebrshipid)->get();//email sending code
        
            $query_data['enmApplicationStatus']='7';
            $query_data['dtiApprovalDate']=date('Y-m-d');
            $memebership_query=Membership::where('id','=',$memebrshipid);
            $memebership_query->update($query_data);

           //Email Sending code start
            $data=array();        
            $data['membership_submited_id']=$getting_memebership[0]->strMembershipID;
            $data['membership_email']=$getting_memebership[0]->strEmail;
            $this->emailservice->ApproveredEmailSend($data);//Email send via EmailService provider or dependcy injection
            //End here
            return redirect('webpanel/membership')->with('flash_message', 'Application is Approved');
    }
    //End here
    
    //Change the status to verify as per the memebrshipid
     public function ChangeStatus($memebrshipid){
            //dd($memebrshipid);         
            $getting_memebership=Membership::where('id','=',$memebrshipid)->get();//email sending code
            $query_data['enmApplicationStatus']='5';
            $memebership_query=Membership::where('id','=',$memebrshipid);
            $memebership_query->update($query_data);         
            $memebrshipid="id";
          //Email Sending code start
           $data=array();        
           $data['membership_submited_id']=$getting_memebership[0]->strMembershipID;
           $data['membership_email']=$getting_memebership[0]->strEmail;
           $this->emailservice->EmailSendVerified($data);//Email send via EmailService provider or dependcy injection       
         //End here
        
        return redirect('webpanel/membership')->with('flash_message', 'Application is Verify');
     }
    //End here
        
    //save Query for the membership
    public function addQuery($memebrshipid){
        //dd($memebrshipid); //dd("hi");

        $membership=Membership::where('id','=',$memebrshipid)->get();    
        //dd($membership[0]->id);
       return view('admin.membership.edit',compact('membership'));
    }
    //End here

    //Update Query for insert into database
    public function update(Request $request, $id){
        //dd("hi");      
        $this->validate($request,['strComment'=>'required']);

        $membership_obj=new  MembershipQuery();

        $membership_obj['strComment'] = $request->input('strComment');
        $membership_obj['intMembershipId']=$request->input('membership_id');       
        //dd($membership_obj);       
        $membership_obj->save();
        
       //Email Sending code start
        $data=array();
        $data['strComment']=$request->input('strComment');
        $data['membership_submited_id']=$request->input('membership_submited_id');
        $data['membership_email']=$request->input('membership_email');        
        $this->emailservice->QueryEmailSend($data);//Email send via EmailService provider or dependcy injection 
      //End here
     
        //code for change status code in query table     
            $query_data['enmApplicationStatus']='3';
            $memebership_query=Membership::where('id','=',$request->input('membership_id'));
            $memebership_query->update($query_data);
        //End here       
        return redirect('webpanel/membership')->with('flash_message', 'Query For the application');
    }




 //getting all Approved Membership data from database table
    public function approverdmembership(){
        //dd("hi");
        $member_data=Membership::join('mst_members_application_type',
                      'mst_members_application_type.id','=','mst_membership.strApplicationType')
                       ->leftjoin('mst_membership_payment','mst_membership_payment.intMembershipId','=','mst_membership.id') 
                      ->select('mst_membership.*','mst_members_application_type.strApplicationType',
                        'mst_members_application_type.id as applicationType',
                        'mst_membership_payment.strDepositAmount','mst_membership_payment.strSmartCardFees')
                      ->whereIn('mst_membership.enmApplicationStatus',['7'])
                      ->get();      

        //dd($member_data);
        return view('admin.approvedmembership.index',compact('member_data'));
    }

   //Export csv data only memebrship approvered  Report
     public function exportcsv(Request $request){
//dd($request->all());
  //       dd($request->from);
           // dd($request->to);
        return Excel::download(new ApproveredMembershipExport($request->from,$request->to), 'ApprovedMembership.xlsx');
    } 
    //End here
}