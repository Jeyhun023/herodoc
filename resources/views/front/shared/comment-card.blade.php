<li>
    <div class="d-flex">
        <div class="left">
            <span>
                <img src="{{$comment->user->image}}" class="profile-pict-img img-fluid" alt="">
            </span>
        </div>
        <div class="right">
            <h4>
                {{$comment->user->username}}
                <span class="gig-rating text-body-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792" width="15"
                        height="15">
                        <path fill="currentColor"
                            d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                        </path>
                    </svg>
                    {{$comment->rate}}.0
                </span>
            </h4>
            <div class="review-description">
                <p>{{$comment->content}}</p>
            </div>
            <span class="publish py-3 d-inline-block w-100">{{$comment->created_at->format('d.m.Y')}}</span>
        </div>
    </div>
</li>