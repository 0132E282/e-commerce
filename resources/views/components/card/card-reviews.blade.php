<div class="post">
    <div class="user-block">
        <img class="img-circle img-bordered-sm" src="{{ $review->user->avatar_url ?? 'https://tse4.mm.bing.net/th?id=OIP.SqTcfufj92gVRBT45d045wAAAA&pid=Api&P=0&h=180' }}" alt="user image">
        <span class="username">
            <a href="#">{{ $review->name }}</a>
            <span data-toggle="modal" data-target="#delete_review" data-method="delete" data-route="{{ route('admin.reviews.delete', $review) }}" class="float-right btn-tool" style="cursor: pointer;"><i class="fas fa-times"></i></span>
            @if ($review->rating != null)
                <span class="ms-2">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating)
                            <i class="bi bi-star-fill "></i>
                        @else
                            <i class="bi bi-star"></i>
                        @endif
                    @endfor
                </span>
            @endif
        </span>
        <span class="description">{{ $review->created_at }}</span>
    </div>
    <p>
        {{ $review->content }}
    </p>
</div>
