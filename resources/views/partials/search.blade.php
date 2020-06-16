<form action="{{ route('products.search') }}" class="d-flex mr-3">
    <div class="form-group mb-0 mr-1" >
        <input type="text" name="q" class="form-control" value="{{ request()->q ?? '' }}">
    </div>
          <button type="submit" class="btn btn-light btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </button>
        </form>
