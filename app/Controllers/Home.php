<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\Gpa;
use App\Models\Khirrij;
use App\Models\Result;
use App\Models\Setting;
use App\Models\Subject;
use App\Models\User;
use App\Models\Website;

class Home extends BaseController
{
    public function index()
    {
        $set = new Setting();
        $web = new Website();

        $mauqii = $set->where('name', 'register')->first();

        $data['title'] = lang('app.welcome');
        $data['carousel'] = $web->where('item', 'carousel')->first();
        $data['hero'] = $web->where('item', 'hero')->findAll();
        $data['email'] = $set->where('name', 'email')->first();
        $data['phone'] = $set->where('name', 'phone')->first();
        $data['markaz'] = $set->where('name', 'name')->first();
        $data['colour'] = $set->where('name', 'colour')->first();
        $data['location'] = $set->where('name', 'location')->first();
        $data['logo'] = $set->where('name', 'logo')->first();
        // dd($data, $mauqii);

        if ($mauqii['link'] != 'checked') {
            return view('home/index', $data);
        } else {
            return view('home/website', $data);
        }
    }

    public function locale($locale)
    {
        // dd($locale);

        $session = session();
        $session->remove('lang');
        $session->set('lang', $locale);
        return redirect()->back();
    }

    function test()
    {
        dd('test');
    }

    function rslt($crs_id, $year_id)
    {
        // dd($crs_id, $year_id);

        $usr = new User();
        $tok = new Website();
        $sub = new Subject();
        $res = new Result();
        $gpa = new Gpa();
        $khr = new Khirrij();
        $adm = new Admin();

        $admin = $adm->findAll();
        dd($admin);

        // ADD STUDENTS
        foreach ($admin as $ad) {
            $username = $usr->studentID();
            $data = [
                'name' => strtoupper($ad['name']),
                'mname' => strtoupper($ad['mname']),
                'lname' => strtoupper($ad['lname']),
                'email' => $username . '@gmail.com',
                'name_ar' => $ad['name_ar'],
                'mname_ar' => $ad['mname_ar'],
                'lname_ar' => $ad['lname_ar'],
                'role' => 'student',
                'fn' => 'student',
                'dob' => date('Y-m-d'),
                'sex' => $ad['sex'],
                'username' => $username,
                'password' => password_hash(strtoupper($ad['lname']), PASSWORD_DEFAULT),
                'level' => 1,
            ];
            $usr->save($data);
        }
        // dd($data, $username);

        // INSERT RESULTS
        $matokeo = $tok->findAll();
        $subjects = $sub->where('course_id', $crs_id)->findAll();
        $students = $usr->where('level', $crs_id)->findAll();
        // $students = $usr->select(['id', 'name_ar', 'lname_ar'])->orderBy('lname_ar', 'asc')->where('level', $crs_id)->findAll();
        dd($matokeo, $subjects, $students);

        // open first year results
        foreach ($matokeo as $dt) {
            $res_fnd = $res->where(['course_id' => $crs_id, 'student_id' => $dt['student_id']])->findAll();
            $student = $usr->find($dt['student_id']);

            if (count($res_fnd) != count($subjects)) {
                foreach ($sub->where('course_id', $crs_id)->findAll() as $sb) {
                    $dataTokeo = [
                        'course_id' => $crs_id,
                        'school_id' => 1,
                        'subject_id' => $sb['id'],
                        'year_id' => $year_id,
                        'username' => $student['username'],
                        'student_id' => $student['id'],
                    ];
                    $res->save($dataTokeo);
                }
                // dd($dataTokeo, $res_fnd);
            }
        }

        // update first year Results
        foreach ($matokeo as $dt) {
            foreach ($subjects as $sb) {
                $result = $res->where([
                    'student_id' => $dt['student_id'],
                    'subject_id' => $sb['id'],
                    'year_id' => $year_id,
                    'course_id' => $crs_id
                ])->first();
                if ($result) {
                    $dataMT = [
                        'course' => $dt['c' . $sb['id']] ?? 0,
                        'final' => $dt['f' . $sb['id']] ?? 0,
                        'course_status' => 'gpa',
                        'final_status' => 'gpa',
                    ];
                    $res->update($result['id'], $dataMT);
                }
            }
        }
        // dd($result, $dataMT);

        // calculate GPA 
        foreach ($matokeo as $dt) {
            $student = $usr->find($dt['student_id']);
            $the_gpa = $gpa->where(['course_id' => $crs_id, 'student_id' => $dt['student_id']])->first();

            if ($the_gpa == null) {
                // Total Marks
                $sub_count = count($subjects);
                $x = ['student_id' => $dt['student_id'], 'course_id' => $crs_id, 'year_id' => $year_id];
                // dd($sub_count);

                $course_mark = $res->where($x)->selectSum('course')->get()->getRow()->course;
                $final_mark = $res->where($x)->selectSum('final')->get()->getRow()->final;
                $total_mark = $course_mark + $final_mark;

                $course_gpa = round(($course_mark / $sub_count), 2);
                $final_gpa = round(($final_mark / $sub_count), 2);
                $total_gpa = round(($total_mark / $sub_count), 2);
                // dd($course_mark, $final_mark, $total_mark, $course_gpa, $final_gpa, $total_gpa);

                $dataGP = [
                    'student_id' => $dt['student_id'],
                    'course_id' => $crs_id,
                    'year_id' => $year_id,
                    'school_id' => 1,
                    'username' => $student['username'],
                    'subjects' => $sub_count,
                    'number_of_students' => count($matokeo),
                    'link' => bin2hex(random_bytes(20)),
                    'course_marks' => $course_mark??0,
                    'final_marks' => $final_mark??0,
                    'marks' => $total_mark,
                    'course_gpa' => $course_gpa,
                    'final_gpa' => $final_gpa,
                    'gpa' => $total_gpa,
                ];
                // dd($dataGP);

                $gpa->save($dataGP);
            }
        }
        // dd($course_mark, $final_mark, $total_mark, $course_gpa, $final_gpa, $total_gpa);
        // dd($dataGP);

        // calculate course position of each student
        $pos_course = $gpa->where(['course_id' => $crs_id, 'year_id' => $year_id, 'course_position' => null])->orderBy('course_marks', 'desc')->findAll();
        $pos_final = $gpa->where(['course_id' => $crs_id, 'year_id' => $year_id, 'course_position' => null])->orderBy('final_marks', 'desc')->findAll();
        $pos_total = $gpa->where(['course_id' => $crs_id, 'year_id' => $year_id, 'course_position' => null])->orderBy('marks', 'desc')->findAll();
        // dd($pos_course, $pos_course, $pos_total);

        foreach ($pos_course as $key => $d) {
            $dtC = ['course_position' => $key + 1];
            $gpa->update($d['id'], $dtC);
        }
        foreach ($pos_final as $key => $d) {
            $dtF = ['final_position' => $key + 1];
            $gpa->update($d['id'], $dtF);
        }
        foreach ($pos_total as $key => $d) {
            $dtT = ['position' => $key + 1];
            $gpa->update($d['id'], $dtT);
        }

        // upgrade students
        foreach ($students as $st) {
            if ($crs_id < 3) {
                $dataUP = ['level' => $crs_id + 1];

                $usr->update($st['id'], $dataUP);
            } else {
                $dataUP = ['level' => 'graduate', 'role' => 'graduate'];
                $usr->update($st['id'], $dataUP);

                $sum_gpa = $gpa->where('student_id', $st['id'])->selectSum('gpa')->get()->getRow()->gpa;
                $gpa_count = $gpa->where('student_id', $st['id'])->findAll();
                $dt = [
                    'student_id' => $st['id'],
                    'year_id' => $year_id,
                    'school_id' => 1,
                    'certificate' => 1,
                    'certificate_no' => $st['username'],
                    'gpa' => $sum_gpa / count($gpa_count),
                ];

                $khr->save($dt);
            }
        }
        dd('careful');
    }

    function rooms()
    {
        $set = new Setting();

        $data['title'] = lang('app.rooms');
        $data['rooms'] = $set->where(['name' => 'room', 'link!=' => null])->findAll();
        // dd($data);

        return view('home/rooms', $data);
    }

    function manifest()
    {
        $set = new Setting();

        $mauqii = $set->where('name', 'name')->first();
        $location = $set->where('name', 'location')->first();
        $logo = $set->where('name', 'logo')->first();
        $colour = $set->where('name', 'colour')->first();
        // dd($name, $location, $logo, $colour);

        if (session('lang') != 'ar') {
            $name = $mauqii['value'];
            $desc = $mauqii['value'] . ', ' . $location['value'];
        } else {
            $name = $mauqii['value_ar'];
            $desc = $mauqii['value_ar'] . '، ' . $location['value_ar'];
        }

        $data = [
            "short_name" => $name,
            "name" => $name,
            "icons" => [
                [
                    "src" => $logo['link'],
                    "type" => "image/png",
                    "sizes" => "512x512"
                ],
                [
                    "src" => $logo['link'],
                    "type" => "image/png",
                    "sizes" => "192x192",
                    "purpose" => "maskable",
                ],
            ],
            "start_url" => "./login",
            "background_color" => $colour['value'],
            "display" => "standalone",
            "theme_color" => $colour['link'],
            "description" => $desc,

        ];
        // dd($data);

        return $this->response->setJSON($data);
    }
}
