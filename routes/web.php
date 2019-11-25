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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/post/upload', function(Request $request){


	request()->validate([
		'media' => 'required|file|mimes:jpeg,png,gif,3gpp,mp4,mpeg,quicktime,avi',

	]);

	$path = request()->file('media')->store('Zeb','s3');


	$seed_url = Storage::cloud()->url($path);

	$pod = new \App\Models\Pod\Pod;
	$data = ['name' => 'Parallel Vectors',
			 'description' => 'Here is nathan giving a vivid and brief description of a parallel vector.',
			 'published_at' => null,
			 'seed_path' => $path
			];

	$p = $pod->create($data);

	return $p->seed_path;

});


Route::get('/post/delete/{post}', function($id){

	$p = \App\Models\Pod\Pod::findOrFail($id);
	Storage::disk('s3')->delete($p->seed_path);
	$p->delete();

	return ''.$p;

});


Route::post('/device/fcm/token', function(Request $request){
        
       $token = $request->input('fcmToken');
       $data = ['name' => 'Meggie Blu',
   				  'fcm_registration_token'	=>$token];

   		$device = $d->create($data);
   		return $device->fcm_registration_token;
    });


Route::get('/post/text/{number}', function($phone_number){
        $sms = AWS::createClient('sns');
    
        $sms->publish([
                'Message' => 'Hello, This is just a test Message',
                'PhoneNumber' => $phone_number,    
                'MessageAttributes' => [
                    'AWS.SNS.SMS.SMSType'  => [
                        'DataType'    => 'String',
                        'StringValue' => 'Transactional',
                     ]
                 ],
              ]);
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
