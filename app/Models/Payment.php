<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    const PAYAMOUNT = 1500;

    const COUNT = 1;

    const CARDAPIUSERNAME = '74s42b7Th7Hp';
    const CARDAPITRANSACTION  = '2hYEY8eNA4Z5n39p';


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payment_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'application_id', 'amount', 'response_code', 'transaction_id', 'auth_id', 'quantity', 'message_code', 'name_on_card', 'promo_code', 'promo_amount', 'final_amount', 'student_name', 'student_email', 'student_dob', 'student'
    ];
}
