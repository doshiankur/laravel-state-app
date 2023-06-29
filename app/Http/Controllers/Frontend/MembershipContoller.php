<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Membership;
use App\Http\Models\Admin\MembershipQuery;
use App\Http\Models\Admin\Membershippayment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;
use Intervention\Image\Facades\Image as Image;
use DB;
use App\Lib\couchdb;
use Mail;
use App\Interfaces\EmailServiceInterface;
use App\Http\Requests\MemberRequest;
use App\Http\Requests\MemberRequestEdit;
class MembershipContoller extends Controller{

   
   //Call EmailServiceInterface via constructer create 
   private $emailservice;
   public function __construct(EmailServiceInterface $emailservice){
      $this->emailservice=$emailservice;
   }
   //End
   
    //Generate the Unique Membership Number
   public function generateMembership(){
    	//dd("hi");
     $membership_count_query = DB::table('mst_membership')->get();
     //dd($membership_count_query->count());
     $last_count = 0;

    if($membership_count_query->count() > 0) {
       $data=Membership::select('id','strMembershipID','seq_id')->OrderBy('seq_id', 'desc')->first();
      
      //dd($data->seq_id);    
      $last_count = $data->seq_id;
    }
     $last_count = $last_count + 1;
     $id = str_pad($last_count,6, '0', STR_PAD_LEFT);
      $mid = $id.'/SCL/'.date('Y');
     $a_data = array(
            'membership_id' => $mid,
            'seq_id' => $last_count
      );//dd($a_data);
        return $a_data;

    }
    //end here

    public function saveMembership(Request $request,MemberRequest $memberrequest){
    	//dd("hi");
       $app_id = $this->generateMembership();//call function for generate the newID and seq_id
         //dd($app_id);
    	 $data = $request->file();
         //dd($data['strIDProof']);
       /*echo $data['file']['strPhoto']->getClientOriginalName();
		echo $data['file']['strSigned']->getClientOriginalName();*/
		
      $validator=$memberrequest->validated();//Check validation using FormRequest
   
   	ini_set('memory_limit','256M');
    		// $data = $request->file();
            //dd($data);
    		 //dd($data['strPhoto']->getClientOriginalName());
             $membership_obj=new Membership();

             $membership_obj->strFirstName=$request->input('strFirstName');
             
             if(!empty($request->input('strMiddleName'))){
                $membership_obj->strMiddleName=$request->input('strMiddleName');
             }             
             $membership_obj->strLastName=$request->input('strLastName');
             $membership_obj->strCurrentAddress=$request->input('strCurrentAddress');
             $membership_obj->strPermantAddress=$request->input('strPermantAddress');
             $membership_obj->strWorkAddress=$request->input('strWorkAddress');
             $membership_obj->dtiDOB=date('Y-m-d',strtotime($request->input('dtiDOB')));
             $membership_obj->intPhoneNumber=$request->input('intPhoneNumber');
             $membership_obj->strEmail=$request->input('strEmail');
             $membership_obj->strIDProofType=$request->input('strIDProofType');
             $membership_obj->strApplicationType=$request->input('strApplicationType');
             $membership_obj->strGuarantorCurrentAddress=$request->input('strGuarantorCurrentAddress');
             $membership_obj->strGuarantorPermentAddress=$request->input('strGuarantorPermentAddress');
             $membership_obj->strGuarantorWorkAddress=$request->input('strGuarantorWorkAddress');
             $membership_obj->strGuarantiedDetails=$request->input('strGuarantiedDetails');
             $membership_obj->intIssuingBook=$request->input('intIssuingBook');
             //$membership_obj->intAgree=$request->input('intAgree');
             //$membership_obj->strMembershipID='00003/SCL/2022';
             $membership_obj->intUserId=$request->input('intUserId');
             $membership_obj->strMembershipID = $app_id['membership_id'];
             $membership_obj->seq_id = $app_id['seq_id'];

	         /*if($data['file']['strPhoto']){      		
      			$upload_strphoto = now()->timestamp .'_'.$data['file']['strPhoto']->getClientOriginalName();
      			$data['file']['strPhoto']->move(base_path() . '/public/upload/membership',$upload_strphoto);
      			$membership_obj->strPhoto=$upload_strphoto;
      		}
      		if($data['file']['strSigned']){      		
      			$upload_strsigned = now()->timestamp .'_'.$data['file']['strSigned']->getClientOriginalName();
      			$data['file']['strSigned']->move(base_path() . '/public/upload/membership',$upload_strsigned);
      			$membership_obj->strSigned=$upload_strsigned;
      		}
      		if($data['file']['strIDProof']){
      		   $upload_stridproof = now()->timestamp .'_'.$data['file']['strIDProof']->getClientOriginalName();
      			$data['file']['strIDProof']->move(base_path() . '/public/upload/membership',$upload_stridproof);
      			$membership_obj->strIDProof=$upload_stridproof;
      		}*/
            //Code For couchDB
              
              $couch_obj=new couchdb();             
              $data_getting=array('_id'=>'Membership_'.$app_id['seq_id']);//For creating the documentID
              $membership_obj->strCouchdbID='Membership_'.$app_id['seq_id'];//Save couchdb id into database
              $create_document_id=$couch_obj->create_doc($data_getting);
              $documentID = $create_document_id['id'];
            
            //File upload start
              
         if($data['strPhoto']){   
          $strphoto_file_name=str_replace(' ','_',$_FILES['strPhoto']['name']);       
          $attachment_photo=now()->timestamp .'_'.$strphoto_file_name;
          $membership_obj->strPhoto=$attachment_photo;
          $finfo = finfo_open(FILEINFO_MIME_TYPE);
          $contentType_photo = finfo_file($finfo,$_FILES['strPhoto']['tmp_name']);
          $payload_photo = file_get_contents($_FILES['strPhoto']['tmp_name']);
          $upload_img=$couch_obj->upload_attachment($documentID, $attachment_photo, $payload_photo, $contentType_photo);
         }
         if($data['strSigned']){
                $idproof_file_name=str_replace(' ','_',$_FILES['strSigned']['name']);
                $attachment_signed=now()->timestamp .'_'.$idproof_file_name;
                $membership_obj->strSigned=$attachment_signed;
                $finfo_signed = finfo_open(FILEINFO_MIME_TYPE);
                $contentType_signed = finfo_file($finfo_signed,$_FILES['strSigned']['tmp_name']);
                $payload_signed = file_get_contents($_FILES['strSigned']['tmp_name']);
          $upload_img2=$couch_obj->upload_attachment($documentID, $attachment_signed, $payload_signed, $contentType_signed);
                //End here
         }     
         if($data['strIDProof']){
               $imgurl_file_name=str_replace(' ','_',$_FILES['strIDProof']['name']);
               $attachment_strIDProof=now()->timestamp .'_'.$imgurl_file_name;
               $membership_obj->strIDProof=$attachment_strIDProof;
               $finfo_strIDProof = finfo_open(FILEINFO_MIME_TYPE);
               $contentType_strIDProof = finfo_file($finfo_strIDProof,$_FILES['strIDProof']['tmp_name']);
               $payload_strIDProof = file_get_contents($_FILES['strIDProof']['tmp_name']);
               $upload_img2=$couch_obj->upload_attachment($documentID, $attachment_strIDProof, $payload_strIDProof, $contentType_strIDProof);                
         }                
      //End here
         //dd($membership_obj);
            $membership_obj->save();
            $membership_obj->id;
            //$membership_obj->intUserId;

      //Email start
                //Admin 
               /*  Mail::send('email.adminsubmit',$membership_obj, function ($message) use ($data) {
                    $message->to(env('APPLICANT_ADMIN'))
                        ->subject('New Application Form (' . $data['strName'] . ')');
                    $message->from(env('MAIL_USERNAME'), 'New Application Form (' . $membership_obj['strName'] . ')');
                });

                 //Applicant
                Mail::send('email.applicantsubmit',$membership_obj, function ($message) use ($membership_obj) {
                    $message->to($membership_obj['strEmail'])
                        ->subject('Thank you for showing your interest.');
                    $message->from(env('MAIL_USERNAME'),'New Application Form (' . $membership_obj['strName'] . ')');
                });*/


 //Email Sending code start
       
      

        $data_email=array();        
        $data_email['membership_submited_id']=$app_id['membership_id'];
        $data_email['membership_email']=$request->input('strEmail');
        $data_email['strName']=$request->input('strFirstName')." ".$request->input('strLastName');
        
       $this->emailservice->EmailSend($data_email);//Email send via EmailService provider or dependcy injection
       
       //Applicant 
       /*Mail::send('email.applicantsubmit',$data_email, function ($message) use ($data_email) {
           $message->to($data_email['membership_email'])
                   ->subject('Thank you for showing your interest.');
           $message->from(env('MAIL_USERNAME'), 'Thank you for showing your interest in State Central Library Department (' . $data_email['membership_submited_id'].')');
        });*/

        //Admin
       /*Mail::send('email.adminsubmit',$data_email, function ($message) use ($data_email) {
           $message->to($data_email['membership_email'])
                   ->subject('New Applicantion.');
           $message->from(env('MAIL_USERNAME'), 'New Applicantion in State Central Library Department (' . $data_email['membership_submited_id'].')');
        });*/
      //End here

           //Insert the final amount Payment Details into mst_membership_payment table     
            $membership_amount_obj=new Membershippayment();
            if($request->input('strApplicationType')==1 || $request->input('strApplicationType')==4){//Bail and renew
                 if($request->input('intIssuingBook')==1){
                     $membership_amount_obj->strDepositAmount=40;
                     $membership_amount_obj->strSmartCardFees=10;

                     $membership_amount_obj->strTotalAmount=$membership_amount_obj->strDepositAmount+$membership_amount_obj->strSmartCardFees;
                     $membership_amount_obj->intBookCount=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==2){
                     $membership_amount_obj->strDepositAmount=80;
                     $membership_amount_obj->strSmartCardFees=20;
                     $membership_amount_obj->strTotalAmount=$membership_amount_obj->strDepositAmount+$membership_amount_obj->strSmartCardFees;
                     $membership_amount_obj->intBookCount=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==3){
                     $membership_amount_obj->strDepositAmount=120;
                     $membership_amount_obj->strSmartCardFees=30;
                     $membership_amount_obj->strTotalAmount=$membership_amount_obj->strDepositAmount+$membership_amount_obj->strSmartCardFees;
                     $membership_amount_obj->intBookCount=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==4){
                     $membership_amount_obj->strDepositAmount=160;
                     $membership_amount_obj->strSmartCardFees=40;
                     $membership_amount_obj->strTotalAmount=$membership_amount_obj->strDepositAmount+$membership_amount_obj->strSmartCardFees;
                     $membership_amount_obj->intBookCount=$request->input('intIssuingBook');
                  }              

            }elseif($request->input('strApplicationType')==3){//For Non Bailable
               if($request->input('intIssuingBook')==1){
                     $membership_amount_obj->strDepositAmount=100;
                     $membership_amount_obj->strSmartCardFees=10;
                     $membership_amount_obj->strTotalAmount=$membership_amount_obj->strDepositAmount+$membership_amount_obj->strSmartCardFees;
                     $membership_amount_obj->intBookCount=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==2){
                     $membership_amount_obj->strDepositAmount=200;
                     $membership_amount_obj->strSmartCardFees=20;
                     $membership_amount_obj->strTotalAmount=$membership_amount_obj->strDepositAmount+$membership_amount_obj->strSmartCardFees;
                     $membership_amount_obj->intBookCount=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==3){
                     $membership_amount_obj->strDepositAmount=300;
                     $membership_amount_obj->strSmartCardFees=30;
                     $membership_amount_obj->strTotalAmount=$membership_amount_obj->strDepositAmount+$membership_amount_obj->strSmartCardFees;
                     $membership_amount_obj->intBookCount=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==4){
                     $membership_amount_obj->strDepositAmount=400;
                     $membership_amount_obj->strSmartCardFees=40;
                     $membership_amount_obj->strTotalAmount=$membership_amount_obj->strDepositAmount+$membership_amount_obj->strSmartCardFees;
                     $membership_amount_obj->intBookCount=$request->input('intIssuingBook');
                  }   

            }
            elseif($request->input('strApplicationType')==2){//For Child
               if($request->input('intIssuingBook')==1){
                     $membership_amount_obj->strDepositAmount=8;
                     $membership_amount_obj->strSmartCardFees=10;
                     $membership_amount_obj->strTotalAmount=$membership_amount_obj->strDepositAmount+$membership_amount_obj->strSmartCardFees;
                     $membership_amount_obj->intBookCount=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==2){
                     $membership_amount_obj->strDepositAmount=16;
                     $membership_amount_obj->strSmartCardFees=20;
                     $membership_amount_obj->strTotalAmount=$membership_amount_obj->strDepositAmount+$membership_amount_obj->strSmartCardFees;
                     $membership_amount_obj->intBookCount=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==3){
                     $membership_amount_obj->strDepositAmount=24;
                     $membership_amount_obj->strSmartCardFees=30;
                     $membership_amount_obj->strTotalAmount=$membership_amount_obj->strDepositAmount+$membership_amount_obj->strSmartCardFees;
                     $membership_amount_obj->intBookCount=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==4){
                     $membership_amount_obj->strDepositAmount=32;
                     $membership_amount_obj->strSmartCardFees=40;
                     $membership_amount_obj->strTotalAmount=$membership_amount_obj->strDepositAmount+$membership_amount_obj->strSmartCardFees;
                     $membership_amount_obj->intBookCount=$request->input('intIssuingBook');
                  }
            }

            $membership_amount_obj->intMembershipId=$membership_obj->id;  
            //dd($membership_amount_obj);          
            $membership_amount_obj->save();            
            //End here

        return response()->json([
               'status'=>200,
               'membership'=>'Membership Data Inserted Successfully',
               'membership_id'=>$membership_obj->id,
               'login_id'=>$membership_obj->intUserId
        ]);    	
    }

    
    function fileExtension($name) {
            $n = strrpos($name, '.');
            return ($n === false) ? '' : substr($name, $n+1);
    }
    
    //getting memebrship data from memebrshipID for Edit and Print
    
    public function getMembershipFromMembershipID(Request $request){
           //dd($request);
    $memebrshipid=$request->input('membershipid'); 
    //$memebership_query=Membership::select('*')->where('strMembershipID','=',$memebrshipid)->first(); 



         $memebership_query=Membership::join('mst_members_application_type',
                'mst_members_application_type.id','=','mst_membership.strApplicationType')
                   ->select('mst_membership.*','mst_membership.strMembershipID as MemberShipID',
                      'mst_members_application_type.strApplicationType as ApplicationType')
                    ->where('mst_membership.strMembershipID','=',$memebrshipid)
                    ->first();
  
      $member_data=array();
        //dd($memebership_query);
        //CouchDB File getting
        
               $couch_obj=new couchdb();   
               $get_doc=$couch_obj->get_doc($memebership_query['strCouchdbID']);
               $file_name=array_keys($get_doc['_attachments']);
            //echo sizeof($file_name);exit;
               for($i=0;$i<sizeof($file_name);$i++){
                   if($memebership_query['strPhoto']==$file_name[$i]){
                      //$member_data['strPhoto']=$file_name[$i];
                       $getting_img=$couch_obj->download_attachment($memebership_query['strCouchdbID'],$file_name[$i]);
               $image = imagecreatefromstring($getting_img); 
               ob_start(); 
               imagejpeg($image, null, 80);
               $data = ob_get_contents();
               $final_img=$data;
               ob_end_clean();
               $member_data['strPhoto']=base64_encode($final_img);
                      
                   }
                   if($memebership_query['strSigned']==$file_name[$i]){
                      //$member_data['strSigned']=$file_name[$i];
                      $getting_img=$couch_obj->download_attachment($memebership_query['strCouchdbID'],$file_name[$i]);
               $image = imagecreatefromstring($getting_img); 
               ob_start(); 
               imagejpeg($image, null, 80);
               $data = ob_get_contents();
               $final_img=$data;
               ob_end_clean();
               $member_data['strSigned']=base64_encode($final_img);
                     
                   }
               }
            //dd($member_data);               
         //End here
        //Code for display images with convert BLOB to images
             
            /* $getting_img=$couch_obj->download_attachment($memebership_query['strCouchdbID'],$file_name[2]);
             $image = imagecreatefromstring($getting_img); 
             ob_start();
             imagejpeg($image, null, 80);
             $data_signed = ob_get_contents();
             $final_signed=$data_signed;
             ob_end_clean();
             $member_data['strSigned']=base64_encode($final_signed);*/

         //End here           

        	$member_data['strFirstName']=$memebership_query['strFirstName'];	
        	$member_data['strMiddleName']=$memebership_query['strMiddleName'];	
        	$member_data['strLastName']=$memebership_query['strLastName'];
        	$member_data['strCurrentAddress']=$memebership_query['strCurrentAddress'];
        	$member_data['strPermantAddress']=$memebership_query['strPermantAddress'];
        	$member_data['strWorkAddress']=$memebership_query['strWorkAddress'];
        	$member_data['dtiDOB']=date('Y-m-d',strtotime($memebership_query['dtiDOB']));
        	$member_data['intPhoneNumber']=$memebership_query['intPhoneNumber'];
        	$member_data['strEmail']=$memebership_query['strEmail'];
       //$member_data['strPhoto']=asset('public/upload/membership').'/'.$memebership_query['strPhoto'];
      //$member_data['strSigned']=asset('public/upload/membership').'/'.$memebership_query['strSigned'];
         $member_data['strIDProofType']=$memebership_query['strIDProofType'];
         $member_data['strIDProof']=asset('public/upload/membership').'/'.$memebership_query['strIDProof'];
   	   $member_data['strApplicationType']=$memebership_query['strApplicationType'];
   	   $member_data['intIssuingBook']=$memebership_query['intIssuingBook'];
  	      $member_data['strGuarantorCurrentAddress']=$memebership_query['strGuarantorCurrentAddress'];
   	   $member_data['strGuarantorPermentAddress']=$memebership_query['strGuarantorPermentAddress'];
   	   $member_data['strGuarantorWorkAddress']=$memebership_query['strGuarantorWorkAddress'];
   	   $member_data['strGuarantiedDetails']=$memebership_query['strGuarantiedDetails'];
         $member_data['strMembershipID']=$memebership_query['strMembershipID'];
         $member_data['intUserId']=$memebership_query['intUserId'];
         $member_data['strPhotoName']=$memebership_query['strPhoto'];
         $member_data['strSignedName']=$memebership_query['strSigned'];
         $member_data['strIDProofName']=$memebership_query['strIDProof'];
         $member_data['ApplicationType']=$memebership_query['ApplicationType'];
         $member_data['strCouchdbID']=$memebership_query['strCouchdbID'];

         $member_data['enmApplicationStatus']=$memebership_query['enmApplicationStatus'];

  if($memebership_query['enmApplicationStatus']=='5' || $memebership_query['enmApplicationStatus']=='7'){
        $payment_query=Membershippayment::select('mst_membership_payment.*')
                    ->where('mst_membership_payment.intMembershipId','=',$memebership_query['id'])->first();
        $member_data['strSmartCardFees'] =$payment_query['strSmartCardFees'];
        $member_data['strDepositAmount'] =$payment_query['strDepositAmount'];
        $member_data['strTotalAmount']=$payment_query['strTotalAmount'];
  }

          
        
      	//dd($member_image);         
   	        return response()->json([
   	        	'status'=>200,
   	        	'member_data'=>$member_data]);
    }
    //end here

   //Get the membership details from the login user id
   public function getMembershipFromLoginUser($userid){
       //dd($userid);
    	
        /*$select_query=Membership::leftjoin('mst_membership_query',
        	          'mst_membership_query.intMembershipId','=','mst_membership.id')
        	          ->select('mst_membership.id','mst_membership.strMembershipID as MemberShipID',
        	          DB::raw('CONCAT(mst_membership.strFirstName," ",mst_membership.strLastName) as ApplicantName'),
                      'mst_membership_query.strComment as QueryComment',
                      'mst_membership_query.enmStatus as QueryStatus',
                      'mst_membership.enmApplicationStatus as ApplicationStatus')
        	          ->where('mst_membership.intUserId','=',$userid)
        	          ->orderBy('mst_membership_query.id','desc')
        	          ->skip(0)
        	          ->take(1)
        	          ->get();*/
       
       //dd($select_query);
   	          $select_query=Membership::join('mst_members_application_type',
                'mst_members_application_type.id','=','mst_membership.strApplicationType')
                   ->select('mst_membership.id as ID','mst_membership.strMembershipID as MemberShipID',
        	          DB::raw('CONCAT(mst_membership.strFirstName," ",mst_membership.strMiddleName," ",mst_membership.strLastName) as ApplicantName'),
                      //'mst_membership_query.strComment as QueryComment',
                      //'mst_membership_query.enmStatus as QueryStatus',
                      'mst_membership.enmApplicationStatus as ApplicationStatus',
                      'mst_membership.dtiFinalSubmitDate as FinalSubmitDate',
                      'mst_membership.strCouchdbID as strCouchdbID',
                      'mst_members_application_type.strApplicationType as ApplicationType')
        	          ->where('mst_membership.intUserId','=',$userid)
                      ->orderBy('mst_membership.id','ASC')
        	          ->get();

               $data=array();
               $k=0;
        	   foreach ($select_query as $key => $value) {
        	  
                       $data[$k]['id']=$k+1;
        	             $data[$k]['MemberShipID']=$select_query[$key]['MemberShipID'];	
        	             $data[$k]['ApplicantName']=$select_query[$key]['ApplicantName'];
                         $data[$k]['ApplicationType']=$select_query[$key]['ApplicationType'];
                         $data[$k]['strCouchdbID']=$select_query[$key]['strCouchdbID']; 
                                	             
        	             //$data[$k]['QueryComment']=$select_query[$key]['QueryComment'];	
        	             if($select_query[$key]['ApplicationStatus']=='1'){
                            $data[$k]['ApplicationStatus']='Final Attachment is yet to be uploaded';
                            $data[$k]['Application_status_code']=$select_query[$key]['ApplicationStatus'];	    
        	             }else if($select_query[$key]['ApplicationStatus']=='2'){
                             $data[$k]['ApplicationStatus']='Your Application in Process';	
                             $data[$k]['Application_status_code']=$select_query[$key]['ApplicationStatus'];    
        	             }else if($select_query[$key]['ApplicationStatus']=='3'){
                             $data[$k]['ApplicationStatus']='Query';	    
                             $data[$k]['Application_status_code']=$select_query[$key]['ApplicationStatus'];
        	             }else if($select_query[$key]['ApplicationStatus']=='4'){
                             $data[$k]['ApplicationStatus']='Your Application in Process';   
                             $data[$k]['Application_status_code']=$select_query[$key]['ApplicationStatus'];   
                         }else if($select_query[$key]['ApplicationStatus']=='8'){
                             $data[$k]['ApplicationStatus']='Replied but you have to submit final attachment';	 
                             $data[$k]['Application_status_code']=$select_query[$key]['ApplicationStatus'];   
        	             }else if($select_query[$key]['ApplicationStatus']=='5'){
                             $data[$k]['ApplicationStatus']='Verify';   
                             $data[$k]['Application_status_code']=$select_query[$key]['ApplicationStatus'];   
                       }else if($select_query[$key]['ApplicationStatus']=='6'){
                             $data[$k]['ApplicationStatus']='Waiting For Admin Approval';   
                             $data[$k]['Application_status_code']=$select_query[$key]['ApplicationStatus'];   
                       }
        	             else{
                            $data[$k]['ApplicationStatus']='Approved';
                            $data[$k]['Application_status_code']=$select_query[$key]['ApplicationStatus'];
        	             }

        	             //$data[$k]['QueryStatus']=($select_query[$key]['QueryStatus'])? 1 : 0 ;
$data[$k]['FinalSubmitDate']=($select_query[$key]['FinalSubmitDate'])?date('d-m-Y',strtotime($select_query[$key]['FinalSubmitDate'])):'--';
        	             $k++;
        	          }       
                 //dd($data);
        	    return response()->json([
       							'status'=>200,
       							'membersdata'=>$data]);
   }
   //End here

   //Edit Memebrship from memebrshipID
   public function editMembership(Request $request,MemberRequestEdit $memberrequest){
    //dd($request->input('membershipid'));
   
         	$membership_id=$request->input('membershipid');
            $data = $request->file();
            $validator=$memberrequest->validated();//Validation using FormRequest
       		ini_set('memory_limit','256M');

             //$membership_obj=new Membership();

             $membership_data['strFirstName']=$request->input('strFirstName');
             
             /*if(!empty($request->input('strMiddleName'))){
                $membership_data['strMiddleName']=$request->input('strMiddleName');
             }   */     

             $membership_data['strMiddleName']=$request->input('strMiddleName');

             $membership_data['strLastName']=$request->input('strLastName');
             $membership_data['strCurrentAddress']=$request->input('strCurrentAddress');
             $membership_data['strPermantAddress']=$request->input('strPermantAddress');
             $membership_data['strWorkAddress']=$request->input('strWorkAddress');
             $membership_data['dtiDOB']=date('Y-m-d',strtotime($request->input('dtiDOB')));             
             $membership_data['intPhoneNumber']=$request->input('intPhoneNumber');
             $membership_data['strEmail']=$request->input('strEmail');
             $membership_data['strIDProofType']=$request->input('strIDProofType');
             $membership_data['strApplicationType']=$request->input('strApplicationType');
             if($request->input('strApplicationType')==3){
                $membership_data['strGuarantorCurrentAddress']='';
                $membership_data['strGuarantorPermentAddress']='';
                $membership_data['strGuarantorWorkAddress']='';
                $membership_data['strGuarantiedDetails']='';
             }else{
                $membership_data['strGuarantorCurrentAddress']=$request->input('strGuarantorCurrentAddress');
               $membership_data['strGuarantorPermentAddress']=$request->input('strGuarantorPermentAddress');
               $membership_data['strGuarantorWorkAddress']=$request->input('strGuarantorWorkAddress');
               $membership_data['strGuarantiedDetails']=$request->input('strGuarantiedDetails');
             }
             $membership_data['intIssuingBook']=$request->input('intIssuingBook');  
             //$membership_data['enmApplicationStatus']=$request->input('Application_status_code');
$strCouchdbID=$request->input('strCouchdbID');
//$strCouchdbID='Membership_60';
            /*if(!empty($data['file']['strPhoto'])){
      		
      			$upload_strphoto = now()->timestamp .'_'.$data['file']['strPhoto']->getClientOriginalName();
      			$data['file']['strPhoto']->move(base_path() . '/public/upload/membership',$upload_strphoto);
      			$membership_data['strPhoto']=$upload_strphoto;
      		}

      		if(!empty($data['file']['strSigned'])){
      		
      			$upload_strsigned = now()->timestamp .'_'.$data['file']['strSigned']->getClientOriginalName();
      			$data['file']['strSigned']->move(base_path() . '/public/upload/membership',$upload_strsigned);
      			$membership_data['strSigned']=$upload_strsigned;
      		}

      		if(!empty($data['file']['strIDProof'])){
      		
      			$upload_stridproof = now()->timestamp .'_'.$data['file']['strIDProof']->getClientOriginalName();
      			$data['file']['strIDProof']->move(base_path() . '/public/upload/membership',$upload_stridproof);
      			$membership_data['strIDProof']=$upload_stridproof;
      		}*/
//dd($membership_data);
      		 /*if(!empty($data['strPhoto'])){
      		
      			$upload_strphoto = now()->timestamp .'_'.$data['strPhoto']->getClientOriginalName();
      			$data['strPhoto']->move(base_path() . '/public/upload/membership',$upload_strphoto);
      			$membership_data['strPhoto']=$upload_strphoto;
      		}

      		if(!empty($data['strSigned'])){
      		
      			$upload_strsigned = now()->timestamp .'_'.$data['strSigned']->getClientOriginalName();
      			$data['strSigned']->move(base_path() . '/public/upload/membership',$upload_strsigned);
      			$membership_data['strSigned']=$upload_strsigned;
      		}

      		if(!empty($data['strIDProof'])){
      		
      			$upload_stridproof = now()->timestamp .'_'.$data['strIDProof']->getClientOriginalName();
      			$data['strIDProof']->move(base_path() . '/public/upload/membership',$upload_stridproof);
      			$membership_data['strIDProof']=$upload_stridproof;
      		}*/
      		// dd($membership_data);

            
            //Code For couchDB
              
              $couch_obj=new couchdb();  
              //$get_doc=$couch_obj->get_doc($strCouchdbID);
 //echo "<pre>";print_r($get_doc);exit;

              $data_getting=array('_id'=>$strCouchdbID);//For creating the documentID
              //dd($data_getting);
              //$membership_obj->strCouchdbID='Membership_'.$app_id['seq_id'];//Save couchdb id into database
              $create_document_id=$couch_obj->get_doc($strCouchdbID);
              //dd($create_document_id);
              $documentID =$strCouchdbID;// $create_document_id['_id'];
             //$delete_doc=$couch_obj->delete_revs($strCouchdbID,$num=0);  
            //$delete_doc=$couch_obj->delete_doc($strCouchdbID);
            //File upload start
        if(!empty($_FILES['strPhoto']['name'])){      
         if($data['strPhoto']){    
         $strphoto_file_name=str_replace(' ','_',$_FILES['strPhoto']['name']);      
          $attachment_photo=now()->timestamp .'_'.$strphoto_file_name;
          $membership_data['strPhoto']=$attachment_photo;
          $finfo = finfo_open(FILEINFO_MIME_TYPE);
          $contentType_photo = finfo_file($finfo,$_FILES['strPhoto']['tmp_name']);
          $payload_photo = file_get_contents($_FILES['strPhoto']['tmp_name']);
          $upload_img=$couch_obj->upload_attachment($documentID, $attachment_photo, $payload_photo, $contentType_photo);
          }
        }
        if(!empty($_FILES['strSigned']['name'])){
               if($data['strSigned']){
                $signed_file_name=str_replace(' ','_',$_FILES['strSigned']['name']);
                $attachment_signed=now()->timestamp .'_'.$signed_file_name;
                $membership_data['strSigned']=$attachment_signed;
                $finfo_signed = finfo_open(FILEINFO_MIME_TYPE);
                $contentType_signed = finfo_file($finfo_signed,$_FILES['strSigned']['tmp_name']);
                $payload_signed = file_get_contents($_FILES['strSigned']['tmp_name']);
          $upload_img2=$couch_obj->upload_attachment($documentID, $attachment_signed, $payload_signed, $contentType_signed);
                //End here
         }
       }
            
         if(!empty($_FILES['strIDProof']['name'])){

              if($data['strIDProof']){
               $idproof_file_name=str_replace(' ','_',$_FILES['strIDProof']['name']);
               $attachment_strIDProof=now()->timestamp .'_'.$idproof_file_name;
               $membership_data['strIDProof']=$attachment_strIDProof;
               $finfo_strIDProof = finfo_open(FILEINFO_MIME_TYPE);
               $contentType_strIDProof = finfo_file($finfo_strIDProof,$_FILES['strIDProof']['tmp_name']);
               $payload_strIDProof = file_get_contents($_FILES['strIDProof']['tmp_name']);
               $upload_img2=$couch_obj->upload_attachment($documentID, $attachment_strIDProof, $payload_strIDProof, $contentType_strIDProof);                
            }
         }  
                         
      //End here


      		
      		 $membership_data['enmApplicationStatus']=$request->input('Application_status_code');

      		 //$membership=Membership::findOrfail($membership_id);//Previouslly working
             $membership=Membership::where('strMembershipID','=',$membership_id)->first();
             $membership->update($membership_data);

        
            //code for change status code in query table     
            $query_data['enmStatus']=$request->input('query_status_code');
            $memebership_query=MembershipQuery::where('intMembershipId','=',$membership->id);
            $memebership_query->update($query_data);
            //End here

            //Update the final amount Payment Details into mst_membership_payment table     
            
            if($request->input('strApplicationType')==1 || $request->input('strApplicationType')==4){//Bail and renew
                 if($request->input('intIssuingBook')==1){
                     $membership_amount['strDepositAmount']=40;
                     $membership_amount['strSmartCardFees']=10;
                      $membership_amount['strTotalAmount']=$membership_amount['strDepositAmount']+$membership_amount['strSmartCardFees'];

                      $membership_amount['intBookCount']=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==2){
                      $membership_amount['strDepositAmount']=80;
                     $membership_amount['strSmartCardFees']=20;
                      $membership_amount['strTotalAmount']=$membership_amount['strDepositAmount']+$membership_amount['strSmartCardFees'];
                      $membership_amount['intBookCount']=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==3){
                     $membership_amount['strDepositAmount']=120;
                     $membership_amount['strSmartCardFees']=30;
                      $membership_amount['strTotalAmount']=$membership_amount['strDepositAmount']+$membership_amount['strSmartCardFees'];
                      $membership_amount['intBookCount']=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==4){
                      $membership_amount['strDepositAmount']=160;
                     $membership_amount['strSmartCardFees']=40;
                      $membership_amount['strTotalAmount']=$membership_amount['strDepositAmount']+$membership_amount['strSmartCardFees'];
                      $membership_amount['intBookCount']=$request->input('intIssuingBook');
                  }              

            }elseif($request->input('strApplicationType')==3){//For Non Bailable
               if($request->input('intIssuingBook')==1){
                     $membership_amount['strDepositAmount']=100;
                     $membership_amount['strSmartCardFees']=10;
                      $membership_amount['strTotalAmount']=$membership_amount['strDepositAmount']+$membership_amount['strSmartCardFees'];
                      $membership_amount['intBookCount']=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==2){
                      $membership_amount['strDepositAmount']=200;
                      $membership_amount['strSmartCardFees']=20;
                      $membership_amount['strTotalAmount']=$membership_amount['strDepositAmount']+$membership_amount['strSmartCardFees'];
                      $membership_amount['intBookCount']=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==3){
                      $membership_amount['strDepositAmount']=300;
                      $membership_amount['strSmartCardFees']=30;
                      $membership_amount['strTotalAmount']=$membership_amount['strDepositAmount']+$membership_amount['strSmartCardFees'];
                      $membership_amount['intBookCount']=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==4){
                     $membership_amount['strDepositAmount']=400;
                     $membership_amount['strSmartCardFees']=40;
                     $membership_amount['strTotalAmount']=$membership_amount['strDepositAmount']+$membership_amount['strSmartCardFees'];
                     $membership_amount['intBookCount']=$request->input('intIssuingBook');
                  }   

            }
            elseif($request->input('strApplicationType')==2){//For Child
               if($request->input('intIssuingBook')==1){
                     $membership_amount['strDepositAmount']=8;
                     $membership_amount['strSmartCardFees']=10;
                      $membership_amount['strTotalAmount']=$membership_amount['strDepositAmount']+$membership_amount['strSmartCardFees'];
                      $membership_amount['intBookCount']=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==2){
                      $membership_amount['strDepositAmount']=16;
                     $membership_amount['strSmartCardFees']=20;
                      $membership_amount['strTotalAmount']=$membership_amount['strDepositAmount']+$membership_amount['strSmartCardFees'];
                      $membership_amount['intBookCount']=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==3){
                    $membership_amount['strDepositAmount']=24;
                     $membership_amount['strSmartCardFees']=30;
                      $membership_amount['strTotalAmount']=$membership_amount['strDepositAmount']+$membership_amount['strSmartCardFees'];
                      $membership_amount['intBookCount']=$request->input('intIssuingBook');
                  }
                  elseif($request->input('intIssuingBook')==4){
                      $membership_amount['strDepositAmount']=32;
                     $membership_amount['strSmartCardFees']=40;
                      $membership_amount['strTotalAmount']=$membership_amount['strDepositAmount']+$membership_amount['strSmartCardFees'];
                      $membership_amount['intBookCount']=$request->input('intIssuingBook');
                  }
            }
            $memebership_payment=Membershippayment::where('intMembershipId','=',$membership->id);
            $memebership_payment->update($membership_amount);
            //End here

 
             return response()->json([
               'status'=>200,
               'membership'=>'Membership Data Updated Successfully',
               //'membership_id'=>$membership_obj->id,
               //'login_id'=>$membership_obj->intUserId
             ]);
   }
   //End here


   //Final attachment edit to the database as per the membership id
   public function finalsubmitMembership(Request $request){
       //dd($request->all());

       $membership_id=$request->input('membershipid');
       $strCouchdbID=$request->input('strCouchdbID');
       $final_membership=Membership::where('strMembershipID',"=",$membership_id);//change on 01March2023

       //findOrfail() //is working on the primary key,so not use      
       //dd($final_membership);

       $validator=Validator::make($request->all(),[
       	    'strFinalAttachment'=>'required|mimes:pdf|max:1000',
            'intAgree'=>'required'],
			[
        'strFinalAttachment.required'=>'Final Attachment is required',
			  'strFinalAttachment.mimes'=>'Final Attachment Should be .pdf only',
			  'strFinalAttachment.max'=>'Final Attachment Should not be more then 1MB',
			  'intAgree.required'=>'Please Check before submit your application'
           ]);
       if($validator->fails()){
             return response()->json(['validate_error'=>$validator->messages()]); 
    	}else{
    		    $data = $request->file();
    		    $membership_data['intAgree']=$request->input('intAgree');
    		    $membership_data['enmApplicationStatus']=$request->input('enmApplicationStatus');
                $membership_data['dtiFinalSubmitDate']=date('Y-m-d');

    		   /*if($data['strFinalAttachment']){
      		
      			$upload_finalattachment = now()->timestamp .'_'.$data['strFinalAttachment']->getClientOriginalName();
      			$data['strFinalAttachment']->move(base_path() . '/public/upload/membership',$upload_finalattachment);
      			$membership_data['strFinalScan']=$upload_finalattachment;
      		   }*/
//dd($membership_data); 

       //Code For couchDB              
      
         $couch_obj=new couchdb();  
         $documentID =$couch_obj->get_doc($strCouchdbID);
//dd($documentID);
         if(!empty($_FILES['strFinalAttachment']['name'])){      
         
           if($data['strFinalAttachment']){          
            $final_file_name=str_replace(' ','_',$_FILES['strFinalAttachment']['name']);
            $attachment_final=now()->timestamp .'_'.$final_file_name;
            $membership_data['strFinalScan']=$attachment_final;
            $finfo_final_attachment = finfo_open(FILEINFO_MIME_TYPE);
            $contentType_final = finfo_file($finfo_final_attachment,$_FILES['strFinalAttachment']['tmp_name']);
            $payload_final = file_get_contents($_FILES['strFinalAttachment']['tmp_name']);
            $upload_img=$couch_obj->upload_attachment($strCouchdbID, $attachment_final, $payload_final, $contentType_final);
          }
        }
       
       //End CouchDB code here
	   
      //dd($membership_data);     		         		  
       		  
		       $final_membership->update($membership_data);
		       return response()->json([
               						'status'=>200,
               						'membership'=>'Final Attachment Updated Successfully',
               						//'membership_id'=>$membership_obj->id,
             					   //'login_id'=>$membership_obj->intUserId
               ]);
       }
   }
   //End here

  //view memebre's query as per the memebrsid
   public function viewMemebrshipQuery(Request $request){
   	  //dd("hi");
           //dd($request->all());
                 $membership_id=$request->input('membershipid');
                   //$membership_data=Membership::findOrfail($membership_id);
                $membership_data=DB::select('SELECT mst_membership_query.strComment,mst_membership.strMembershipID  
                	                        FROM `mst_membership` as mst_membership 
                	                        inner join mst_membership_query as mst_membership_query
                                            on mst_membership.id=mst_membership_query.intMembershipId 
                                            where mst_membership.strMembershipID="'.$membership_id.'" 
                                            and mst_membership_query.enmStatus="0"');
              //   dd($membership_data);    
              
               if($membership_data){
            			   return response()->json([
               								'status'=>200,
               								'strComment'=>$membership_data[0]->strComment,
             					    		'strMembershipID'=>$membership_data[0]->strMembershipID
               				]);
               }else{
               	   return response()->json([
               								'status'=>200,
               								'strComment'=>'No Query'
               				]);
               }



   }
   //End here

   public function changeMemebrshipStatus(Request $request){
      //dd("hi");
           //dd($request->all());
          
           //$memebrshipid
            //$membership_data=Membership::findOrfail($membership_id);
           //dd($membership_id);
          /*  $query_data['enmApplicationStatus']='6';
            $memebership_query=Membership::where('strMembershipID','=',$membership_id);
            $memebership_query->update($query_data);            
           // return redirect('membership_dashboard');
            return response()->json([
                              'status'=>200,
                              'payment_status'=>'success'
                      ]);*/

      $validator=Validator::make($request->all(),[
            'strAmount'=>'required',
            'membershipid'=>'required'],
            ['strAmount.required'=>'Payment Amount is required',
             'membershipid.required'=>'Membership id is required']);

       if($validator->fails()){
             return response()->json(['validate_error'=>$validator->messages()]); 
      }else{
            $membership_id=$request->input('membershipid');
            $query_data['enmApplicationStatus']='6';
            $memebership_query=Membership::where('strMembershipID','=',$membership_id);
            $memebership_query->update($query_data);
            return response()->json([
                              'status'=>200,
                              'payment_status'=>'success'
                      ]);
     }
   }
   //payment_Api
   
   
   public function getpaymentdetails(Request $request){
              
      $membershippayment_id=$request->input('membership_paymentid');
                  //dd($membershippayment_id);
                     $select_query=Membership::join('mst_membership_payment',
                      'mst_membership.id', '=', 'mst_membership_payment.intMembershipId')
                                 ->join('mst_members_application_type',
                                 'mst_members_application_type.id','=','mst_membership.strApplicationType')
                                 ->select('mst_membership.strMembershipID',
                                 'mst_members_application_type.strApplicationType',
                                    DB::raw('CONCAT(mst_membership.strFirstName," ",
                                     mst_membership.strMiddleName ,mst_membership.strLastName) as FullName'),
                                    'mst_membership.intIssuingBook','mst_membership_payment.strDepositAmount',
                                     'mst_membership_payment.strSmartCardFees',
                                      'mst_membership_payment.strTotalAmount' )
                                    ->where('mst_membership.strMembershipID', '=',
                                    "$membershippayment_id")->first();

                 //dd($select_query);
                  $data['strMembershipID']=$select_query['strMembershipID'];
                  $data['strApplicationType']=$select_query['strApplicationType'];
                  $data['FullName']=$select_query['FullName'];
                  $data['intIssuingBook']=$select_query['intIssuingBook'];
                  $data['strDepositAmount']=$select_query['strDepositAmount'];
                  $data['strSmartCardFees']=$select_query['strSmartCardFees'];
                  $data['strTotalAmount']=$select_query['strTotalAmount'];

                        return response()->json([
                           'status'=>200,
                           'payment_data'=>$data
                  ]);
    }          
}