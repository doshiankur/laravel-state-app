<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    { 
        $rules=[];
        $rules=array(            
            'strFirstName'=>'required|max:30',
            'strMiddleName'=>'max:30', 
            'strLastName'=>'required|max:30',
            'strCurrentAddress'=>'required|max:500',
            'strPermantAddress'=>'required|max:500',
            'strWorkAddress'=>'required|max:500',
            'dtiDOB'=>'required',
            'intPhoneNumber'=>'required|digits:10',
            'strEmail'=>'required|email',
            'strIDProofType'=>'required',
            'strApplicationType'=>'required',
            'intIssuingBook'=>'required',            
            'strPhoto'=>'mimes:jpg,png,jpeg|max:200',
            'strSigned'=>'mimes:jpg,png,jpeg|max:200',
            'strIDProof'=>'mimes:pdf|max:200',
            //'intAgree'=>'required'
            );           
        return $rules;
        
    }

    public function messages(){
        $rules=[];
    
        $rules=array(             
              'strEmail.required'=>'Email is required',
              'strEmail.email'=>'Insert Proper Email Address',
              'strFirstName.required'=>'First Name is required',
              'strLastName.required'=>'Last Name is required',
              'strCurrentAddress.required'=>'Current Address is required',
              'strPermantAddress.required'=>'Perment Address is required',
              'strWorkAddress.required'=>'Work Address is required',
              'dtiDOB.required'=>'Date of birth is required',
              'intPhoneNumber.required'=>'Phone Number is required',
              'intPhoneNumber.digits'=>'Phone Number is only numeric required',
              'strIDProofType.required'=>'ID Proof is required',
              'intIssuingBook.required'=>'Book Issuing is required',
              'strApplicationType.required'=>'Application Type is required',              
              //'strPhoto.required'=>'Photo is required',
              'strPhoto.mimes'=>'Photo Should be .jpg,.png or ,jpeg only',
              'strPhoto.max'=>'Photo Should not be more then 200KB',
              //'strSigned.required'=>'Signed is required',
              'strSigned.mimes'=>'Signed Should be .jpg,.png or ,jpeg only',
              'strSigned.max'=>'Signed Should not be more then 200KB',
              //'strIDProof.required'=>'ID Proof is required',
              'strIDProof.mimes'=>'ID Proof Should be .pdf only',
              'strIDProof.max'=>'ID Proof Should not be 200KB'
              //'intAgree.required'=>'Please Check before submit your pplication'                 
        );
           
            return $rules;
        }
  
    protected function failedValidation(Validator $validator) {

        $message = $validator->errors()->all();
         if($message){
           throw new HttpResponseException(response()->json(['status' => 404,'messages' => $message]));   
         }         
    }
   
}