<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/home', 'QuestionnaireController@home');
Route::get('/questionnaire/new', 'QuestionnaireController@new')->name('questionnaire.new');
Route::post('/questionnaire/create', 'QuestionnaireController@create')->name('questionnaire.create');
Route::get('/questionnaire/{questionnaire}', 'QuestionnaireController@show')->name('questionnaire.show');
Route::get('/questionnaire/view/{questionnaire}', 'QuestionnaireController@view')->name('questionnaire.view');
Route::get('/questionnaire/answers/{questionnaire}', 'QuestionnaireController@view_answers')->name('questionnaires.view.answers');
Route::post('/questionnaire/{questionnaire}/questions', 'QuestionController@store')->name('question.store');
Route::post('/questionnaire/view/{questionnaire}/completed', 'AnswerController@store')->name('complete.questionnaire');
Route::patch('/question/{question}/update', 'QuestionController@update')->name('question.update');
Auth::routes();

#Route::get('/home', 'HomeController@index')->name('home');
