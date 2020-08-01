
@extends('app.layout')


@section('content')
    


    <div class="row">
        <div class="col">
            <div class="card">

                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Tracking su tracteur N° ---</h3>
                </div>

                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">

                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="budget">Date</th>
                                <th scope="col" class="sort" data-sort="status">Distance parcourue</th>
                                <th scope="col">Duree</th>
                                <th scope="col" class="sort" data-sort="completion">Vitesse moyenne</th>
                            </tr>
                        </thead>

                        <tbody class="list">

                            @foreach($trackings as $tracking)
                            <tr>
                                @foreach($tracking as $value)
                                        <td>{{$value}}</td>
                                @endforeach
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>

                <!-- Card footer -->
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">

                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>

                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="page-item"><a class="page-link" href="#">3</a></li>

                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>




@endsection