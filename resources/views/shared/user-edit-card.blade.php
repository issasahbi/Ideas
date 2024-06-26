<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form action=" {{ route('users.update', $user->id) }}" method="post" enctype="Multipart/form-data">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src=" {{ $user->getImageURL() }}"
                        alt="{{ $user->name }}">
                    <div>

                        <input value="{{ $user->name }}" class="form-control" name="name" type="text">
                        @error('name')
                            <span class="d-block fs-6 text-danger mt-3">{{ $message }}</span>
                        @enderror
                        <input value="{{ $user->email }}" class="form-control" name="email" type="text">
                        @error('email')
                            <span class="d-block fs-6 text-danger mt-3">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div>
                    @auth
                        @if (Auth::id() === $user->id)
                            <a class="btn btn-success btn-sm" href=" {{ route('users.show', $user->id) }}">View</a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="mt-3">
                <label for="">Profile Picture :</label>
                <input name="image" type="file" class="form-control">
                @error('image')
                    <span class="d-block fs-6 text-danger mt-3">{{ $message }}</span>
                @enderror
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>

                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3">{{ $user->bio }} </textarea>
                    @error('bio')
                        <span class="d-block fs-6 text-danger mt-3"> {{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-success btn-sm mb-3">Save</button>

                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{ $user->ideas()->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{ $user->comments()->count() }} </a>
                </div>
                @auth
                    @if (Auth::id() !== $user->id)
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm"> Follow </button>
                        </div>
                    @endif
                @endauth

            </div>
        </form>
    </div>
</div>
