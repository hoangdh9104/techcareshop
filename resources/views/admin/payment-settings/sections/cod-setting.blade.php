<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
    <div class="tab-pane fade show" id="list-momo" role="tabpanel" aria-labelledby="list-momo-list">
        <div class="card border">
            <div class="card-body">
                <form action="{{ route('admin.cod-setting.update', 1) }} " method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Trạng thái COD</label>
                        <select name="status" id="" class="form-control">
                            <option {{ $codSetting->status === 1 ? 'selected' : '' }} value="1">Kích hoạt</option>
                            <option {{ $codSetting->status === 0 ? 'selected' : '' }} value="0">Không kích hoạt</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>

</div>
