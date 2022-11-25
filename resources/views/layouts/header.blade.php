<div class="header">
    <a href="{{ url('/') }}" class="hdr-logo">
        <img src="{{ asset('frontend_assets/images/lg2.png') }}" alt="" />
    </a>
    <div class="dropdown admin">
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
            aria-expanded="false">
            <span class="profile-icon">
                {{-- @if (Auth::guard('customer')->user()->profile_photo_path)
                    <img src="{{ asset(Auth::user()->profile_photo_path) }}" alt="" />
                @else --}}
                    <img src="https://ui-avatars.com/api/?name={{ Auth::guard('customer')->user()->Pro_First_Name }}&rounded=true&color=192960&background=random" alt="" />
                {{-- @endif --}}
            </span>
           {{-- {{ dd(Auth::guard('customer')->user()) }} --}}
            <em>{{ Auth::guard('customer')->user()->Pro_First_Name }}</em>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li>
                <a class="dropdown-item" href="{{ route('edit-profile') }}">
                    <span>
                        <img src="{{ asset('frontend_assets/images/p1.svg') }}" alt="" />
                    </span>Edit Personal Info
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('change-password') }}">
                    <span>
                        <img src="{{ asset('frontend_assets/images/p2.png') }}" alt="" />
                    </span>Change Password
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="{{ route('user.logout') }}">
                    <span>
                        <img src="{{ asset('frontend_assets/images/p3.png') }}" alt="" />
                    </span>Logout
                </a>
            </li>
        </ul>
    </div>
</div>
