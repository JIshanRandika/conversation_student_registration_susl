<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    use HasFactory;
    protected $table = 'survey_responses';

protected $fillable = [

        'regNum',
        'email',
        'contactNumber',
        'gender',
        'age',
        'al_stream',
        'al_district',
        'al_zscore',
        'al_year',
        'ol_english',
        'al_english',
        'faculty',
        'department',
        'degree_programme',
        'degree_type',
        'medium',
        'class_obtained',
        'eng_speaking',
        'eng_listening',
        'eng_writing',
        'eng_reading',
        'computer_literacy_level',
        'abilities',
        'internship_yesno',
        'internship_duration',
        'internship_graded',
        'internship_semester',
        'other_courses_yesno',
        'other_course_type',
        'other_course_completed',
        'other_course_field',
        'extra_activities_yesno',
        'extra_activities',        
        'employment_status',
        'employment_type',
        'employment_permanence',
        'employer_sector',
        'employer_name',
        'occupation_category',
        'job_economic_sector',
        'when_found_job',
        'job_field_match',
        'use_skills',
        'outside_field_due',
        'salary_expectation',
        'gross_salary',
        'career_growth_sat',
        'consider_change',
        'unemp_reasons',
        'unemp_reasons_other',
        'future_employment_type',
        'expected_sector',
        'took_steps',
        'job_search_steps',        
        'job_search_steps_other',
        'reservation_wage',
        'expected_occupation',
        'expected_job_economic_sector',
        'job_search_duration',
        'career_goals',
        'career_goals_other',
        'university_satisfaction',
        'dissatisfaction_reasons',
        'teaching_methods',
        'learning_process',
        'lecturer_quality',
        'lab_facilities',
        'classroom_quality',
        'library_facilities',
        'it_facilities',
        'workload',
        'last_university_exam',
        'facilitate_employment',
        'other_comments',

        'convocationName',
];

// public function setAbilitiesAttribute($value) {
//     $this->attributes['abilities'] = json_encode($value);
// }

// public function getAbilitiesAttribute($value) {
//     return $this->attributes['abilities'] = json_decode($value);
// }

// // For unemp_reasons
// public function setUnempReasonsAttribute($value) {
//     $this->attributes['unemp_reasons'] = json_encode($value);
// }

// public function getUnempReasonsAttribute($value) {
//     return $this->attributes['unemp_reasons'] = json_decode($value);
// }

// // For job_search_steps
// public function setJobSearchStepsAttribute($value) {
//     $this->attributes['job_search_steps'] = json_encode($value);
// }

// public function getJobSearchStepsAttribute($value) {
//     return $this->attributes['job_search_steps'] = json_decode($value);
// }

// // For career_goals
// public function setCareerGoalsAttribute($value) {
//     $this->attributes['career_goals'] = json_encode($value);
// }

// public function getCareerGoalsAttribute($value) {
//     return $this->attributes['career_goals'] = json_decode($value);
// }

public function setCategoryAttribute($value)
    {
        $this->attributes['category'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['category'] = json_decode($value);
    }



}
