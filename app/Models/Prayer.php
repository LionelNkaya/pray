<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Prayer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'content'
    ];

    /* 
    Creating functions to encrypt and decrypt the content of a prayer
    before storing it or retrieving it from the database.
     */

    // Encrypt the 'content' attribute when setting it
    public function setContentAttribute($value)
    {
        $this->attributes['content'] = Crypt::encryptString($value);
    }

     // Decrypt the 'content' attribute when getting it
     public function getContentAttribute($value)
     {
         try {
             return Crypt::decryptString($value);
         } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
             // Handle decryption failure here (e.g., return an error message or default value)
             return 'Decryption Error';
         }
     }


}
