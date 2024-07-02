<footer class="ftco-footer ftco-bg-dark">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="ftco-footer-widget mb-4 text-center">
                    <h2 class="ftco-heading-2">{{ __('messages.man') }}</h2>
                    <ul class="ftco-footer-social list-unstyled">
                        <li><a href="https://www.instagram.com/dardujour.gents?igshid=OGQ5ZDc2ODk2ZA%3D%3D"><img src="https://cdn-icons-png.flaticon.com/128/87/87390.png" width="30"
                                    style="margin-top: 15px" alt="instagram"></a></li>
                        <li><a href="https://www.tiktok.com/@dar_dujour"><img src="https://cdn-icons-png.flaticon.com/128/2582/2582617.png"
                                    width="30" style="margin-top: 15px" alt="tiktok"></a></li>
                        <li><a href="https://www.snapchat.com/add/dardujour.g?invite_id=u5EaJUU4"><img src="https://cdn-icons-png.flaticon.com/128/16567/16567033.png"
                                    width="30" style="margin-top: 15px" alt="spnapchat"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ftco-footer-widget mb-4 text-center">
                    <h2 class="ftco-heading-2">{{ __('messages.women') }}</h2>
                    <ul class="ftco-footer-social list-unstyled">
                        <li><a href="https://www.instagram.com/dardujour"><img src="https://cdn-icons-png.flaticon.com/128/87/87390.png"
                                    width="30" style="margin-top: 15px" alt="instagram"></a></li>
                        <li><a href="https://www.tiktok.com/@dar_dujour"><img src="https://cdn-icons-png.flaticon.com/128/2582/2582617.png"
                                    width="30" style="margin-top: 15px" alt="tiktok"></a></li>
                        <li><a href="https://www.snapchat.com/add/dardujour"><img src="https://cdn-icons-png.flaticon.com/128/16567/16567033.png"
                                    width="30" style="margin-top: 15px" alt="spnapchat"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row text-center">
            @foreach ($branches as $item)
                <div class="col-md-4">
                    <h3 class="ftco-heading-2">فرع {{ $item->name }}</h3>
                    <p>{{ $item->phone }}<br>{{ $item->phone }}</p>
                </div>
            @endforeach
        </div>
    </div>
</footer>
