<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contato;
use App\Mail\Contato as MailContato;
use Illuminate\Support\Facades\Mail;


class ContatoController extends Controller
{
    public function index()
    {
        return view('contato');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'assunto' => 'required',
            'mensagem' => 'required',
        ]);

        Contato::create($request->all());

        Mail::to('oliveiralexandre0@gmail.com')->send(new MailContato([
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'assunto' => $request->get('assunto'),
            'mensagem' => $request->get('mensagem')
        ]));

        return back()->with('success', 'Obrigado pelo contato!');
    }
}
