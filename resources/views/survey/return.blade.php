@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h4><i class="fas fa-clipboard-list"></i> Complete Survey</h4>
                </div>
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-clipboard-check fa-5x text-primary mb-3"></i>
                        <h5>Complete the Survey</h5>
                        <p class="text-muted">
                            Please complete the Google Form survey by following the steps below.
                        </p>
                        
                        <div class="alert alert-info text-left">
                            <h6><i class="fas fa-info-circle"></i> Instructions:</h6>
                            <ol class="mb-0">
                                <li>Click the "Open Google Form Survey" button below</li>
                                <li>Complete and submit the survey in the popup window</li>
                                <li><strong>After submitting, you will see a "Thank you" message from Google</strong></li>
                                <li>Close the popup window to return here</li>
                                <li>Click "I Have Completed the Survey" button</li>
                            </ol>
                        </div>
                        
                        <div class="mb-3">
                            <button onclick="openSurveyPopup()" class="btn btn-primary btn-lg" id="openSurveyBtn">
                                <i class="fas fa-external-link-alt"></i> Open Google Form Survey
                            </button>
                        </div>
                    </div>

                    <div class="border-top pt-4">
                        <h6 class="text-muted mb-3">After completing the survey, click below:</h6>
                        
                        <form action="{{ route('markSurveyCompleted') }}" method="POST" onsubmit="return confirmSurveyCompletion()">
                            @csrf
                            <input type="hidden" name="regNum" value="{{ Auth::user()->regNum }}">
                            
                            <div class="alert alert-secondary">
                                <strong>Registration Number:</strong> {{ Auth::user()->regNum }}<br>
                                <strong>Name:</strong> {{ Auth::user()->name }}
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success btn-lg" id="confirmBtn">
                                    <i class="fas fa-check"></i> I Have Completed the Survey
                                </button>
                            </div>
                        </form>

                        <div class="mt-3">
                            <a href="{{ route('eligibleStd') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to Registration Page
                            </a>
                        </div>
                    </div>
                    
                    <div class="alert alert-warning mt-4">
                        <small>
                            <strong>Important:</strong> Only click "I Have Completed the Survey" if you have actually 
                            completed and submitted the Google Form survey. This action will mark your 
                            survey as completed in our system.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openSurveyPopup() {
    // Open Google Form in a popup window
    const popup = window.open(
        'https://forms.gle/GHfDEB253DfGG6LM9',
        'surveyPopup',
        'width=800,height=700,scrollbars=yes,resizable=yes,location=yes,menubar=no,toolbar=no,status=no'
    );
    
    // Focus on the popup window
    if (popup) {
        popup.focus();
        
        // Visual feedback for the user
        document.getElementById('confirmBtn').style.backgroundColor = '#28a745';
        document.getElementById('confirmBtn').style.borderColor = '#28a745';
        
        // Show helpful message
        showPopupMessage();
        
        // Monitor popup closure
        const checkClosed = setInterval(function() {
            if (popup.closed) {
                clearInterval(checkClosed);
                showReturnMessage();
            }
        }, 1000);
    } else {
        // Popup blocked - fallback to new tab
        alert('Popup was blocked by your browser. Opening in a new tab instead.');
        window.open('https://forms.gle/GHfDEB253DfGG6LM9', '_blank');
    }
}

function showPopupMessage() {
    // Create a temporary message
    const messageDiv = document.createElement('div');
    messageDiv.className = 'alert alert-info mt-3';
    messageDiv.innerHTML = `
        <i class="fas fa-info-circle"></i> 
        <strong>Survey opened in popup window!</strong><br>
        Complete the survey and close the popup when finished, then click "I Have Completed the Survey" below.
    `;
    
    // Insert after the button
    const buttonDiv = document.querySelector('#openSurveyBtn').closest('.mb-3');
    buttonDiv.insertAdjacentElement('afterend', messageDiv);
    
    // Remove message after 10 seconds
    setTimeout(() => {
        messageDiv.remove();
    }, 10000);
}

function showReturnMessage() {
    // Show message when popup is closed
    const messageDiv = document.createElement('div');
    messageDiv.className = 'alert alert-success mt-3';
    messageDiv.innerHTML = `
        <i class="fas fa-check-circle"></i> 
        <strong>Survey window closed!</strong><br>
        If you completed the survey, please click "I Have Completed the Survey" below to continue.
    `;
    
    // Insert before the form
    const formDiv = document.querySelector('form');
    formDiv.insertAdjacentElement('beforebegin', messageDiv);
    
    // Highlight the confirmation button
    document.getElementById('confirmBtn').style.animation = 'pulse 2s infinite';
    
    // Remove message after 15 seconds
    setTimeout(() => {
        messageDiv.remove();
        document.getElementById('confirmBtn').style.animation = '';
    }, 15000);
}

function confirmSurveyCompletion() {
    return confirm('Have you completed and submitted the Google Form survey?\n\nYou should have seen a confirmation message from Google after submitting.\n\nClick OK only if you have successfully submitted the survey.');
}

// Track if user clicked on survey button
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('openSurveyBtn').addEventListener('click', function() {
        // Visual feedback
        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Opening Survey...';
        
        setTimeout(() => {
            this.innerHTML = '<i class="fas fa-external-link-alt"></i> Open Google Form Survey';
        }, 2000);
    });
});
</script>

<style>
@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(40, 167, 69, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(40, 167, 69, 0);
    }
}
</style>
@endsection
