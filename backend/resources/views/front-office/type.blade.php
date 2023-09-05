@extends('layouts.base')

@section('content')
<br><br><br>
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h1>Type de dechet</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
            @foreach ($trashTypes as $key => $type)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-latest-news">
                            <a href="#"><div class="latest-news-bg pinMap"><img src="/images/type.png"></div></a>
                            <div class="news-text-box">                                                                        
                                <h3><a>{{ $type->name }}</a></h3>
                            </div>                            
                        </div>
                    </div>
                @endforeach
			</div>
        </div>
    </div>
    <!-- end products -->

    @endsection
