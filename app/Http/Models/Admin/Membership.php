<?php
namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Membership extends Model{
    
    protected $table='mst_membership';
    //use Notifiable;
    protected $fillable=['intAgree','strFinalScan',
                        'strFirstName','strMiddleName','strLastName',
                        'strCurrentAddress','strPermantAddress','strWorkAddress',
                        'dtiDOB','intPhoneNumber','strEmail',
                        'strIDProofType','strApplicationType',
                        'intIssuingBook','strGuarantorCurrentAddress','strGuarantorPermentAddress',
                        'strGuarantorWorkAddress','strGuarantiedDetails','strPhoto','strSigned',
                        'strIDProof','enmApplicationStatus','dtiFinalSubmitDate'];    
}