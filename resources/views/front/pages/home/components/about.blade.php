<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">About</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <ul class="timeline">
            @foreach($abouts as $about)
                <li class="{{ $about->inverted ? 'timeline-inverted' : '' }}">
                    <div class="timeline-image">
                        @if($about->image)
                            <img class="rounded-circle img-fluid" src="{{ asset('storage/'.$about->image) }}" alt="..." />
                        @else
                            <h4>{{ $about->title }}</h4>
                        @endif
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>{{ $about->year }}</h4>
                            <h4 class="subheading">{{ $about->title }}</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">{{ $about->description }}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
