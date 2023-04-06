<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Qoraiche\MailEclipse\Facades\MailEclipse as MailEclipseCon;
use Qoraiche\MailEclipse\Utils\TemplateSkeletons;


class MailEclipse extends Controller
{
    public function maileclipseM()
    {
        return view('prod.maileclipse.mailables');
    }
}
