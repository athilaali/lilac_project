
@foreach($Searchengine_results as $Search_result)
    <div class="col-md-6">
        <div class="card">

            <div class="card-body" style="background-color:rgb(83, 85, 83)";>
            <h5 class="card-title">{{$Search_result->Name}}</h5>
            <p class="card-text">{{$Search_result->Designations->Name}}</p>
            <p class="card-text">{{$Search_result->Departments->Name}}</p>
            </div>
        </div>
    </div>
@endforeach
