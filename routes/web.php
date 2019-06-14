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

Route::get('/lang/{locale}', ['as' => 'site.lang', 'uses' => 'LangController@postIndex']);
Route::get('/chartdata', function(){
    return ['value' => rand(50,100)];
})->name('chartdata');
Route::get('/markAsRead', function(){
    Auth::guard('admins')->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');
Route::group(['namespace' => 'Site'], function () {
    Route::get('/', ['as' => 'site.home', 'uses' => 'HomeController@getIndex']);
    Route::get('/about', ['as' => 'site.about', 'uses' => 'HomeController@getAbout']);
    Route::get('/category/{id}', ['as' => 'post.category', 'uses' => 'HomeController@getCat']);
    Route::get('/clients', ['as' => 'site.clients', 'uses' => 'ServicesController@getService']);
    Route::get('/contact', ['as' => 'site.contact', 'uses' => 'HomeController@getContact']);
    Route::post('/send', ['as' => 'site.message', 'uses' => 'HomeController@message']);
    Route::post('/subscribe', ['as' => 'site.subscribe', 'uses' => 'HomeController@subscribe']);
    Route::get('/services', ['as' => 'site.services', 'uses' => 'HomeController@getServices']);
    Route::get('/gallery', ['as' => 'site.gallery', 'uses' => 'HomeController@getGallery']);
    Route::get('/posts', ['as' => 'site.posts', 'uses' => 'HomeController@getPosts']);
    Route::get('/cposts/{id}', ['as' => 'site.cposts', 'uses' => 'HomeController@cPosts']);
    Route::get('/search', ['as' => 'blog.search', 'uses' => 'HomeController@search']);
    Route::get('/post/{id}', ['as' => 'site.post', 'uses' => 'HomeController@getPost']);
    Route::get('/packages', ['as' => 'site.packages', 'uses' => 'HomeController@getPackages']);
    Route::get('/packs/{id}', ['as' => 'site.packs', 'uses' => 'HomeController@getPacks']);
    Route::get('/package/{id}', ['as' => 'site.package', 'uses' => 'HomeController@getPackage']);
    Route::post('/reserve', ['as' => 'site.reserve', 'uses' => 'HomeController@reserve']);
    Route::post('/comment', ['as' => 'site.comment', 'uses' => 'HomeController@comment']);
    Route::post('/reply', ['as' => 'site.reply', 'uses' => 'HomeController@reply']);
    Route::get('/error', ['as' => 'site.error', 'uses' => 'HomeController@error']);
});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/', 'AuthController@getIndex');
        Route::get('/login', 'AuthController@getIndex');
        Route::post('/login', 'AuthController@postLogin')->name('admin.login');
        Route::get('/logout', 'AuthController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@getIndex']);
        Route::get('/about', ['as' => 'admin.about', 'uses' => 'DataController@getAbout']);
        Route::post('/about', ['as' => 'admin.about.post', 'uses' => 'DataController@updateAbout']);
        Route::get('/gallery', ['as' => 'admin.about.gallery', 'uses' => 'DataController@getGallery']);
        Route::post('/gallery', ['as' => 'admin.about.images', 'uses' => 'DataController@getPostImages']);
        Route::post('/addImages', ['as' => 'admin.about.addImages', 'uses' => 'DataController@addImages']);
        Route::get('/deleteImg/{id}', ['as' => 'admin.about.deleteImg', 'uses' => 'DataController@deleteImage']);
        Route::get('/contacts', ['as' => 'admin.contacts', 'uses' => 'ContactsController@getContacts']);
        Route::post('/contacts', ['as' => 'admin.contacts.update', 'uses' => 'ContactsController@updateContacts']);
        Route::get('/data', ['as' => 'admin.data', 'uses' => 'DataController@getData']);
        Route::post('/data', ['as' => 'admin.data.update', 'uses' => 'DataController@updateData']);

        Route::group(['prefix' => 'packages'], function () {
            Route::get('/', ['as' => 'admin.packages', 'uses' => 'PackagesController@getIndex']);
            Route::get('/add', ['as' => 'admin.package.add', 'uses' => 'PackagesController@getAdd']);
            Route::post('/add', ['as' => 'admin.package.add', 'uses' => 'PackagesController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.package.edit', 'uses' => 'PackagesController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.package.edit', 'uses' => 'PackagesController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.package.delete', 'uses' => 'PackagesController@delete']);
            Route::get('/gallery', ['as' => 'admin.package.gallery', 'uses' => 'PackagesController@getGallery']);
            Route::post('/gallery', ['as' => 'admin.package.images', 'uses' => 'PackagesController@getPostImages']);
            Route::post('/addImages', ['as' => 'admin.package.addImages', 'uses' => 'PackagesController@addImages']);
            Route::get('/deleteImg/{id}', ['as' => 'admin.package.deleteImg', 'uses' => 'PackagesController@deleteImage']);
        });

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', ['as' => 'admin.categories', 'uses' => 'CategoriesController@getIndex']);
            Route::get('/add', ['as' => 'admin.category.add', 'uses' => 'CategoriesController@getAdd']);
            Route::post('/add', ['as' => 'admin.category.add', 'uses' => 'CategoriesController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.category.edit', 'uses' => 'CategoriesController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.category.edit', 'uses' => 'CategoriesController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.category.delete', 'uses' => 'CategoriesController@delete']);
        });

        Route::group(['prefix' => 'sliders'], function () {
            Route::get('/', ['as' => 'admin.sliders', 'uses' => 'SlidersController@getIndex']);
            Route::get('/add', ['as' => 'admin.slider.add', 'uses' => 'SlidersController@getAdd']);
            Route::post('/add', ['as' => 'admin.slider.add', 'uses' => 'SlidersController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.slider.edit', 'uses' => 'SlidersController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.slider.edit', 'uses' => 'SlidersController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.slider.delete', 'uses' => 'SlidersController@delete']);
        });

        Route::group(['prefix' => 'cats'], function () {
            Route::get('/', ['as' => 'admin.cats', 'uses' => 'CatsController@getIndex']);
            Route::get('/add', ['as' => 'admin.cats.add', 'uses' => 'CatsController@getAdd']);
            Route::post('/add', ['as' => 'admin.cats.add', 'uses' => 'CatsController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.cats.edit', 'uses' => 'CatsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.cats.edit', 'uses' => 'CatsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.cats.delete', 'uses' => 'CatsController@delete']);
        });

        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', ['as' => 'admin.posts', 'uses' => 'PostsController@getIndex']);
            Route::get('/add', ['as' => 'admin.post.add', 'uses' => 'PostsController@getAdd']);
            Route::post('/add', ['as' => 'admin.post.add', 'uses' => 'PostsController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.post.edit', 'uses' => 'PostsController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.post.edit', 'uses' => 'PostsController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.post.delete', 'uses' => 'PostsController@delete']);
        });

        Route::group(['prefix' => 'services'], function () {
            Route::get('/', ['as' => 'admin.services', 'uses' => 'ServicesController@getIndex']);
            Route::get('/add', ['as' => 'admin.service.add', 'uses' => 'ServicesController@getAdd']);
            Route::post('/add', ['as' => 'admin.service.add', 'uses' => 'ServicesController@postAdd']);
            Route::get('/edit/{id}', ['as' => 'admin.service.edit', 'uses' => 'ServicesController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.service.edit', 'uses' => 'ServicesController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.service.delete', 'uses' => 'ServicesController@delete']);
        });

        Route::group(['prefix' => 'programmes'], function () {
            Route::get('/', ['as' => 'admin.programmes', 'uses' => 'ProgrammesController@getIndex']);
            Route::get('/add', ['as' => 'admin.program.add', 'uses' => 'ProgrammesController@getAdd']);
            Route::post('/add', ['as' => 'admin.program.add', 'uses' => 'ProgrammesController@postAdd']);
            Route::get('/edit/{id}', ['as' => 'admin.program.edit', 'uses' => 'ProgrammesController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.program.edit', 'uses' => 'ProgrammesController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.program.delete', 'uses' => 'ProgrammesController@delete']);
        });

        Route::group(['prefix' => 'stories'], function () {
            Route::get('/', ['as' => 'admin.stories', 'uses' => 'StoriesController@getIndex']);
            Route::get('/add', ['as' => 'admin.story.add', 'uses' => 'StoriesController@getAdd']);
            Route::post('/add', ['as' => 'admin.story.add', 'uses' => 'StoriesController@postAdd']);
            Route::get('/edit/{id}', ['as' => 'admin.story.edit', 'uses' => 'StoriesController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.story.edit', 'uses' => 'StoriesController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.story.delete', 'uses' => 'StoriesController@delete']);
        });

        Route::group(['prefix' => 'gallery'], function () {
            Route::get('/', ['as' => 'admin.gallery', 'uses' => 'GalleryController@getIndex']);
            Route::get('/add', ['as' => 'admin.gallery.add', 'uses' => 'GalleryController@getAdd']);
            Route::post('/add', ['as' => 'admin.gallery.add', 'uses' => 'GalleryController@postAdd']);
            Route::get('/edit/{id}', ['as' => 'admin.gallery.edit', 'uses' => 'GalleryController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.gallery.edit', 'uses' => 'GalleryController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.gallery.delete', 'uses' => 'GalleryController@delete']);
        });

        Route::group(['prefix' => 'teams'], function () {
            Route::get('/', ['as' => 'admin.teams', 'uses' => 'TeamController@getIndex']);
            Route::get('/add', ['as' => 'admin.team.add', 'uses' => 'TeamController@getAdd']);
            Route::post('/add', ['as' => 'admin.team.add', 'uses' => 'TeamController@insert']);
            Route::get('/edit/{id}', ['as' => 'admin.team.edit', 'uses' => 'TeamController@getEdit']);
            Route::post('/edit/{id}', ['as' => 'admin.team.edit', 'uses' => 'TeamController@postEdit']);
            Route::get('/delete/{id}', ['as' => 'admin.team.delete', 'uses' => 'TeamController@delete']);
        });

        Route::group(['prefix' => 'subscribers'], function () {
            Route::get('/index', ['as' => 'admin.subscribers', 'uses' => 'SubscribersController@getIndex']);
            Route::get('/send/{id}', ['as' => 'admin.subscriber.send', 'uses' => 'SubscribersController@getEmail']);
            Route::post('/sendMail', ['as' => 'sendMail', 'uses' => 'SubscribersController@sendEmail']);
            Route::get('/sendAll', ['as' => 'admin.subscriber.sendAll', 'uses' => 'SubscribersController@getAll']);
            Route::post('/sendAll', ['as' => 'admin.subscriber.sendAll', 'uses' => 'SubscribersController@sendAll']);
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', ['as' => 'admin.users', 'uses' => 'UsersController@getIndex']);
            Route::get('/add', ['as' => 'admin.user.add', 'uses' => 'UsersController@getAdd']);
            Route::post('/add', ['as' => 'admin.user.add', 'uses' => 'UsersController@insertUser']);
            Route::get('/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UsersController@getUser']);
            Route::post('/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UsersController@updateUser']);
            Route::get('/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'UsersController@deleteU']);
            Route::post('/active', ['as' => 'admin.user.active', 'uses' => 'UsersController@postActive']);
            Route::post('/disActive', ['as' => 'admin.user.disActive', 'uses' => 'UsersController@postDisActive']);
            Route::post('/block', ['as' => 'admin.user.block', 'uses' => 'UsersController@postBlock']);
        });
        Route::get('/message', ['as' => 'admin.message', 'uses' => 'MessageController@getIndex']);
        Route::get('/reservation', ['as' => 'admin.reservation', 'uses' => 'MessageController@reserve']);
        Route::post('/upload', ['as' => 'admin.upload.post', 'uses' => 'UploadController@getPost']);
        Route::post('/uploadIcon', ['as' => 'admin.upload.icon', 'uses' => 'UploadController@getPost2']);
        Route::post('/uploadImage', ['as' => 'admin.upload.image', 'uses' => 'UploadController@getPost3']);
        Route::post('/uploads', 'DataController@dropzoneStore')->name('admin.dropzoneStore');
        Route::post('/upload/images', ['as' => 'admin.upload.images', 'uses' => 'CatsController@getPostImages']);
    });
});