<?php
namespace App\Exports;

use App\Http\Models\Admin\Membership;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;


class ApproveredMembershipExport implements FromCollection,WithHeadings
{
	protected $from;
	protected $to;

 function __construct($from,$to) {
	 
        $this->from = $from;
		$this->to=$to; 
 }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {     		
			$from_date=date('Y-m-d',strtotime($this->from));
			$to_date=date('Y-m-d',strtotime($this->to));

			$approvered=Membership::join('mst_members_application_type',
                      'mst_members_application_type.id','=','mst_membership.strApplicationType')
      ->leftjoin('mst_membership_payment','mst_membership_payment.intMembershipId','=','mst_membership.id') 
                      ->select('mst_membership.strMembershipID',
                      DB::raw('CONCAT(mst_membership.strFirstName," ",mst_membership.strLastName) as ApplicantName'),
                      	'mst_membership.intPhoneNumber',
                      	'mst_members_application_type.strApplicationType',
                      	'mst_membership.dtiFinalSubmitDate',
                      	'mst_membership.dtiApprovalDate',
                        'mst_membership_payment.strTotalAmount','mst_membership_payment.intBookCount')
                      ->whereIn('mst_membership.enmApplicationStatus',['7'])
                      ->whereBetween('mst_membership.dtiApprovalDate',[$from_date,$to_date])
                      ->get();  
				
			//dd($approvered);			   
			
			return collect($approvered);
    }
    //set the Header for display in the 
    public function headings() : array{
        return ['File Number','Members Name','Mobile Number','Application Type',
        'Submited Date','Approved Date','Total Amount','Book Count'];
    }
}