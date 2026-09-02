<?php

namespace App\Controllers;

use App\Libraries\Hijri;
use App\Models\Setting;
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
        $usr = new User();
        $hjr = new Hijri();
        $set = new Setting();

        $reg = sprintf('%02s', $set->where('name', 'register')->first()['value']);
        $hijri = $hjr->GeToHijr(date('d'), date('m'), date('Y'));
        $stu = $usr->where('role', 'student')->findAll();
        // dd($stu, $hijri, $reg);

        foreach ($stu as $key => $st) {
            $username = substr($hijri['year'], 2) . sprintf('%02s', $hijri['month']) . $reg . sprintf('%04s', ($key + 1));
            $data = [
                'username' => $username,
                'email' => $username . '@gmail.com'
            ];

            // $usr->update($st['id'], $data);
        }
        // dd($username, $data);

        dd('test');
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
