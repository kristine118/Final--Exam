<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <div class="row">
            @foreach($teamMembers as $member)
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{ asset('storage/'.$member->photo) }}">
                        <h4>{{ $member->name }}</h4>
                        <p class="text-muted">{{ $member->role }}</p>
                        @if($member->twitter)
                            <a class="btn btn-dark btn-social mx-2" href="{{ $member->twitter }}" aria-label="{{ $member->name }} Twitter Profile"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($member->facebook)
                            <a class="btn btn-dark btn-social mx-2" href="{{ $member->facebook }}" aria-label="{{ $member->name }} Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if($member->linkedin)
                            <a class="btn btn-dark btn-social mx-2" href="{{ $member->linkedin }}" aria-label="{{ $member->name }} LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>
