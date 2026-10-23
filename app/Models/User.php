<?php

namespace App\Models;

use App\Libraries\Hijri;
use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'mname',
        'lname',
        'email',
        'name_ar',
        'mname_ar',
        'lname_ar',
        'kun_yah',
        'kun_yah_ar',
        'role',
        'fn',
        'dob',
        'sex',
        'phone',
        'username',
        'password',
        'address',
        'nationality',
        'avatar',
        'level',
        'web',
        'info',
        'twitter',
        'insta',
        'facebook',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function teacherID()
    {
        $usr = new User();
        $set = new Setting();

        $query = $usr->where('fn', 'teacher')->orderBy('id', 'desc')->first();
        $reg = 1 . sprintf('%02s', $set->where('name', 'register')->first()['value']);
        // dd($query, $reg);

        if ($query != null) {
            $no = substr($query['username'], 3, 6);
            // dd($no);

            if ($no >= 9999) {
                $username = $reg . sprintf('%03s', 1);
            } else {
                $invc = $no + 1;
                $username = $reg . sprintf('%03s', $invc);
            }
        } else {
            $username = $reg . sprintf('%03s', 1);
        }
        // dd($username);

        return $username;
    }

    function studentID()
    {
        $usr = new User();
        $hjr = new Hijri();
        $set = new Setting();

        $query = $usr->where('fn', 'student')->orderBy('id', 'desc')->first();
        $hijri = $hjr->GeToHijr(date('d'), date('m'), date('Y'));
        $reg = sprintf('%02s', $set->where('name', 'register')->first()['value']);
        // dd($hijri, $query, $reg);

        if ($query != null) {
            $no = substr($query['username'], 6, 10);
            // dd($no >= 9999);

            if ($no >= 9999) {
                $username = substr($hijri['year'], 2) . sprintf('%02s', $hijri['month']) . $reg . sprintf('%04s', 1);
            } else {
                $invc = $no + 1;
                $username = substr($hijri['year'], 2) . sprintf('%02s', $hijri['month']) . $reg . sprintf('%04s', $invc);
            }
        } else {
            $username = substr($hijri['year'], 2) . sprintf('%02s', $hijri['month']) . $reg . sprintf('%04s', 1);
        }
        // dd($username);

        return $username;
    }

    function city($id)
    {
        $ct = new City();
        return $ct->find($id);
    }

    function generatePassword()
    {
        $lowercase = str_split('abcdefghijklmnopqrstuvwxyz');
        $uppercase = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $numbers   = str_split('0123456789');
        $special   = str_split('!@#$%^&*()-_=+[]{}|;:,.<>?');

        // Inline helper to securely pull and remove an item from any array pool
        $pull = function (array &$pool) {
            return array_splice($pool, random_int(0, count($pool) - 1), 1)[0];
        };

        // --- ZONE 1: 4 Unique Letters (Guarantees 1 lower, 1 upper, then 2 random letters) ---
        $letters = [$pull($lowercase), $pull($uppercase)];
        $letterPool = array_merge($lowercase, $uppercase);
        while (count($letters) < 4) {
            $letters[] = $pull($letterPool);
        }

        // --- ZONE 2: 4 Unique Numbers + 1 Symbol ---
        $mix = [$pull($special)];
        while (count($mix) < 5) {
            $mix[] = $pull($numbers);
        }

        // Securely shuffle both zones internally using Fisher-Yates
        foreach ([&$letters, &$mix] as &$zone) {
            for ($i = count($zone) - 1; $i > 0; $i--) {
                $j = random_int(0, $i);
                [$zone[$i], $zone[$j]] = [$zone[$j], $zone[$i]];
            }
        }

        $password = implode('', array_merge($letters, $mix));

        return $password;
    }
}
