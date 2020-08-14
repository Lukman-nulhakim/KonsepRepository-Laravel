<?php
namespace App\Http\Controllers\Repo;

use Illuminate\Http\Request; // ini untuk memanggil jika ada Request
use Illuminate\Support\Facades\Validator;
use App\Contact;


// ini pake library php untuk check phone number 

class ContactRepository{

    public function standartPhone($phone, $countryID = 'ID'){ // fungsi 
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        try {
            $parsePhone = $phoneUtil->parse($phone, $countryID);
        } catch (\libphonenumber\NumberParseException $e) {
            return false;
        }

        $isvalid = $phoneUtil->isValidNumber($parsePhone);

        if (!$isvalid) {
            return false;
        }

        try {
            $correctPhone = $phoneUtil->format($parsePhone, \libphonenumber\PhoneNumberFormat::E164);
        } catch (\libphonenumber\NumberParseException $e) {
            $correctPhone = false;
        }
        return $correctPhone;
    }

    public function changeCountry($phone = '', $countryID = '', $mobileOnly = true){
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        try {
            $parsePhone = $phoneUtil->parse($phone, $countryID);
        } catch (\libphonenumber\NumberParseException $e) {
            return false;
        }

        $isvalid = $phoneUtil->isValidNumber($parsePhone);

        if (!$isvalid) {
            return false;
        }

        if ($mobileOnly) {
            $isMobile = $phoneUtil->getNumberType($parsePhone);
            if ($isMobile !== 1) {
                return false;
            }
        }

        try {
            $correctPhone = $phoneUntil->format($parsePhone, \libphonenumber\PhoneNumberFormat::E164);
        } catch (\libphonenumber\NumberParseException $e) {
            $correctPhone = false;
        }
        return $correctPhone;
    }

    public function findContactById($id){ // ini pungsi update
        return Contact::with([])->where('id', $id)->firstOrFail();
    }

    // (ini menjalankan pungsi store dan Edit secara bersmaan)
    public function storeFormContact($request, $id){ // validasi cara bukan assigment, in yg dideklarasikan satu-satu
        $result = ['status' => false, 'message' => ''];
        $validator = Validator::make($request->all(),
            [
                'full_name' => 'required|max:50',
                'phone' => 'required|max:20',
                'email' => 'required|email'
            ]
        );
        if ($validator->fails()) {
            $result['message'] = $validator->errors()->all();
            return $result;
        }
        $contact = new Contact(); // ini menginstansiasi
        if ($id) { // ini kondisi jika user milih id maka itu bukan ngestore tapi mau update
            $contact = $this->findContactById($id); // ini function yg dibawah
        }
        $phoneService = $this->standartPhone($request->phone);
        if (!$phoneService) {  // ini mengecek jika phone numbernya bukan indonesia jalankan string message
            $result['message'] = 'phone number is not valid';
            return $result;
        }

        // ini fungsi bukan mass assigment, ini yg dideklarasikan satu-satu, kalo mass assigment seperti update();
        // jika benar save jalankan fungsinya 
        $contact->full_name = $request->full_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->save();
        $result['status'] = true;
        $result['message'] = $contact;
        return $result;
    }

    public function hapusContact($request, $id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return $contact;
    }
}

?>