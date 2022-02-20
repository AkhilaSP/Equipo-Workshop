<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinics;
use App\Models\Consultations;
use App\Models\Patients;
use App\Models\Physicians;
use PDF;
class IndexController extends Controller
{
   public function index()
   {
       return view('index');
   }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('logo'))
        {
            $imageName = $request->logo->getClientOriginalName(); 
            $imagePath = $request->logo->storeAs('images',$imageName, 'public');
        }
        else{
            $imagePath = " ";
        }
        $clinic_data = [
            'name' => $request->clinicName,
            'logo' => $imagePath
        ];
        $clinicID = Clinics::insertGetId($clinic_data);
     
        $physician_data = [
            'name'    => $request->physicianName,
            'contact' => $request->physicianContact
        ];
        $physicianID = Physicians::insertGetId($physician_data);
        $patient_data = [
            'first_name' => $request->patientFirstName,
            'last_name'  => $request->patientLastName,
            'dob'        => $request->patientDob,
            'contact'    => $request->patientContact
        ];
        $patientID = Patients::insertGetId($patient_data);
        $consultation_data = [
            'clinic_id'          => $clinicID,
            'physician_id'       => $physicianID,
            'patient_id'         => $patientID,
            'chief_complaint'    => $request->chiefComplaint,
            'consulatation_note' => $request->consultationNote
        ];
        
        $consultationID = Consultations::insertGetId($consultation_data);
        if($consultationID){
            $result['consultationID'] = $consultationID;
        }else{
            $result['consultationID'] = NULL;
        }
        return response()->json($result); 
    }
    public function pdf_file($consultationID)
    {
        
    }
    public function viewPrevious()
    {
        $data = Patients::get();
        return response()->json(['datas' => $data]);                
    }
    public function exportCsv(Request $request)
    {
        $fileName = 'patients.csv';
        $patients = Patients::all();

            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array('Patient Name', 'Contact Number', 'Date Of Birth');

            $callback = function() use($patients, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($patients as $patient) {
                    $row['Patient Name']   = $patient->first_name. ' '.$patient->last_name;
                    $row['Contact Number'] = $patient->contact;
                    $row['Date Of Birth']  = $patient->dob;
                    fputcsv($file, array($row['Patient Name'], $row['Contact Number'], $row['Date Of Birth']));
                }

                fclose($file);
            };

        return response()->stream($callback, 200, $headers);
    }
}
