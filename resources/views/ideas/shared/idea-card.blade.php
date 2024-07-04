<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-3 avatar-sm rounded-circle" src=" {{ $idea->user->getImageURL() }}"
                    alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('ideas.destroy', $idea) }}">
                    @csrf
                    @method('delete')
                    <a class="btn btn-info btn-sm" href="{{ route('ideas.edit', $idea) }}"> Edit </a>
                    <a class="btn btn-success btn-sm" href="{{ route('ideas.show', $idea) }}"> View </a>
                    <button class="btn btn-danger btn-sm"> X </button>
                </form>

            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea->id) }}" method="post">
                @csrf
                @method('Put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }} </textarea>
                    @error('content')
                        <span class="d-block fs-6 text-danger mt-3"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="">
                    <button class="btn btn-dark btn-sm"> update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">

            @include('ideas.shared.like-button')

            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }} </span>
            </div>
        </div>
        @include('ideas.shared.comments-box')
    </div>


</div>
