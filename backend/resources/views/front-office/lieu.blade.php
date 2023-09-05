@extends('layouts.base')

@section('content')
	<br>
    <br>
    <br>
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Lieu de collecte</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">
                @foreach ($lieux as $key => $lieu)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-news">
                            <a href="#"><div class="latest-news-bg pinMap"><img src="/images/pinMap.jpg"></div></a>
                            <div class="news-text-box">                                                                        
                                <h3><a>{{ $lieu->adresse }}</a></h3>
                                <a class="read-more-btn"disabled>Heure de collecte :</a>
                                <p class="excerpt"><i class="fas fa-clock"></i>  {{ $lieu->horaires_collecte }}</p>
                                    @foreach ($lieu->trashTypes as $trashType)
                                        <span class="badge rounded-pill bg-dark text-white" style="font-size: 1rem;">{{ $trashType->name }}</span>
                                    @endforeach
                            </div>                            
                        </div>
                    </div>
                @endforeach
			</div>

			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="pagination-wrap">
								<ul>
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a class="active" href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->




	



    @endsection
