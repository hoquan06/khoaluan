<div class="section pb_20 small_pt">
    <div class="custom-container">
        <div class="row">
            @for($i = 1; $i < 4; $i++)
                @php
                    $name = 'banner_' . $i;
                    $name_link = 'link_banner_' . $i;
                @endphp
                @if(isset($banner->$name) && isset($banner->$name_link) && Str::length($banner->$name) && Str::length($banner->$name_link) > 0)
                    <div class="col-md-4">
                        <div class="sale-banner mb-3 mb-md-4">
                            <a class="hover_effect1" href="{{ $banner->$name_link}}">
                                <img src="{{ $banner->$name }}" alt="">
                            </a>
                        </div>
                    </div>
                @endif
            @endfor
        </div>
    </div>
</div>
