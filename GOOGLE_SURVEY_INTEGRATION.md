# Google Form Survey Integration

## Overview

This system allows students to complete a Google Form survey and tracks their completion status in the application.

## Features

### 1. Survey Status Tracking

-   Students see different messages based on whether they've completed the survey
-   **Before completion**: "Please complete the survey" with a "Submit Survey" button
-   **After completion**: "✅ You have successfully completed the survey!" with completion timestamp

### 2. Survey Completion Flow

1. Student clicks "Submit Survey" button
2. System redirects to a survey completion page
3. Student clicks "Open Google Form Survey" to open the form in a new tab
4. Student completes the Google Form
5. Student returns to the completion page
6. Student clicks "I Have Completed the Survey" to confirm completion
7. System marks the survey as completed and redirects back to registration page

### 3. Database Changes

New columns added to `survey_responses` table:

-   `google_form_completed` (boolean): Tracks if Google Form was completed
-   `google_form_completed_at` (timestamp): When the completion was marked

### 4. New Routes

-   `/submit-google-survey` - Shows the survey completion page
-   `/mark-survey-completed` (POST) - Marks survey as completed
-   `/check-survey-status` - API endpoint to check survey status
-   `/reset-survey-completion` (POST) - Admin route to reset completion status

### 5. Updated Controllers

**SurveyController** new methods:

-   `submitGoogleSurvey()` - Shows survey completion page
-   `markSurveyCompleted()` - Marks survey as completed
-   `checkGoogleFormSurvey()` - Static method to check completion status
-   `checkSurveyStatus()` - API method for AJAX status checks
-   `resetSurveyCompletion()` - Admin method to reset status

### 6. Updated Views

**eligibleStd.blade.php**:

-   Shows different messages based on survey completion
-   Displays completion timestamp when survey is completed
-   Links to new survey completion flow

**survey/return.blade.php** (new):

-   Interactive page for completing the survey
-   Clear instructions for students
-   Confirmation button with JavaScript validation

## Faculty Restrictions

The survey requirement applies to all faculties EXCEPT:

-   Graduate Studies
-   Indigenous Knowledge & Community Studies
-   Agricultural Sciences (as per original code)
-   Management Studies (as per original code)
-   Social Sciences & Languages (as per original code)
-   Medicine (as per original code)

## Usage

### For Students

1. Login to the registration system
2. If eligible and registration is pending/accepted, they'll see survey status
3. If not completed, click "Submit Survey"
4. Follow the instructions to complete the Google Form
5. Return and confirm completion

### For Administrators

-   Survey completion status is tracked in the `survey_responses` table
-   Use `/reset-survey-completion` route to reset a student's completion status if needed
-   Export functionality includes the survey completion tracking

## Technical Notes

-   The system creates a minimal record in `survey_responses` table when marking Google Form completion
-   Uses proper validation and error handling
-   Includes JavaScript confirmation to prevent accidental submissions
-   Responsive design for mobile and desktop users
-   Maintains backward compatibility with existing survey system
