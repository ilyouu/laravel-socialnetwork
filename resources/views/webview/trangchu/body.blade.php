<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-rounded" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
    Tạo bài viết
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tạo bài viết</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/post/add" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label class="form-label"><b>Bạn đang nghĩ gì:</b></label>
                    <div class="form-outline mb-4">
                        <textarea type="input" class="form-control" name="message" autocomplete="off" id="ckediter" /></textarea>
                    </div>

                    <label class="form-label" for="formFileMultiple"><b>Hình ảnh:</b></label>
                    <div class="form-outline mb-4">
                        <input type="file" class="form-control" name="image[]" id="formFileMultiple" multiple />
                    </div>

                    <input type="hidden" class="form-control" name="id_user" value="{{ $user['id'] }}" />

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Đăng</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<br>
<br>

@foreach ($posts as $post)
    <div class="card text-start">
        <div class="card-header">
            <div class="row" style="margin-bottom: 6px">
                <div class="col-1 text-start">
                    <img src="{{ URL('imagesUser/myUser.jpg') }}" class="rounded-circle" alt="" loading="lazy"
                        width="40" height="40" />
                </div>
                <div class="col-10 text-start">
                    @foreach ($users as $u)
                        @if ($u['id'] == $post->id_user)
                            <p style="font-size: 15px; font-weight: bold; margin: 0px; padding: 0px;">
                                {{ $u['ten_nguoi_dung'] }}</p>
                        @endif
                    @endforeach

                    <p style="font-size: 13px; margin: 0px; padding: 0px; margin-top: -2px">{!! date('H:i · d/m/Y', strtotime($post->created_at)) !!}</p>
                </div>
                <div class="col-1 text-end">
                    <i class="fas fa-ellipsis-h"></i>
                </div>
            </div>

            {!! str_replace('<p>', '<p style="margin: 0px; font-size: 15px">', $post->message) !!}

        </div>

        @if (count(json_decode($post->image)) > 1)
            @if (count(json_decode($post->image)) % 2 == 1)
                @foreach (json_decode($post->image) as $key => $value)
                    <img src="{{ URL('imagesUser/' . $value) }}" style="padding-bottom:0.5px;" width="100%" alt="" />
                    @break
                @endforeach
                <div class="card-group">
                    @foreach (json_decode($post->image) as $key => $value)
                        <div class="card">
                            <img src="{{ URL('imagesUser/' . $value) }}" style="margin-bottom: 1px; padding:0.5px;" width="100%" alt="" />
                        </div>
                    @endforeach
                </div>
            @else 
                <div class="card-group">
                    @foreach (json_decode($post->image) as $key => $value)
                    <div class="card">
                        <img src="{{ URL('imagesUser/' . $value) }}" style="margin-bottom: 1px; padding:0.5px;" width="100%" alt="" />
                    </div>
                    @endforeach
                </div>

            @endif
        @else
            @foreach (json_decode($post->image) as $key => $value)
                <img src="{{ URL('imagesUser/' . $value) }}" alt="" loading="lazy" />
            @endforeach
        @endif

        <div class="row" style="font-size: 15px; margin: 7px; padding: 0px;">
            <div class="col text-start">
                <img src="{{ URL('imagesWebsite/like_facebook.png') }}" alt="" loading="lazy"
                    height="20" />
                23K lượt thích
            </div>

            <div class="col text-end">10 bình luận · 23 lượt chia sẻ</div>
        </div>


        <div class="card-footer text-muted text-center">
            <div class="row">
                <div class="col-4" style="font-size: 15px;">
                    {{-- <i class="fas fa-thumbs-up"></i>&nbsp; --}}
                    <i class="far fa-thumbs-up"></i>&nbsp;
                    Thích
                </div>
                <div class="col-4" style="font-size: 15px;">
                    <i class="fas fa-comment-dots"></i>&nbsp;
                    Bình luận
                </div>
                <div class="col-4" style="font-size: 15px;">
                    <i class="fas fa-share"></i>&nbsp;
                    Chia sẻ
                </div>
            </div>

        </div>
    </div>
    <br>
@endforeach
