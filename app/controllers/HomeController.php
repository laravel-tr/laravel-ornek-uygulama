<?php

class HomeController extends BaseController 
{
        /************************
         * ANASAYFAYI GOSTERIR
         ************************/
	public function index()
	{
            // SON GÖNDERİLEN SORULARI ÇEKELİM
            $lastQuestions = Question::with('user')->orderBy('id', 'DESC')->take(5)->get();
            
            // EN SON CEVAP YAZILAN SORULARI ÇEKELİM
            $lastComments = Comment::with('user', 'questions')
                                                    ->orderBy('id', 'DESC')
                                                    ->take(5)
                                                    ->get();
            
            // VIEW'İ ÇALIŞTIRALIM
            return View::make('home/index', compact('lastQuestions', 'lastComments'));
	}
}
