<!--Carousel Wrapper-->
<div id="carousel-with-lb" class="carousel slide carousel-multi-item" data-interval="false" data-ride="carousel">

  <!--Controls-->
    <a class="btn-floating btn-primary left-arrow" href="#carousel-with-lb" data-slide="prev"><i
        class="fas fa-chevron-left"></i></a>
    <a class="btn-floating btn-primary right-arrow" href="#carousel-with-lb" data-slide="next"><i
        class="fas fa-chevron-right"></i></a>
  <!--/.Controls-->

  <!--Slides and lightbox-->

  <div class="carousel-inner mdb-lightbox" role="listbox">
    <div id="mdb-lightbox-ui"></div>
    <!--First slide-->

    <div id="courses-header">
        <h4>Resume Learning</h4>
        <a href="/mycourses">My courses</a>
        <div class="clearfix"></div>
      </div>

    @foreach($user_courses as $course)

    <div class="course carousel-item <?php if($loop->first) echo 'active'; ?>">
      <div class="row">
        <div class="col-sm-4 offset-sm-2">
          <figure class="col-md-4 d-md-inline-block">
            <a href="/courses/{{$course->slug}}"
              data-size="1600x1067">
              @if($course->photo)
              <img src="/images/{{ $course->photo->filename }}">
              @else
              <img src="/images/default.jpg">
              @endif
            </a>
          </figure>
        </div>
        <div class="col-sm-4">
            <h3><a href="/courses/{{$course->slug}}">{{\Str::limit($course->title, 30)}}</a></h3>
            <h4>Track: <a href="/tracks/{{$course->track->name}}">{{$course->track->name}}</a></h4><br>
            <h5><a href="">{{count($course->users)}} users are learning this course.</a></h5>
        </div>
      </div>
      

    </div>
    <!--/.First slide-->
      @endforeach
    </div>
  </div>

</div>
<!--/.Carousel Wrapper-->