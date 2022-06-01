<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class PdfController extends Controller
{
    public function pdfBlade(Request $request)
    {
        $surname = $request->surname;
        $name = $request->name;
        $sharif = $request->sharif;
        $title = $request->title;
        $temp = new TemplateProcessor('assets/img/doc/sec.docx');
        $temp->setValue('surname', $surname);
        $temp->setValue('name', $name);
        $temp->setValue('sharif', $sharif);
        $temp->setValue('title', $title);
        $filName = $surname;
        $temp->saveAs($filName . '.docx');
        return response()->download($filName. '.docx')->deleteFileAfterSend(true);
    }
}
