@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Guía</div>
                </div>
                <div class="card-body">
                    <div id="scatter"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var scatterOptions = @JSON($scatter['options']);

        var scatter = new ApexCharts(document.querySelector("#scatter"), scatterOptions);
        scatter.render();
    </script>
@endsection