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

Route::get('/', 'HomeController@home');


Route::auth();
Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/teachers', 'HomeController@teachers')->name('teachers');
Route::post('add_video_course', 'CourseController@add_video_course');
Route::get('/contact', 'HomeController@contact')->name('contact');

Route::get('/all_course', 'HomeController@all_course')->name('all_course');

Route::get('/search_course', 'HomeController@search_course')->name('search_course');

Route::get('/refer', 'HomeController@refer')->name('refer');

Route::get('/payment', 'HomeController@payment')->name('payment');
Route::post('post_payment_notify', 'HomeController@post_payment_notify');
Route::get('/payment_success', 'HomeController@payment_success')->name('payment_success');


Route::get('/package', 'PagkageControlle@package')->name('package');

Route::get('/submit_info_package/{id}','PagkageControlle@submit_info_package');
Route::post('/submit_free_package','PagkageControlle@submit_free_package');
Route::get('/success_free_package/{id}', 'PagkageControlle@success_free_package');

Route::get('/get_free_package/{id}','PagkageControlle@get_free_package');


Route::get('/teacher_detail/{id}', 'HomeController@teacher_detail')->name('teacher_detail');


Route::get('/about', 'HomeController@about')->name('about');

Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/privacy_policy', 'HomeController@privacy_policy')->name('privacy_policy');
Route::get('/terms_conditions', 'HomeController@terms_conditions')->name('terms_conditions');
Route::get('/returns_exchanges', 'HomeController@returns_exchanges')->name('returns_exchanges');

Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/blog/{id}', 'HomeController@blog_detail')->name('blog_detail');




Route::get('/category/{id}', 'HomeController@category')->name('category');
Route::get('/course_details/{id}', 'HomeController@course_details')->name('course_details');

Route::group(['middleware' => ['UserRole:manager|employee|customer']], function() {



    Route::post('/submit_payment_package','PackagController@submit_payment_package');


    Route::get('success_payment_type/{id}', 'PackagController@success_payment_type');

    Route::get('get_info_package/{id}', 'PagkageControlle@get_info_package');

    Route::get('profile', 'UserprofileController@profile');
    Route::get('edit_profile', 'UserprofileController@index');
    Route::get('my_payment', 'UserprofileController@my_payment');
    Route::get('my_pack', 'UserprofileController@my_package');

    Route::get('my_friends', 'UserprofileController@my_friends');


    Route::get('my_example', 'UserprofileController@my_example');

    Route::get('my_course', 'UserprofileController@my_course');

    Route::put('profile_user/{id}', 'UserprofileController@update');
    Route::post('add_wishlist', 'UserprofileController@add_wishlist');

    Route::post('del_wishlist', 'UserprofileController@del_wishlist');



});


Route::group(['middleware' => ['UserRole:manager|employee']], function() {

  Route::post('add_video_course_example', 'CourseController@add_video_course_example');
      Route::get('admin/set_video', 'SetVideoController@index');
      Route::get('admin/search_list_video', 'SetVideoController@search_list_video');
      Route::post('admin/fea_video', 'SetVideoController@fea_video');
      Route::post('admin/free_video', 'SetVideoController@free_video');
      Route::post('admin/add_qty2_photo', 'SetVideoController@add_qty2_photo');


      Route::post('/api/shipping_data_2', 'CourseController@shipping_data_2');

      Route::post('add_file_course', 'CourseController@add_file_course');
      Route::get('admin/get_file_course/{id}', 'CourseController@get_file_course');
      Route::post('admin/del_file_course/{id}', 'CourseController@del_file_course');

      Route::post('admin/update_order_package/', 'OrederPackageController@update_order_package');
      Route::get('admin/order_package/{id}/edit', 'OrederPackageController@order_package_edit');
      Route::post('admin/order_package_del/{id}', 'OrederPackageController@order_package_del');
      Route::get('admin/order_package', 'OrederPackageController@index');
      Route::get('admin/message_chat/{id}', 'CourseController@message_chat');
      Route::resource('admin/coupon', 'CouponController');

      Route::post('admin/post_status', 'CourseController@post_status');

      Route::get('video_course_edit/{id}', 'CourseController@video_course_edit');
      Route::get('video_course_edit2/{id}', 'CourseController@video_course_edit2');
      Route::post('post_edit_video_course', 'CourseController@post_edit_video_course');
      Route::post('post_edit_video_course2', 'CourseController@post_edit_video_course2');



      Route::resource('admin/sub_department', 'SubDeController');
        Route::resource('admin/free_course', 'Free_courseController');
        Route::resource('admin/wallet', 'Wallet_submitController');
        Route::resource('admin/dashboard', 'DashboardController');
        Route::resource('admin/user', 'UserController');
        Route::resource('admin/blog', 'BlogController');
        Route::post('api/api_blog_status', 'BlogController@api_blog_status');
        Route::resource('admin/teachers', 'TeacherController');
        Route::resource('admin/student', 'StudentController');
        Route::resource('admin/package_product', 'PackagePorController');
        Route::get('admin/package_product/{id}/del', 'PackagePorController@package_product_del');

        Route::get('admin/search_student', 'StudentController@search_student');

        Route::resource('admin/course', 'CourseController');
        Route::resource('admin/play_student', 'Course_studentController');
        Route::get('admin/play_student/{id}/print', 'Course_studentController@print');
        Route::resource('admin/department', 'DepartmentController');
        Route::resource('admin/slide', 'SlideController');
        Route::post('api/api_slide_status', 'SlideController@api_slide_status');


        Route::post('admin/del_video/{id}', 'QuestionController@del_video');
        Route::post('admin/del_video2/{id}', 'QuestionController@del_video2');

        Route::post('admin/updatesort_video/{id}', 'QuestionController@updatesort_video');

        Route::post('admin/updatesort/{id}', 'QuestionController@updatesort');
        Route::get('admin/examination/{id}/edit', 'CourseController@examination');
        Route::post('admin/store2', 'QuestionController@store2');
        Route::post('admin/deleteq/{id}', 'QuestionController@deleteq');
        Route::resource('admin/category', 'CategoryController');

        Route::resource('admin/example', 'ExampleController');
        Route::resource('admin/example_admin', 'Example_adminController');
        Route::resource('admin/card_money', 'Card_moneyController');


        Route::resource('admin/typecourse', 'TypecourseController');

        Route::post('admin/file/posts', 'UploadFileController@imagess');

        Route::resource('admin/bank', 'BankController');
        Route::resource('admin/order_shop', 'OrderController');

        Route::group(['prefix' => 'file'],  function(){
        Route::post('post', 'UploadFileController@image');
        });

        Route::get('local/.env');

        Route::resource('admin/ans', 'AnsController');
        Route::get('admin/inbox', 'MassageController@index_admin');

        Route::get('admin/inbox_chat/{id}', 'MassageController@inbox_chat');

        Route::post('admin/admin_message_sender', 'MassageController@admin_message_sender');
        Route::get('admin/logsys', 'LogController@logsys');


  });
