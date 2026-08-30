<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hijri;
use App\Models\Academy;
use App\Models\Course;
use App\Models\Gpa;
use App\Models\Khirrij;
use App\Models\School;
use App\Models\Subject;
use App\Models\User;
use App\Models\Year;

class KhirrijController extends BaseController
{
    public function index()
    {
        $khr = new Khirrij();
        $usr = new User();
        $yr = new Year();
        $hjr = new Hijri;

        $data['title'] = lang('app.graduates');
        $data['std'] = $usr->where(['role' => 'graduate', 'fn' => 'student', 'level' => 'graduate'])->orderBy('name_ar', 'ASC')->findAll();
        $data['year'] = $yr->findAll();
        $data['yr'] = $khr->select('year_id')->distinct()->findAll();
        $data['khr'] = $khr;
        $data['hjr'] = $hjr;
        // dd($data);

        return view('khirrij/index', $data);
    }

    /*
    * Search graduates on the DB based on the provided year_id
    */
    public function year($id)
    {
        $khr = new Khirrij();
        $yr = new Year();
        $hjr = new Hijri;

        $data['title'] = lang('app.graduates');
        $data['std'] = $khr->where('year_id', $id)->findAll();
        $data['year'] = $yr->findAll();
        $data['yr'] = $khr->select('year_id')->distinct()->findAll();
        $data['khr'] = $khr;
        $data['yr_id'] = $id;
        $data['hjr'] = $hjr;
        // dd($data);

        return view('khirrij/year', $data);
    }

    /*
    * Show graduate Data
    */
    public function show($id)
    {
        $usr = new User();
        $crs = new Course();
        $sub = new Subject();
        $khr = new Khirrij();
        $gpa = new Gpa();
        $sch = new School();

        $khirrij = $khr->find($id);
        $user = $usr->find($khirrij['student_id']);
        // dd($user, $id, $khirrij);

        $data['title'] = lang('app.graduate');
        $data['stu'] = $user;
        $data['school'] = $sch->find($khirrij['school_id']);
        $data['c'] = $crs;
        $data['s'] = $sub;
        $data['gpa'] = $gpa->where('student_id', $id)->findAll();
        // dd($data, $id);

        return view('khirrij/show', $data);
    }
}
