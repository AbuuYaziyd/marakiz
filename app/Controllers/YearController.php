<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hijri;
use App\Models\ActivityLog;
use App\Models\Year;

class YearController extends BaseController
{
    public function index()
    {
        $year = new Year();

        $data['title'] = lang('app.acYear');
        $data['year'] = $year->findAll();
        $data['current'] = $year->where('current!=', null)->first();

        return view('year/index', $data);
    }

    public function change($id)
    {
        // dd($id);
        $year = new Year();
        $act = new ActivityLog();

        $old = $year->where('current', 1)->first();
        $dt = ['current' => null];
        $year->update($old['id'], $dt);

        $new = $year->find($id);
        $dt = ['current' => 1];
        $year->update($new['id'], $dt);

        $act->addActivity(session('id'), 'Academic Year', 'Academic Year wa Changed Successfully!');

        return redirect()->back()->with('type', 'success')->with('text', lang('app.successfully'))->with('title', lang('app.done'));
    }

    public function show($id)
    {
        helper('form');
        
        $year = new Year();

        $data['title'] = lang('app.acYear');
        $data['year'] = $year->find($id);

        return view('year/show', $data);
    }

    public function add()
    {
        helper('form');

        $hjr = new Hijri;

        $data['title'] = lang('app.acYear');
        $data['year'] = date('Y');
        $data['hijri'] = $hjr->strToHijri(date('Y-m-d'), "Y", session('lang'));
        // dd($data);

        return view('year/add', $data);
    }

    public function create()
    {
        // dd($this->request->getVar(''));
        helper('form');

        $act = new ActivityLog();

        $input = $this->validate(
            [   //Rules
                'name' => 'required|min_length[3]|max_length[50]',
            ],
            [   // Errors
                'name' =>
                [
                    'required' => lang('error.required'),
                    'min_length' => lang('error.min_length'),
                    'max_length' => lang('error.max_length'),
                ],
            ]
        );

        if (!$input) {
            $hjr = new Hijri;

            $data['title'] = lang('app.acYear');
            $data['year'] = $hjr->strToHijri(date('Y-m-d'), "Y", session('lang'));
            $data['validation'] = $this->validator;
            
            echo view('year/add', $data);
        } else {

            $year = new Year();

            $data = [
                'name' => $this->request->getVar('name'),
            ];

            // dd($ok);
            $ok = $year->save($data);

            $act->addActivity(session('id'), 'Create New Academic Year', 'New Academic Year was Created Successfully!');

            if ($ok) {
                return redirect()->to('year')->with('type', 'success')->with('text', lang('app.successfully'))->with('title', lang('app.done'));
            }
        }
    }

    public function update()
    {
        // dd($this->request->getVar());

        $year = new Year();
        $act = new ActivityLog();

        $id = $this->request->getVar('id');
        $data = ['name' => $this->request->getVar('name')];
        // dd($id, $data);

        $year->update($id, $data);

        $act->addActivity(session('id'), 'Update Academic Year\' Data', 'Academic Year Data wa Updated Successfully!');

        return redirect()->to('year')->with('type', 'success')->with('text', lang('app.successfully'))->with('title', lang('app.done'));
    }

    public function delete($id)
    {
        $year = new Year();
        $act = new ActivityLog();

        $year->delete($id);

        $act->addActivity(session('id'), 'Delete Academic Year', 'Academic Year wa Deleted Successfully!');

        return redirect()->to('year')->with('type', 'success')->with('text', lang('app.successfully'))->with('title', lang('app.done'));
    }
}
