<?php
namespace App\Services;
use App\Interfaces\EmailServiceInterface;
use Mail;

class EmailService implements EmailServiceInterface{

   //Membership email send to applicant and admin via Frontend
	public function EmailSend(array $data_email){
	   //Applicant         
       Mail::send('email.applicantsubmit',$data_email, function ($message) use ($data_email) {
           $message->to($data_email['membership_email'])
                   ->subject('Thank you for showing your interest.');
           $message->from(env('MAIL_USERNAME'), 'Thank you for showing your interest in State Central Library Department (' . $data_email['membership_submited_id'].')');
        });
        //Admin
       Mail::send('email.adminsubmit',$data_email, function ($message) use ($data_email) {
           $message->to($data_email['membership_email'])
                   ->subject('New Applicantion.');
           $message->from(env('MAIL_USERNAME'), 'New Applicantion in State Central Library Department (' . $data_email['membership_submited_id'].')');
        });
	}
   //End here

   //Query Raised email send via admin panel
	public function QueryEmailSend(array $data){      
        Mail::send('email.adminapplicantquery',$data, function ($message) use ($data) {
           $message->to($data['membership_email'])
                   ->subject('Query From State Central Library Department');
           $message->from(env('MAIL_USERNAME'), 'Query Raised (' . $data['membership_submited_id'].')');
        });
	}
	//End here
    
    //Verified send email via admin panel
    public function EmailSendVerified(array $data){
        Mail::send('email.adminapplicantverify',$data, function ($message) use ($data) {
           $message->to($data['membership_email'])
                   ->subject('Application is verify From State Central Library Department');
           $message->from(env('MAIL_USERNAME'), 'Application is verify from State Central Library Department (' . $data['membership_submited_id'].')');
        });
    }
    //End here

    //Approvered Send email via admin panel
    public function ApproveredEmailSend(array $data){       
        Mail::send('email.adminapplicantapprovered',$data, function ($message) use ($data) {
           $message->to($data['membership_email'])
                   ->subject('Application is Approvered From State Central Library Department');
           $message->from(env('MAIL_USERNAME'), 'Application is Approvered from State Central Library Department (' . $data['membership_submited_id'].')');
        });
    }
    //End here
}
?>