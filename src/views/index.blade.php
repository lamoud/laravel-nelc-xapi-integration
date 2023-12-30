<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ App::getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NELC xAPI</title>
    @NelcXapiStyle
</head>
<body class="bg-light">
    <div class="container">
        <h2>تجربة الربط التقني مع المركز الوطني للتعليم الإلكتروني</h2>
        <p>برجاء التواصل مع المركز الوطني NELC للحصول على ال Endpoins الخاص بكم ثم اتبع الخطوات التالية:</p>
        <ul>
            <li>الذهاب إلى الملف <i>config/lamoud-nelc-xapi.php</i></li>
            <li>قم باضافة البيانات التي تم الحصول عليها من المركز الوطني كما موضح في الملف</li>
            <li>تأكد من نجاح عملية الربط من هذه الصفحة</li>
            <li>قم بربط ال statments مع الدورات الخاصة بكم</li>
        </ul>

        @if ($errors->any())
        <div class="alert alert-warning fade show" role="alert">
        {{ __('The given data was invalid.') }}
        </div>
        @endif
    

        <form action="{{ route('lamoud-nelc-xapi.validate_base_route') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="exampleFormControlInput1">{{ __('Endpoint') }}</label>
                <input type="text" class="form-control" name="xapi_endpoint" value="{{ config('lamoud-nelc-xapi.endpoint') }}" disabled>
            </div>

            <div class="form-group mb-3">
                <label for="exampleFormControlInput1">{{ __('Key') }}</label>
                <input type="text" class="form-control" name="xapi_key" value="{{ config('lamoud-nelc-xapi.key') }}" disabled>
            </div>

            <div class="form-group mb-3">
                <label for="exampleFormControlInput1">{{ __('Secret') }}</label>
                <input type="text" class="form-control" name="xapi_secret" value="{{ config('lamoud-nelc-xapi.secret') }}" disabled>
            </div>

            <div class="form-group mb-3">
            <label for="exampleFormControlSelect2">{{ __('Select statement') }}</label>
            <select name="xapi_statement" multiple class="form-control" id="exampleFormControlSelect2">
                <option value="registered" selected>{{ __('Registered') }}</option>
            </select>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </form>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ son_decode($message) }}
            </div>
        @endif

    </div>
    @NelcXapiScript
</body>
</html>