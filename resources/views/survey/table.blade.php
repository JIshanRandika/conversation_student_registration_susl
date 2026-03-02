<table>
    <thead>
        <tr>
            <th>Registration Number</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Gender</th>
            <th>Age</th>
            <th>AL Stream</th>
            <th>AL District</th>
            <th>AL Zscore</th>
            <th>AL Year</th>
            <th>OL English Grade</th>
            <th>AL English Grade</th>
            <th>Faculty</th>
            <th>Department</th>
            <th>Degree Programme</th>
            <th>Degree Type</th>
            <th>Medium</th>
            <th>Class Obtained</th>
            <th>English Speaking</th>
            <th>English Listening</th>
            <th>English Writing</th>
            <th>English Reading</th>
            <th>Computer Literacy</th>
            <th>Computer Abilities</th>
            <th>Internship</th>
            <th>Internship Duration</th>
            <th>Internship Graded</th>
            <th>Internship Semester</th>
            <th>Other Courses</th>
            <th>Course Type</th>
            <th>Course Completed</th>
            <th>Course Field</th>
            <th>Involved in Extracurricular Activities</th>
            <th>Extra Activities</th>
            <th>Employment Status</th>
            <th>Employment Type</th>
            <th>Employment Permanence</th>
            <th>Employer Sector</th>
            <th>Institution Name</th>
            <th>Occupation Category</th>
            <th>Economic Sector</th>
            <th>Job Finding Time</th>
            <th>Job Field Match</th>
            <th>Use of Skills</th>
            <th>Outside Field Due</th>
            <th>Salary Expectation</th>
            <th>Gross Salary</th>
            <th>Career Growth</th>
            <th>Consider Change</th>
            <th>Unemployment Reasons</th>
            <th>Other Unemployment Reasons</th>
            <th>Expected Employment Type</th>
            <th>Expected Sector</th>
            <th>Job Search Steps</th>
            <th>Other Job Search Steps</th>
            <th>Job Search Methods</th>
            <th>Reservation Wage</th>
            <th>Expected Occupation</th>
            <th>Expected Economic Sector</th>
            <th>Job Search Duration</th>
            <th>Career Goals</th>
            <th>Other Career Goals</th>
            <th>University Satisfaction</th>
            <th>Dissatisfaction Reasons</th>
            <th>Teaching Methods</th>
            <th>Learning Process</th>
            <th>Lecturer Quality</th>
            <th>Lab Facilities</th>
            <th>Classroom Quality</th>
            <th>Library Facilities</th>
            <th>IT Facilities</th>
            <th>Workload</th>
            <th>Last Exam Date</th>
            <th>Employment Facilitation</th>
            <th>Other Comments</th>
            <th>Convocation Name</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($survey_responses as $survey_response)
        <tr>
            <td>{{ $survey_response->regNum }}</td>
            <td>{{ $survey_response->email }}</td>
            <td>{{ $survey_response->contactNumber }}</td>
            <td>{{ $survey_response->gender }}</td>
            <td>{{ $survey_response->age }}</td>
            <td>{{ $survey_response->al_stream }}</td>
            <td>{{ $survey_response->al_district }}</td>
            <td>{{ $survey_response->al_zscore }}</td>
            <td>{{ $survey_response->al_year }}</td>
            <td>{{ $survey_response->ol_english }}</td>
            <td>{{ $survey_response->al_english }}</td>
            <td>{{ $survey_response->faculty }}</td>
            <td>{{ $survey_response->department }}</td>
            <td>{{ $survey_response->degree_programme }}</td>
            <td>{{ $survey_response->degree_type }}</td>
            <td>{{ $survey_response->medium }}</td>
            <td>{{ $survey_response->class_obtained }}</td>
            <td>{{ $survey_response->eng_speaking }}</td>
            <td>{{ $survey_response->eng_listening }}</td>
            <td>{{ $survey_response->eng_writing }}</td>
            <td>{{ $survey_response->eng_reading }}</td>
            <td>{{ $survey_response->computer_literacy_level }}</td>
            <td>{{ $survey_response->abilities }}</td>
            <td>{{ $survey_response->internship_yesno }}</td>
            <td>{{ $survey_response->internship_duration }}</td>
            <td>{{ $survey_response->internship_graded }}</td>
            <td>{{ $survey_response->internship_semester }}</td>
            <td>{{ $survey_response->other_courses_yesno }}</td>
            <td>{{ $survey_response->other_course_type }}</td>
            <td>{{ $survey_response->other_course_completed }}</td>
            <td>{{ $survey_response->other_course_field }}</td>
            <td>{{ $survey_response->extra_activities_yesno }}</td>
            <td>{{ $survey_response->extra_activities }}</td>
            <td>{{ $survey_response->employment_status }}</td>
            <td>{{ $survey_response->employment_type }}</td>
            <td>{{ $survey_response->employment_permanence }}</td>
            <td>{{ $survey_response->employer_sector }}</td>
            <td>{{ $survey_response->employer_name }}</td>
            <td>{{ $survey_response->occupation_category }}</td>
            <td>{{ $survey_response->job_economic_sector }}</td>
            <td>{{ $survey_response->when_found_job }}</td>
            <td>{{ $survey_response->job_field_match }}</td>
            <td>{{ $survey_response->use_skills }}</td>
            <td>{{ $survey_response->outside_field_due }}</td>
            <td>{{ $survey_response->salary_expectation }}</td>
            <td>{{ $survey_response->gross_salary }}</td>
            <td>{{ $survey_response->career_growth_sat }}</td>
            <td>{{ $survey_response->consider_change }}</td>
            <td>{{ $survey_response->unemp_reasons }}</td>
            <td>{{ $survey_response->unemp_reasons_other }}</td>
            <td>{{ $survey_response->future_employment_type }}</td>
            <td>{{ $survey_response->expected_sector }}</td>
            <td>{{ $survey_response->took_steps }}</td>
            <td>{{ $survey_response->job_search_steps }}</td>
            <td>{{ $survey_response->job_search_steps_other }}</td>
            <td>{{ $survey_response->reservation_wage }}</td>
            <td>{{ $survey_response->expected_occupation }}</td>
            <td>{{ $survey_response->expected_job_economic_sector }}</td>
            <td>{{ $survey_response->job_search_duration }}</td>
            <td>{{ $survey_response->career_goals }}</td>
            <td>{{ $survey_response->career_goals_other }}</td>
            <td>{{ $survey_response->university_satisfaction }}</td>
            <td>{{ $survey_response->dissatisfaction_reasons }}</td>
            <td>{{ $survey_response->teaching_methods }}</td>
            <td>{{ $survey_response->learning_process }}</td>
            <td>{{ $survey_response->lecturer_quality }}</td>
            <td>{{ $survey_response->lab_facilities }}</td>
            <td>{{ $survey_response->classroom_quality }}</td>
            <td>{{ $survey_response->library_facilities }}</td>
            <td>{{ $survey_response->it_facilities }}</td>
            <td>{{ $survey_response->workload }}</td>
            <td>{{ $survey_response->last_university_exam }}</td>
            <td>{{ $survey_response->facilitate_employment }}</td>
            <td>{{ $survey_response->other_comments }}</td>
            <td>{{ $survey_response->convocationName }}</td>
            <td>{{ $survey_response->created_at }}</td>
            <td>{{ $survey_response->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
