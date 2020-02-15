<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calendar</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!--<link rel="stylesheet" href="{{ asset('css/carender.css') }}">-->
        <link href="css/carender.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="row">
        <div class="col-md-6 full-height">
            <div class="content">
                <div>
                    <a href="?ym={{ $prev }}">&lt;</a>
                    <span class="month">{{ $month }}</span>
                    <a href="?ym={{ $next }}">&gt;</a>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>日</th>
                        <th>月</th>
                        <th>火</th>
                        <th>水</th>
                        <th>木</th>
                        <th>金</th>
                        <th>土</th>
                    </tr>
                    @foreach ($weeks as $week)
                        {!! $week !!}
                    @endforeach
                </table>
            </div>
            {{-- .content --}}
        </div>
        {{-- .flex-center .position-ref .full-height --}}
        <div class="col-md-6">
            <div class="content">
                
            </div>
        </div>
        
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>