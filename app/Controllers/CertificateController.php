<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\City;
use App\Models\Khirrij;
use App\Models\School;
use App\Models\Setting;
use App\Models\User;

class CertificateController extends BaseController
{
    public function index()
    {
        helper('form');

        $set = new Setting();
        
        $data['title'] = lang('app.certificate');
        $data['logo'] = $set->where('name', 'logo')->first();
        // dd($data);

        return view('certificate/index', $data);
    }

    public function verification()
    {
        $data['title'] = lang('app.certificates');
        // dd($this->request->getVar());
        // return view('home/soon', $data);

        helper('form');

        $input = $this->validate(
            [   //Rules
                'certificate_no' => 'required|integer',
            ],
            [   // Errors
                'certificate_no' =>
                [
                    'required' => lang('error.required'),
                    'integer' => lang('error.integer'),
                ],
            ]
        );
        // dd($input);

        if (!$input) {
            $data['title'] = lang('app.certificates');
            $data['validation'] = $this->validator;
            echo view('certificate/index', $data);
        } else {

            $khir = new Khirrij();

            $data['cert'] = $khir->where('certificate_no', $this->request->getVar('certificate_no'))->first();
            // dd($data);

            if ($data['cert'] != null) {
                return redirect()->to('certificate/check/' . $data['cert']['student_id'])->with('text', lang('app.successfully'))->with('title', lang('app.done'));
            } else {
                return redirect()->to('certificate')->with('type', 'error')->with('text', lang('app.studentNotFound'))->with('title', lang('app.notFound'));
            }
        }
    }

    function check($id)
    {
        $kh = new Khirrij();
        $usr = new User();

        $data['title'] = lang('app.certificate');
        $data['cert'] = $kh->where('student_id', $id)->first();
        $data['stu'] = $usr->find($id);
        $data['usr'] = $usr;
        $data['icon'] = 'success';
        $data['text'] = lang('app.checkCertificate');
        $data['toast'] = lang('app.certifiedCertificate');
        // dd($data);

        return view('certificate/check', $data);
    }

    function show($id) 
    {
        $kh = new Khirrij();
        $usr = new User();

        $data['title'] = lang('app.certificate');
        $data['cert'] = $kh->where('student_id', $id)->first();
        $data['stu'] = $usr->find($id);
        $data['usr'] = $usr;
        $data['toast'] = null;
        // dd($data);

        return view('certificate/show', $data);
    }

    function edit($id)
    {
        helper('form');
        $kh = new Khirrij();
        $usr = new User();
        $cty = new City();
        $sch = new School();

        $cert = $kh->where('student_id', $id)->first();
        $data['title'] = lang('app.certificate');
        $data['cert'] = $cert;
        $data['user'] = $usr->find($id);
        $data['city'] = $cty->findAll();
        $data['school'] = $sch->find($cert['school_id']);
        $data['usr'] = $usr;
        // dd($data);

        return view('certificate/edit', $data);
    }

    function data($id)
    {
        // dd($this->request->getVar());
        $kh = new Khirrij();
        $usr = new User();
        $cty = new City();
        $sch = new School();

        $input = $this->validate(
            [   //Rules
                'certificate_no' => 'required|integer',
            ],
            [   // Errors
                'certificate_no' =>
                [
                    'required' => lang('error.required'),
                    'integer' => lang('error.integer'),
                ],
            ]
        );
        // dd($input);

        if (!$input) {
            helper('form');

            $cert = $kh->find($this->request->getVar('cert_id'));
            $data['title'] = lang('app.certificate');
            $data['cert'] = $cert;
            $data['user'] = $usr->find($id);
            $data['city'] = $cty->findAll();
            $data['school'] = $sch->find($cert['school_id']);
            $data['usr'] = $usr;
            $data['validation'] = $this->validator;
            // dd($data);

            echo view('certificate/edit', $data);
        } else {
            $data = [
                'certificate_no' => $this->request->getVar('certificate_no'),
                'info' => $this->request->getVar('info'),
                'status' => $this->request->getVar('status'),
                'certificate' => $this->request->getVar('certificate'),
            ];
            // dd($data);

            $kh->update($this->request->getVar('cert_id'), $data);

            return redirect()->back()->with('toast', 'success')->with('text', lang('app.successfully'))->with('title', lang('app.done'));
        }
    }
}
