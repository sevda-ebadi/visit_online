<?php


function checkGender($status) {
    switch ($status) {
        case 0 : {
            return 'زن';
            break;
        }
        case 1 : {
            return 'مرد';
            break;
        }
    }
}

function checkVisitStatus($status) {
    switch ($status) {
        case 1 : {
            return 'در انتظار';
            break;
        }
        case 2 : {
            return 'لغو شده';
            break;
        }
        case 3 : {
            return 'به تاخیر افتاده';
            break;
        }
        case 4 : {
            return 'تکمیل شده';
            break;
        }
        case 5 : {
            return 'به زمان دیگری موکول شده';
            break;
        }
    }
}
