<?php

namespace App\Exports;

use App\Models\Convocation;
use App\Models\StudentRegistration;
// use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SurveyExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
//    public function collection()
//    {
//        return StudentRegistration::all();
//    }
    use Exportable;

    public function __construct(string $convocationName)
    {
        $this->convocationName = $convocationName;
    }

    public function view(): View
    {

        $convo = Convocation::all()->pluck('convocation', 'id');
//
//        return view('studentRegistration.table', [
//            'studentRegistrations' => StudentRegistration::all()
//        ]);

        return view('survey.table', [
            'survey_responses' => SurveyResponse::query()
                ->where('convocationName',$convo[$this->convocationName])
                ->get()
        ]);
    }
}
