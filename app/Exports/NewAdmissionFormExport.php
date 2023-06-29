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
			
			/*$addmissionArray=DB::select(DB ::raw("SELECT id as RegistrationID,strName as Name, strMobile as Contactno,strgender as Gender,
										         strNationality  as Nationality,strEmail as Email,dtiCreated as AppliedDate
										         from mst_admission_new  where enmDeleted='0' 
										         and (DATE(dtiCreated) between '$from_date' and '$to_date') order by id"));*/

			$approvered=Membership::join('mst_members_application_type',
                      'mst_members_application_type.id','=','mst_membership.strApplicationType')
                      ->select('mst_membership.*','mst_members_application_type.strApplicationType',
                        'mst_members_application_type.id as applicationType')
                      ->whereIn('mst_membership.enmApplicationStatus',['7'])
                      ->whereBetween('mst_membership.dtiApprovalDate',[$from_date,$to_date])
                      ->get();  
				
			//dd($approvered);			   
			
			return collect($approvered);
    }
    public function headings() : array{
        return ['File Number','Members Name','Mobile Number','Application Status','Application Type','Submited Date','Approved Date'];
    }
}