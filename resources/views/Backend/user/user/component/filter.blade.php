<h3 class="text-center">Danh sách User</h3>
<form action="{{ route('user.index') }}">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div class="perpage">
                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                    <select name="perpage" class="form-control flex-grow-1" @php $perpage=request('perpage') ?: old('perpage') @endphp>
                    @for($i=5;$i<=40;$i+=5) 
                        <option {{ ($perpage == $i) ? 'selected' : '' }} value="{{ $i }}">{{ $i }} bản ghi</option>
                    @endfor
                    </select>
                </div>
            </div>
            <div class="action">
                <div class="uk-flex uk-flex-middle">
                    <div class="uk-search uk-flex uk-flex-middle me-3">
                        <div class="input-group">
                            <input type="text" name="keyword" value="{{ request('keyword') ?: old('keyword') }}" placeholder="Nhập từ khóa bạn muốn tìm kiếm..."
                                class="form-control">
                            <span class="">
                                <button type="submit" name="search" value="search" class="btn btn-primary">Tìm kiếm</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
