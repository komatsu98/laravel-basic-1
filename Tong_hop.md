# Tổng hợp Laravel 
## 1. Views 
Chứa HTML, có nhiệm vụ render trang web từ các action do Controller truyền sang và dữ liệu từ Model

- Được lưu trong resoures/views dưới tên dạng: `view_name.blade.php`
- Được trả về bằng cách: `return view('view_name')`

### Blade
Là một PHP template engine.

2 lợi ích cơ bản nhất của Blade là **tính kế thừa template** và các **section**.

Một số lợi ích khác :
- Code dễ nhìn, dễ bảo trì
- Truyền biến dễ dàng với `{{ var_name }}
- Dễ dàng tạo các sub-view trên các layout, cũng như extend và include các view với tham số => DRY
- Có thể truyền route và method vào cho thẻ `<form>`
- Hỗ trợ các cấu trúc điều kiện, vòng lặp
- Không hề chậm bởi laravel cache lại các view đã được compile
- Tự điền đầy code thông minh 
- Dễ dàng cấu trúc lại (refactor) một cách an toàn

## 2. Laravel mix 
Cung cấp API rất mượt để sử dụng Webpack build cho Laravel app

Entry point:`webpack.mix.js`

Config Webpack: `webpack.config.js`

Có thể dùng để compile less, sass, stylus, js,... 

Làm việc với JS (compile ECMAScript 2015,...), React, Vanilla JS,...

Có thể được sử dụng để copy file sang chỗ khác

Hỗ trợ Cache Busting: dùng method `version()`

### Ví dụ:
    mix.js('resources/js/app.js', 'public/js')
       .sass('resources/sass/app.scss', 'public/css');

### Một số tool 
PostCSS (auto apply các CSS3 vendor prefix cần thiết)

PlainCSS (gộp các file CSS lại với nhau)


## 3. Model 
Làm nhiệm vụ thao tác trực tiếp xuống DBMS 

### Tạo model:
    php artisan make:model ModelName
Một số option: 
    -m, -c, -r
(tạo migration, controller, route tương ứng)

### Một số thuộc tính 

- `$fillable` : những trường có thể được thay đổi trực tiếp hàng loạt.
- `$guarded` : những trường không cho phép thay đổi trực tiếp hàng loạt. 
- Khác: connection, table, primaryKey,..
## 4. Controller
Là cốt lõi, điều hành trang web. Nhóm các request có liên quan, các xử lý logic vào trong 1 class.

Được lưu trong  `app/Http/Controllers` 

Có thế chứa 1 hoặc nhiều action 

Các action có thể được gọi từ HTML form

### Resource Controllers 
Tạo "CRUD" mặc định cho controller

Ví dụ:

    php artisan make:controller PhotoController --resource

## 5. Route
Tạo các request URL của app.

Được lưu trong: `routes/web.php` (web interface), `routes/api.php` (api)

### Route Methods
- GET 
- POST 
- DELETE 
- PUT 
- PATCH 
- OPTIONS 

### CSRF Protection
Đối với các method POST, DELETE, PATCH cần có csrf token 

### Route Parameters 
Được đặt trong `{}` 
Ví dụ: 

    Route::get('user/{id}', function ($id) {
        return 'User '.$id;
    });
    
#### Optional parameter

Thêm default case cho route param 
Ví dụ: 
    
    Route::get('user/{name?}', function ($name = 'default') {
        return $name;
    });
#### Giới hạn param 
Chỉ chấp nhận các param có kiểu như được chỉ định sẵn (`[0-9]+`, `[a-z]+`,...)

### Đặt tên cho route 
Gọi lại trực quan hơn với tên route.
Ví dụ:     
    
    Route::get('user/profile', function () {
        //
    })->name('profile');

Hoặc tạo URL từ route name:

    $url = route('profile');

### Route group 
Dùng chung các attribute chẳng hạn như middleware, namespaces,...
Ví dụ: 

    Route::namespace('Admin')->group(function () {
        // Controllers Within The "App\Http\Controllers\Admin" Namespace
    });
    
#### Route prefix
Thêm tiền tố cho các route trong group 

### Rate limit 
Hạn chế số request trong các khoảng thời gian 
Thêm middleware `throttle` vào.
Ví dụ:

    Route::middleware('auth:api', 'throttle:60,1')->group(function () {
        Route::get('/user', function () {
            //
        });
    });
    
### Route hiện tại 
Có thể sử dụng một trong các method sau để truy cập được route hiện tại: `current`, `currentRouteName`, `currentRouteAction`