@extends('dashboard')


@section('title')
    Post_Index
@endsection

@push('style')
    <style>
        .container {
            margin: 0 auto;
            padding: 15px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* ثلاثة أعمدة متساوية */
            gap: 15px;
            /* المسافة بين العناصر */
        }

        .grid-item {
            display: flex;
            flex-direction: column;
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
            /* تجعل الكارد يشغل كامل المساحة المتاحة في العنصر الأب */
            border: 1px solid #ddd;
            /* يمكنك تخصيص الحدود حسب التصميم */
            border-radius: 5px;
            /* إذا كنت ترغب في زوايا دائرية */
            overflow: hidden;
            /* لضمان عدم خروج أي محتوى خارج الكارد */
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            /* ارتفاع ثابت للصورة */
            object-fit: cover;
            /* لتغطية الصورة بالكامل */
        }

        .card-body {
            display: flex;
            flex-direction: column;
            flex: 1;
            /* يسمح للبطاقة بالنمو لملء المساحة المتاحة */
            padding: 15px;
        }

        .card-title {
            margin-bottom: 10px;
        }

        .card-text {
            flex: 1;
            /* يسمح للمحتوى بالنمو بشكل مرن */
        }

        .btn {
            margin-top: auto;
            /* يدفع الزر إلى الأسفل */
            align-self: center;
            /* يوسّط الزر أفقيًا */
        }
    </style>
@endpush
@section('cot')
    <b>
        <center>
            <h1 class="divpost fs-1">جميع البوستات</h1>
        </center>
    </b>
    <br>

    <div class="container border-b border-gray-300 mb-4">
        <a href="/post/create">
            <button class="btn btn-primary fs-5">منشور جديد</button>
        </a>
    </div>
    <br><br><br>
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="/images/{{ $post->image_path }}" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <h6 class="card-subtitle mb-2 text-muted">
                                بواسطة: <span>{{ $post->user->name }}</span>
                            </h6>
                            <p class="card-text">{{ $post->description }}</p>
                            <a href="/post/{{ $post->slug }}" class="btn btn-outline-primary">اقرأ المزيد</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
