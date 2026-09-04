<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ActivityLog;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\School;
use App\Models\Setting;
use App\Models\User;
use App\Models\Year;

class AttendanceController extends BaseController
{
    public function index()
    {
        $att = new Attendance();
        $sch = new School();
        $crs = new Course();

        $data['title'] = lang('app.attendances');
        $data['attendance'] = $att->select(['student_id', 'id'])->distinct()->where(['status!=' => 1])->orderBy('created_at', 'asc')->findAll();
        $data['school'] = $sch->findAll();
        $data['att'] = $att;
        $data['c'] = $crs;
        // dd($data);

        return view('attendance/index', $data);
    }

    public function create()
    {
        // dd($this->request->getVar());

        $year = new Year();
        $crs = new Course();
        $act = new ActivityLog();
        $att = new Attendance();

        $year = $year->where('current!=', null)->first();
        $course = $crs->find($this->request->getVar('course_id'));
        // dd($year, $course);

        $count = count($this->request->getVar('student_id'));
        // dd($count);

        if ($count != null) {
            for ($i = 0; $i < $count; $i++) {

                $status = 'status' . $i;
                // dd($status);

                if ($this->request->getVar($status) != 1) {
                    $data = [
                        'student_id'    => $this->request->getVar('student_id')[$i],
                        'sex'           => $this->request->getVar('sex')[$i],
                        'status'        => $this->request->getVar($status),
                        'year_id'       => $year['id'],
                        'date'          => date('Y-m-d'),
                        'school_id'     => $course['school_id'],
                        'teacher_id'    => session('id'),
                        'course_id'     => $course['id'],
                    ];
                    // dd($data);

                    $att->save($data);
                }
            }
            // dd($data);
        }

        $act->addActivity(session('id'), 'Class Attendance wa Taken', 'Class ' . $course['name'] . ' Attendance was Taken Successfully!');
        
        return redirect()->back()->with('type', 'success')->with('text', lang('app.successfully'))->with('title', lang('app.done'));
    }

    public function update()
    {
        // dd($this->request->getVar());

        $att = new Attendance();
        $yer = new Year();
        $crs = new Course();

        $count = count($this->request->getVar('id'));
        // dd($count);

        for ($i = 0; $i < $count; $i++) {

            $status = 'status' . $i;

            $id = $this->request->getVar('id')[$i];
            // dd($id);

            $data = [
                'teacher_id' => session('id'),
                'status' => $this->request->getVar($status),
            ];
            // dd($data);

            $att->update($id, $data);
        }

        $year = $yer->where('current!=', null)->first();
        $course = $crs->find($this->request->getVar('course_id'));
        $count_new = count($this->request->getVar('student_id'));
        // dd($count_new, $year, $course);

        if ($count != null) {
            for ($i = 0; $i < $count; $i++) {

                $status = 'status' . $i;
                // dd($status);

                if ($this->request->getVar($status) != 1) {
                    $data = [
                        'student_id'    => $this->request->getVar('student_id')[$i],
                        'sex'           => $this->request->getVar('sex')[$i],
                        'status'        => $this->request->getVar($status),
                        'year_id'       => $year['id'],
                        'date'          => date('Y-m-d'),
                        'school_id'     => $course['school_id'],
                        'teacher_id'    => session('id'),
                        'course_id'     => $course['id'],
                    ];
                    // dd($data);

                    $att->save($data);
                }
            }
        }

        return redirect()->back()->with('type', 'success')->with('text', lang('app.successfully'))->with('title', lang('app.done'));
    }

    function student($id)
    {
        helper('form');

        $att = new Attendance();
        $year = new Year();
        $usr = new User();

        $yr = $year->where('current!=', null)->first();
        $user = $usr->find($id);

        $data['title'] = lang('app.attendance');
        $data['year'] = substr($yr['name'], 0, -3);
        $data['att'] = $att;
        $data['day'] = $att->where(['student_id' => $id, 'date' => date('Y-m-d')])->findAll();
        $data['notPresent'] = $att->where(['student_id' => $id, 'status!=' => 1])->findAll();
        $data['date'] = date('Y-m-d');
        $data['user'] = $user;
        // dd($data);

        return view('attendance/student', $data);
    }

    function date()
    {
        helper('form');

        // dd($this->request->getVar());

        $att = new Attendance();
        $year = new Year();
        $usr = new User();

        $id = $this->request->getVar('student_id');
        $date = $this->request->getVar('date');
        $yr = $year->where('current!=', null)->first();
        $user = $usr->find($id);
        // dd($user);

        $data['title'] = lang('app.attendance');
        $data['year'] = substr($yr['name'], 0, -3);
        $data['att'] = $att;
        $data['day'] = $att->where(['student_id' => $id, 'date' => $date])->first();
        $data['notPresent'] = $att->where(['student_id' => $id, 'status!=' => 1])->findAll();
        $data['date'] = $date;
        $data['user'] = $user;
        // dd($data);

        return view('attendance/student', $data);
    }

    public function course($sex, $id)
    {
        helper('form');

        $cls = new Course();
        $sch = new School();
        $yr = new Year();
        $usr = new User();
        $att = new Attendance();

        $class = $cls->find($id);

        $data['title'] = lang('app.advancedSettings');
        $data['class'] = $class;
        $data['att'] = $att;
        $data['sch'] = $sch->find($class['school_id']);
        $data['yr'] = $yr->where('current', 1)->first();
        $data['std'] = $usr->where(['level' => $id, 'fn' => 'student', 'sex' => $sex])->findAll();
        $data['query'] = $att->where(['date' => date('Y-m-d'), 'course_id' => $id, 'sex' => $sex])->findAll();
        // dd($data);

        return view('attendance/course', $data);
    }

    public function data($id, $month)
    {
        $cls = new Course();
        $sch = new School();
        $yr = new Year();
        $usr = new User();
        $att = new Attendance();
        $set = new Setting();

        $class = $cls->find($id);
        $year = $yr->where('current', 1)->first();
        if (session('lang') != 'ar') {
            $order = 'name';
        } else {
            $order = 'name_ar';
        }

        $data['title'] = lang('app.attendances');
        $data['class'] = $class;
        $data['att'] = $att;
        $data['month'] = $month;
        $data['school'] = $sch->find($class['school_id']);
        $data['year'] = $year;
        $data['weekend'] = $set->where('name', 'weekend')->first();
        $data['students'] = $usr->where(['level' => $id, 'fn' => 'student'])->orderBy($order, 'asc')->findAll();
        // dd($data);

        return view('attendance/data', $data);     
    }

    function appeal($id)
    {
        helper('form');

        $att = new Attendance();
        $year = new Year();
        $usr = new User();

        $yr = $year->where('current!=', null)->first();
        $app = $att->find($id);
        $user = $usr->find($app['student_id']);

        $data['title'] = lang('app.attendance');
        $data['year'] = substr($yr['name'], 0, -3);
        $data['att'] = $att;
        $data['day'] = $app;
        $data['date'] = date('Y-m-d', strtotime($app['date']));
        $data['user'] = $user;
        // dd($data);

        return view('attendance/appeal', $data);
    }

    function submitAppeal()
    {
        // dd($this->request->getFile('file'));
        // dd($this->request->getVar());

        helper('form');

        $usr = new User();
        $att = new Attendance();
        $year = new Year();

        $file = $this->request->getFile('file');
        $id = $this->request->getVar('id');
        $app = $att->find($id);
        $user = $usr->find($app['student_id']);

        $input = $this->validate(
            [   //Rules
                'reason' => 'required',
                'file' => 'uploaded[file]',
            ],
            [   // Errors
                'reason' =>
                [
                    'required' => lang('error.required'),
                ],
                'file' =>
                [
                    'required' => lang('error.uploaded'),
                ],
            ]
        );

        // dd($input);
        if (!$input) {
            $data['title'] = lang('app.attendance');
            $data['validation'] = $this->validator;

            $yr = $year->where('current!=', null)->first();
            $app = $att->find($id);
            $user = $usr->find($app['student_id']);

            $data['title'] = lang('app.attendance');
            $data['year'] = substr($yr['name'], 0, -3);
            $data['att'] = $att;
            $data['day'] = $app;
            $data['date'] = date('Y-m-d', strtotime($app['date']));
            $data['user'] = $user;
            // dd($data);

            echo view('attendance/appeal', $data);
        } else {
            // dd(file_exists($app['file']));
            if (file_exists($app['file'])) {
                unlink($app['file']);
            }

            $ext = $file->getClientExtension();
            $name = time() . $user['id'] . '.' . $ext;
            // dd($name);

            $dataFILE = [
                'file' => 'public/attendance/' . $name,
                'reason' => $this->request->getVar('reason'),
            ];
            // dd($dataFILE);

            $file->move('public/attendance/', $name);
            $att->update($id, $dataFILE);

            return redirect()->to('attendance/student/' . $user['id'])->with('type', 'success')->with('text', lang('app.successfully'))->with('title', lang('app.done'));
        }
    }

    function reply($id)
    {
        $att = new Attendance();
        $year = new Year();
        $usr = new User();

        $yr = $year->where('current!=', null)->first();
        $app = $att->find($id);
        $user = $usr->find($app['student_id']);

        $data['title'] = lang('app.attendance');
        $data['year'] = substr($yr['name'], 0, -3);
        $data['att'] = $att;
        $data['day'] = $app;
        $data['date'] = date('Y-m-d', strtotime($app['date']));
        $data['user'] = $user;
        // dd($data);

        return view('attendance/reply', $data);
    }

    function accept($id)
    {
        $att = new Attendance();

        $app = $att->find($id);

        $data = ['reply' => 1];

        $att->update($id, $data);

        return redirect()->to('admin')->with('type', 'success')->with('text', lang('app.successfully'))->with('title', lang('app.done'));
    }

    function dismiss($id)
    {
        $att = new Attendance();

        $app = $att->find($id);

        $data = ['reply' => 0];

        $att->update($id, $data);

        return redirect()->to('admin')->with('type', 'success')->with('text', lang('app.successfully'))->with('title', lang('app.done'));
    }

    function delete($id)
    {
        $att = new Attendance();

        $app = $att->find($id);

        // dd(file_exists($app['file']));
        if (file_exists($app['file'])) {
            unlink($app['file']);
        }

        $data = [
            'reply' => null,
            'reason' => null,
            'file' => null,
        ];

        $att->update($id, $data);

        return redirect()->to('admin')->with('type', 'success')->with('text', lang('app.successfully'))->with('title', lang('app.done'));
    }
}
