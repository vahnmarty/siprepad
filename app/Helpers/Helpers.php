<?php

namespace App\Helpers;

use App\Models\Global_Notifiable;
use App\Models\GlobalRegisterable;
use App\Models\GlobalStudentTransfer;
class Helper
{
    public static function getGlobalNotifiable()
    {
        $getnotification = Global_Notifiable::get('notifiable')->first();
        return $notifications = $getnotification->notifiable;
    }
    public static function getGlobalRegisterable()
    {
        $register = GlobalRegisterable::select('registerable')->first();
        return $registerable = $register->registerable;
    }
    public static function getGlobalStudentTransfer()

    {
        $student_transfer = GlobalStudentTransfer::select('student_transfer')->first();
        return $student_transfer->student_transfer;
    }
}
