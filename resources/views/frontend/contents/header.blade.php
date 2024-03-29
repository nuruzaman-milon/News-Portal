 
@php
 	$setting = DB::table('websitesettings')->first();
@endphp
 
 
 
 <!-- header-start -->
	<section class="hdr_section">
		<div class="container-fluid">			
			<div class="row">
				<div class="col-xs-6 col-md-2 col-sm-4">
					<div class="header_logo ">
						<a href="{{ route('index') }}"><img src="{{ asset($setting->header_logo) }}"></a> 
					</div>
				</div>              
				<div class="col-xs-6 col-md-8 col-sm-8">
					<div id="menu-area" class="menu_area">
						<div class="menu_bottom">
							<nav role="navigation" class="navbar navbar-default mainmenu">
						<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<!-- Collection of nav links and other content for toggling -->
								<div id="navbarCollapse" class="collapse navbar-collapse">
									<ul class="nav navbar-nav">
										<li><a href="{{ route('index') }}">HOME</a></li>

										@php
											$categories = DB::table('categories')->orderBy('id')->limit(5)->get();//for category
											$category_ban = DB::table('categories')->orderBy('id')->get();//for category
										@endphp
										@foreach ($categories as $category)
											
											<li class="dropdown">
												<a href="{{ route('category.single.news.page',$category->id) }}" class="dropdown-toggle" data-toggle="dropdown"> 
													@if (session()->get('language') == 'bangla')
														{{ $category->category_ban }}
													@else
														{{ $category->category_en }}
													@endif
												<b class="caret"></b></a>
											<ul class="dropdown-menu">
												@php
													$subcategories = DB::table('sub_categories')->where('category_id','=',$category->id)->get();//for sub_category
												@endphp

												@foreach ($subcategories as $subcategory) 
													<li><a href="{{ route('subcategory.single.news.page',$subcategory->id) }}">
														@if (session()->get('language') == 'bangla')
														{{ $subcategory->subcategory_ban }}
													@else
														{{ $subcategory->subcategory_en }}
													@endif
													</a></li>
												@endforeach
												
											</ul>
											</li>
											@endforeach											
									</ul>
								</div>
							</nav>											
						</div>
					</div>					
				</div> 
				<div class="col-xs-12 col-md-2 col-sm-12">
					<div class="header-icon">
						<ul>
							<!-- LANGUAGE version-start -->
							@if (session()->get('language') == 'bangla')
							<li class="version"><a href="{{ route('language.english') }}"><B>ENGLISH</B></a></li>&nbsp;&nbsp;&nbsp;
							@else
							<li class="version"><a href="{{ route('language.bangla') }}"><B>BANGLA</B></a></li>&nbsp;&nbsp;&nbsp;
							@endif

						
							<!-- search-start -->
							<li><div class="search-large-divice">
								<div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search" aria-hidden="true"></i></a>
									<div class="modal fade bd-example-modal-lg" action="" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-md-12">
															<div class="custom-search-input">
																<form>
																	<div class="input-group">
																		<input class="search form-control input-lg" placeholder="search" value="Type Here.." type="text">
																		<span class="input-group-btn">
																		<button class="btn btn-lg" type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
																	</span> </div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div></li>
							<!-- social-start -->
							<li>
								<div class="dropdown">
								  <button class="dropbtn-02"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
								  <div class="dropdown-content">
									 @php
										 $socials = DB::table('socials')->first();
									 @endphp 
									<a href="{{ $socials->facebook }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
									<a href="{{ $socials->twitter }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
									<a href="{{ $socials->youtube }}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
									<a href="{{ $socials->instagram }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
								  </div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.header-close -->
	
    <!-- top-add-start -->
	<section>

@php
	$horizontalads = DB::table('ads')->where('type',1)->skip(1)->first();
@endphp
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
					<div class="top-add">
						@if ($horizontalads == NULL)
									
						@else
							<a href="{{ $horizontalads->link }}" target="_blank"><img src="{{ asset($horizontalads->image) }}"/></a> 
						@endif	
					</div>
				</div>
			</div>
		</div>
	</section> <!-- /.top-add-close -->
	
	<!-- date-start -->
    <section>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12 col-sm-12">
					<div class="date">
						<ul>
							@php
								 use Carbon\Carbon;
								 $todayDate = Carbon::now()->format('l, d F Y')
								//  $todayDate = Carbon::now()->toDayDateTimeString();
								//  $todayDate->toDayDateTimeString();
							@endphp
							<li><i class="fa fa-map-marker" aria-hidden="true"></i> <strong>Dhaka</strong>  </li>
							<li><i class="fa fa-calendar" aria-hidden="true"></i>  <strong>{{ $todayDate }}</strong> </li>
							<li><i class="fa fa-clock-o" aria-hidden="true"></i> 
								
											{{-- Current Time --}}

								<script>function display_ct7() {
									var x = new Date()
									var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
									hours = x.getHours( ) % 12;
									hours = hours ? hours : 12;
									hours=hours.toString().length==1? 0+hours.toString() : hours;
									
									var minutes=x.getMinutes().toString()
									minutes=minutes.length==1 ? 0+minutes : minutes;
									
									var seconds=x.getSeconds().toString()
									seconds=seconds.length==1 ? 0+seconds : seconds;
									
									// var month=(x.getMonth() +1).toString();
									// month=month.length==1 ? 0+month : month;
									
									// var dt=x.getDate().toString();
									// dt=dt.length==1 ? 0+dt : dt;
									
									// var x1=month + "/" + dt + "/" + x.getFullYear(); 
									
									x1 = hours + ":" +  minutes + ":" +  seconds + " " + ampm;
									document.getElementById('ct7').innerHTML = x1;
									display_c7();
									 }
									 function display_c7(){
									var refresh=1000; // Refresh rate in milli seconds
									mytime=setTimeout('display_ct7()',refresh)
									}
									display_c7()
									</script>
									<strong><span id='ct7'></span></strong>
									
							</li>
						</ul>
						
					</div>
				</div>
    		</div>
    	</div>
    </section><!-- /.date-close -->  

	<!-- notice-start -->
	 
    <section>
    	<div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01 ">
				@if (session()->get('language') == 'bangla')
					সদ্যপ্রাপ্ত সংবাদ :
				@else
					Breaking News :
				@endif	
				</div>
				<div class="col-md-10 col-sm-9 scroll_02">
					@php
						$headline = DB::table('posts')->where('posts.headline',1)->limit(3)->get();
					@endphp
					
							<marquee>
								
						@foreach ($headline as $row)
						<a href="{{ route('design.single.page',$row->id) }}">
							@if (session()->get('language') == 'bangla')
								* {{ $row->title_ban }}
							@else
								* {{ $row->title_en }}
							@endif
						</a>
						@endforeach	
								
					</marquee>
					
				
				</div>
			</div>
    	</div>
    </section>   
{{--  for notice  --}}

@php
	$notices = DB::table('notices')->first();
	// dd($notice);
@endphp

@if ($notices->status == 1)
	<section>
    	<div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01 ">
				@if (session()->get('language') == 'bangla')
					লক্ষ্য করুন :
				@else
					Notice :
				@endif	
				</div>
				<div class="col-md-10 col-sm-9 scroll_02">
					<marquee>	
							{{ $notices->notice }}	
					</marquee>
				</div>
			</div>
    	</div>
    </section> 
@endif
	  

	
	