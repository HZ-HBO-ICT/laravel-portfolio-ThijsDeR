@extends('layout')
    
@section('head-content')
    <link rel="stylesheet" href="css/dashboardStyles.css">
    <script src="js/dashboardScript.js" defer></script>
@endsection('head-content')

@section('content')
    <main id="main">
        <div id="links">
            <p class="" onclick="toggleLinks(event)">&gt;</p>
            <ul id="links-list">
                <li>
                    <a href="https://hz.nl/over-de-hz/regelingen-documenten-1/onderwijs-en-examenregelingen" target="_blank">Course Regulations</a>
                </li>
                <li>
                    <a href="https://hz.nl/uploads/documents/Regelingen/OERS/2021-2022/11.-Uitvoeringsregeling-OER-ICT-Voltijd-2021-2022.pdf" target="_blank">Implementation Regulations</a>
                </li>
                <li>
                    <a href="https://learn.hz.nl/my/" target="_blank">HZ Learn</a>
                </li>
                <li>
                    <a href="https://teams.microsoft.com/l/team/19%3a827654897ab746089c081f24aff1c984%40thread.skype/conversations?groupId=337e8cca-f67d-4132-9fa9-b0c761bbeb94&tenantId=4c16deb3-342d-4fca-bcd5-b1429308034c" target="_blank">Teams</a>
                </li>
                <li><a href="" target="_blank">Study Progress</a></li>
                <li>
                    <a href="https://github.com/ThijsDeR/HZ-ICT-Repo" target="_blank">Github Repo</a>
                </li>
            </ul>
        </div>
        <div id="section" class="active">
            <div id="table">
                <table>
                    <tr>
                        <th>Quartile</th>
                        <th><a href="{{route('course.index')}}">Course</a></th>
                        <th>EC</th>
                        <th>Exam</th>
                        <th><a href="{{route('grade.index')}}">Grade</a></th>
                    </tr>

                    
                    @foreach($quartiles as $quartileIndex => $quartile)
                        @foreach($quartile as $courseIndex => $course)

                            @foreach($course->grades as $gradeIndex => $grade)
      
                                <tr>
                                    @if ($courseIndex === 0 && $gradeIndex === 0)
                                        @php
                                            $total = 0
                                        @endphp
                                        @foreach($quartile as $course)
                                            @php
                                                $total += $course->grades->count()
                                            @endphp
                                        @endforeach
                                        <td rowspan="{{$total}}">{{$course->quartile}}</td>
                                        @php
                                            $total = 0
                                        @endphp
                                    @endif
                                    @if ($gradeIndex === 0)
                                        <td rowspan="{{$course->grades->count()}}">{{$course->name}}</td>
                                        <td rowspan="{{$course->grades->count()}}">{{$course->ec}} EC</td>
                                    @endif
                                    <td>{{$grade->name}}</td>
                                    <td>{{$grade->best_grade ? $grade->best_grade : '0'}}</td>
                                </tr>
        

                            @endforeach
                        @endforeach
                    @endforeach
                </table>
                <div id="progress-bar">
                    <div id="progress" style="width: 37.5%; background-color: lightcoral;">
                        <p>22.5</p>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection('content')