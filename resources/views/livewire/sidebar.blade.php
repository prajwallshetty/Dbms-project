<div class="col-lg-3 primary-sidebar sticky-sidebar mt-75">
    <div class="row">
        <div class="col-lg-12 col-mg-6">
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @elseif (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="col-lg-12 col-mg-6"></div>
    </div>
    <div class="widget-category mb-30 rounded-3xl border-slate-200  shadow-md">
        <h1 class="font-bold text-lg tracking-widest text-orange-500 mb-2 uppercase">Categories</h1>
        <ul class="categories">
            @foreach ($categories as $category)
                <li>
                    <a href="{{ url()->current() }}?{{ http_build_query(array_merge(request()->query(), ['category' => $category->slug])) }}"
                        class="{{ $selectedCategory === $category->slug ? 'active' : '' }} font-semibold">
                        {{ ucfirst($category->name) }}
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
</div>
