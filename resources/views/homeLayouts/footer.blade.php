<footer class="ftco-footer ftco-bg-dark">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="ftco-footer-widget mb-4 text-center">
                    <h2 class="ftco-heading-2">{{ __('messages.man') }}</h2>
                    <ul class="ftco-footer-social list-unstyled">
                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                        <li><a href="#"><span class="icon-tiktok"></span></a></li>
                        <li><a href="#"><span class="icon-snapchat"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ftco-footer-widget mb-4 text-center">
                    <h2 class="ftco-heading-2">{{ __('messages.women') }}</h2>
                    <ul class="ftco-footer-social list-unstyled">
                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                        <li><a href="#"><span class="icon-tiktok"></span></a></li>
                        <li><a href="#"><span class="icon-snapchat"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row text-center">
            @foreach ($branches as $item)
                <div class="col-md-4">
                    <h3 class="ftco-heading-2">فرع {{ $item->name }}</h3>
                    <p>{{$item->phone}}<br>{{$item->phone}}</p>
                </div>
            @endforeach
        </div>
    </div>
</footer>
