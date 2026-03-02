<?php


function checkPermission($permissions){
    $userAccess = getMyPermission(auth()->user()->is_permission);
    foreach ($permissions as $key => $value) {
        if($value == $userAccess){
            return true;
        }
    }
    return false;
}


function getMyPermission($id)
{
    switch ($id) {
        case 1:
            return 'Admin';
            break;
        case 11:
            return 'EBSC_Applied';
            break;
        case 12:
            return 'EBSC_Geo';
            break;
        case 13:
            return 'EBSC_Social';
            break;
        case 14:
            return 'EBSC_Mana';
            break;
        case 15:
            return 'EBSC_Med';
            break;
        case 16:
            return 'EBSC_Agri';
            break;
        case 17:
            return 'EBSC_Tech';
            break;
        case 18:
            return 'EBSC_GS';
            break;
        case 19:
            return 'EBSC_Computing';
            break;
        case 20:
            return 'EBSC_Sport';
            break;
        case 21:
            return 'EBSC_CIKCS';
            break;
        case 2:
            return 'mainStoreClark';
            break;
        case 3:
            return 'viceChancellor';
            break;
        case 4:
            return 'surveyAccess';
            break;

        default:
            return 'student';
            break;
    }
}


?>
