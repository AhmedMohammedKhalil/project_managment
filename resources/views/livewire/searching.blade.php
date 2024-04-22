
@if($this->projects == "")
<section>
    <section class="courses-area-three ptb-100 jarallax" data-jarallax='{"speed": 0.3}' style="background-image: unset">
        <div class="container">
            <div class="section-title white-title">
                <h2>Projects</h2>

            </div>
            <div class="">
                <h3 style="text-align:center;color:white">Not Found Projects</h3>
            </div>
        </div>
    </section>
</section>
@elseif(count($projects) > 0)
<section>
    <section class="courses-area-three ptb-100 jarallax" data-jarallax='{"speed": 0.3}' style="background-image: unset">
        <div class="container">
            <div class="section-title white-title">
                <h2>Projects</h2>

            </div>
            <div class="">
                @include('projects')
            </div>
        </div>
    </section>
    <section>
        @include('allmodals')
    </section>
</section>
@endif
